<?php
include('../config.php');
// session_destroy();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet" href="style.css">
    <title>Cart</title>
</head>

<body>

    <div class="container bg-light">
        <div class="row">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <!-- Container wrapper -->
                <div class="container-fluid">
                    <!-- Toggle button -->
                    <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                        data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-bars"></i>
                    </button>

                    <!-- Collapsible wrapper -->
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Navbar brand -->
                        <a class="navbar-brand mt-2 mt-lg-0" href="#">
                            FantasyCart
                        </a>
                        <!-- Left links -->
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="dashboard.php">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="checkout.php">Checkout</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="register.php">Register</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="login.php">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="logout.php">Logout</a>
                            </li>
                        </ul>
                        <!-- Left links -->
                    </div>
                    <!-- Collapsible wrapper -->

                    <!-- Right elements -->
                    <div class="d-flex align-items-center">
                        <!-- Icon -->

                        <a class="text-reset me-3 text-white" href="./cart-page.php" /> <i
                            class="fas fa-shopping-cart text-white"></i><?php if (isset($_SESSION['cart'])) {
                                                                                                                                            $total_item_in_cart =  count($_SESSION['cart']);
                                                                                                                                        } else {
                                                                                                                                            $total_item_in_cart = 0;
                                                                                                                                        }
                                                                                                                                        echo "<span style='color:white;' > ( " . $total_item_in_cart . " ) </span>"; ?>
                        </a>



                    </div>
                    <!-- Right elements -->
                </div>
                <!-- Container wrapper -->
            </nav>
            <!-- Navbar -->
        </div>
    </div>