<?php
include('../config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['register_frm_save']) && !empty($_POST['email_id'])) {
        $f_name = mysqli_real_escape_string($conn, $_POST['f_name']);
        $l_name = mysqli_real_escape_string($conn, $_POST['l_name']);
        $email_id = mysqli_real_escape_string($conn, $_POST['email_id']);
        $phone_number = mysqli_real_escape_string($conn, $_POST['phone_number']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $cnf_password = mysqli_real_escape_string($conn, $_POST['cnf_password']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $country = mysqli_real_escape_string($conn, $_POST['country']);
        $state = mysqli_real_escape_string($conn, $_POST['state']);
        $zip = mysqli_real_escape_string($conn, $_POST['zip']);
        $status = 1;


        if ($password == $cnf_password) {
            $md_password = md5($password);
        } else {
            $_SESSION['error'] = 'Password Not Match';
            header('Location: register.php');
        }


        $select_sql = "select * from users where email_id = '$email_id'";
        $run_Select_Query = mysqli_query($conn, $select_sql);
        $count_Select = mysqli_num_rows($run_Select_Query);
        if ($count_Select > 0) {
            $_SESSION['error'] = 'Email Id is Already Register, Try To Login.';
            header('Location: register.php');
        } else {
            $sql = "INSERT INTO users(f_name, l_name, email_id, phone_number, password, address, country, state, zip, status) VALUES 
            ('$f_name','$l_name','$email_id','$phone_number', '$md_password','$address','$country', '$state', '$zip','$status')";

            $run_query = mysqli_query($conn, $sql);
            if ($run_query) {
                $_SESSION['sucess'] = 'Registration Successfull, Login Now!!';
                $_SESSION['email_id'] = $email_id;
                $_SESSION['f_name'] = $f_name;
                $_SESSION['l_name'] = $l_name;
                $_SESSION['phone_number'] = $phone_number;
                $_SESSION['address'] = $address;
                $_SESSION['country'] = $country;
                $_SESSION['state'] = $state;
                $_SESSION['zip'] = $zip;
                $_SESSION['login_status'] = true;
                header('Location: checkout.php');
            } else {
                die();
            }
        }
    }
}