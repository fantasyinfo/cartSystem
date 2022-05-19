<?php
include('./header.php');

$msg = "";



if (empty($_SESSION['cart'])) {
    $msg = 'You Do Not Have Any Product in Your Cart.';
}

?>


<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Cart Details
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <?php if (!$_SESSION['cart']) {
            echo " <div class='shadow card-body'> $msg </div>";
            echo '<br>';
            echo '<a href="index.php" class="btn btn-dark btn-block">Back to shopping</a>';
        } else { ?>
        <?php // echo "<pre>";
            //print_r($_SESSION['cart']);
            ?>
        <div class="col-md-8 mt-3">
            <div class="card shadow">
                <div class="card-header">
                    Cart Items Detils
                </div>
                <div class="card-body">
                    <table class="table table-stripe table-border">
                        <thead>
                            <tr>
                                <td>Items </td>
                                <td>Product Name </td>
                                <td>Product Quantity </td>
                                <td>Price </td>
                                <td>Total Cost </td>
                                <td>Action </td>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                                if (isset($_SESSION['cart'])) {
                                    $i = 1;
                                    $total_amt = 0;
                                    $total_qty = 0;
                                    // foreach ($_SESSION['cart'] as $key1 => $value1) {
                                    foreach ($_SESSION['cart'] as $key => $value) {

                                ?>
                            <form action="cart.php" method="post">
                                <tr>

                                    <td><?php echo $i++ ?></td>
                                    <td><?php echo $value['product_name']; ?></td>


                                    <td>
                                        <input type="number" name="qty_cart" min="1" max="9"
                                            value="<?php echo $value['product_qty']; ?>">
                                        <input type="hidden" name="product_id_qty" id="qty_id"
                                            value="<?php echo $value['product_id']; ?>">
                                        <input type="submit" class="btn btn-info" id="submit_qty" name="update_qty"
                                            value="Update">
                                    </td>

                                    <td>$ <?php echo number_format($value['product_price'], 2); ?>
                                    </td>

                                    <td>$ <?php $amt =  $value['product_price'] * $value['product_qty'];
                                                        echo  number_format($amt, 2); ?>
                                    </td>

                                    <td>
                                        <a class="btn btn-danger"
                                            href="cart.php?type=remove&product_id=<?php echo $value['product_id']; ?>">Remove</a>
                                    </td>
                                    <?php


                                                $total_amt += ($amt);
                                                $total_qty += $value['product_qty'];
                                                ?>

                                </tr>
                            </form>
                            <?php   }
                                    // }
                                } ?>


                        </tbody>
                    </table>
                </div>
            </div>


        </div>
        <div class="col-md-4 mt-3">
            <div class="card shadow">
                <div class="card-header">
                    Total Details
                </div>
                <div class="card-body">
                    <table class="table table-striped table-border">
                        <thead>
                            <tr>
                                <th colspan="2">
                                    Product Details
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Total Quantity</td>
                                <td><?php echo $total_qty; ?></td>
                            </tr>
                            <tr>
                                <td>Total Amount</td>
                                <td><?php echo number_format($total_amt, 2); ?></td>
                            </tr>
                            <tr>
                                <td><a href="index.php" class="btn btn-dark btn-block">Back to shopping</a></td>
                                <td>
                                    <?php

                                        if (isset($_SESSION['email_id']) && $_SESSION['login_status'] == true) { ?>

                                    <a href="checkout.php" class="btn btn-warning btn-block">Proced To
                                        Checkout</a>
                                    <?php   } else { ?>
                                    <a href="register.php" class="btn btn-warning btn-block">Proced To
                                        Checkout</a>

                                    <?php     }

                                        ?>



                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>

        <?php  }

        ?>
    </div>
</div>






<?php
include('./footer.php'); ?>