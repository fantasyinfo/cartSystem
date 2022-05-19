<?php

session_start();
unset($_SESSION['email_id']);
unset($_SESSION['login_status']);
unset($_SESSION['f_name']);
unset($_SESSION['l_name']);
unset($_SESSION['phone_number']);
unset($_SESSION['address']);
header('Location: login.php');
die();