<?php
session_start();
if (!isset($_SESSION['email_id']) && $_SESSION['login_status'] == false) {

    $_SESSION['error'] = 'Please Login First';
    header("location: login.php");
}

if (isset($_SESSION['email_id'])) {

    echo $_SESSION['email_id'];
}