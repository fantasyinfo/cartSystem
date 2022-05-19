<?php
include('../config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['login_frm_save']) && !empty($_POST['email_id'])) {
        $email_id = mysqli_real_escape_string($conn, $_POST['email_id']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $password = md5($password);

        $select_sql = "select * from users where email_id = '$email_id' and password = '$password' and status = '1'";
        $run_Select_Query = mysqli_query($conn, $select_sql);
        $count_Select = mysqli_num_rows($run_Select_Query);


        if ($count_Select > 0) {
            $data = mysqli_fetch_assoc($run_Select_Query);
            $_SESSION['f_name'] = $data['f_name'];
            $_SESSION['l_name'] = $data['l_name'];
            $_SESSION['phone_number'] = $data['phone_number'];
            $_SESSION['address'] = $data['address'];
            $_SESSION['sucess'] = 'Login Successfull';
            $_SESSION['login_status'] = true;
            $_SESSION['email_id'] = $email_id;
            header('Location: checkout.php');
        } else {
            $_SESSION['error'] = 'Email Id and Password not Match.';
            header('Location: login.php');
        }
    }
}