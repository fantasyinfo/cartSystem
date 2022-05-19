<?php
include('../config.php');
echo "<pre>";
//session_destroy();


$product_array = [
    'product_name' => $_POST['product_name'],
    'product_id' => $_POST['product_id'],
    'product_qty' => $_POST['product_qty'],
    'product_price' => $_POST['product_price'],

];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['product_id'])) {
        if (isset($_SESSION['cart'])) {

            // check if cart has already have product
            $check = array_column($_SESSION['cart'], 'product_id');
            if (in_array($_POST['product_id'], $check)) {
                foreach ($_SESSION['cart'] as $key => $value) {
                    // check if cart has same product already availble
                    if ($_SESSION['cart'][$key]['product_id'] == $_POST['product_id']) {
                        $_SESSION['cart'][$key]['product_qty'] = $_SESSION['cart'][$key]['product_qty'] + $_POST['product_qty'];
                        header("Location: index.php");
                    }
                }
            } else {
                $_SESSION['cart'][] = $product_array;
                header("Location: index.php");
            }
        } else {
            $_SESSION['cart'][] = $product_array;
            header("Location: index.php");
        }
    }
}



if ($_SERVER['REQUEST_METHOD']  == "GET") {
    $product_id =  $_GET['product_id'];
    if ($_GET['type'] = 'remove') {
        $check = array_column($_SESSION['cart'], 'product_id');
        if (in_array($_GET['product_id'], $check)) {
            foreach ($_SESSION['cart'] as $key => $value) {
                if ($_SESSION['cart'][$key]['product_id'] == $_GET['product_id']) {
                    unset($_SESSION['cart'][$key]);
                    header("Location: cart.php");
                }
            }
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //print_r($_POST);
    //die();
    if (isset($_POST['update_qty'])) {
        if ($_SESSION['cart']) {
            $check = array_column($_SESSION['cart'], 'product_id');
            if (in_array($_POST['product_id_qty'], $check)) {
                foreach ($_SESSION['cart'] as $key => $value) {
                    if ($_SESSION['cart'][$key]['product_id'] == $_POST['product_id_qty']) {
                        $_SESSION['cart'][$key]['product_qty'] = $_POST['qty_cart'];
                        // $_SESSION['cart'][$key]['product_qty'] = $_SESSION['cart'][$key]['product_qty'] + $_POST['qty_cart'];
                        header('Location: cart-page.php');
                    }
                }
            }
        }
    }
}