<?php
session_start();
//session_destroy();

$product_array = [
    'product_name' => $_POST['product_name'],
    'product_id' => $_POST['product_id'],
    'product_qty' => $_POST['product_qty'],
    'product_price' => $_POST['product_price'],
];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_SESSION['cart'])) {
        // check product is already in cart
        $check_in_cart = array_column($_SESSION['cart'], 'product_id');
        if (in_array($_POST['product_id'], $check_in_cart)) {
            foreach ($_SESSION['cart'] as $key => $value) {
                if ($_SESSION['cart'][$key]['product_id'] == $_POST['product_id']) {
                    $_SESSION['cart'][$key]['product_qty'] = $_SESSION['cart'][$key]['product_qty'] + $_POST['product_qty'];
                    header('Location:index.php');
                }
            }
        } else {
            $_SESSION['cart'][] = $product_array;
            header("Location:index.php");
        }
    } else {
        $_SESSION['cart'][] = $product_array;
        header("Location:index.php");
    }
}