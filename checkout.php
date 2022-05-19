<?php
include('./header.php');
if (!isset($_SESSION['email_id']) && $_SESSION['login_status'] == false) {

    $_SESSION['error'] = 'Please Login First';
    header("location: login.php");
}


$f_name = "";
$l_name = "";
$email_id = "";
$address = "";
$country = "";
$state = "";
$zip = "";


if (isset($_SESSION['f_name'])) {

    $f_name = $_SESSION['f_name'];
}
if (isset($_SESSION['l_name'])) {

    $l_name = $_SESSION['l_name'];
}
if (isset($_SESSION['email_id'])) {

    $email_id = $_SESSION['email_id'];
}
if (isset($_SESSION['address'])) {

    $address = $_SESSION['address'];
}
if (isset($_SESSION['country'])) {

    $country = $_SESSION['country'];
}
if (isset($_SESSION['state'])) {

    $state = $_SESSION['state'];
}
if (isset($_SESSION['zip'])) {

    $zip = $_SESSION['zip'];
}

// print_r($_SESSION);
$cart_items = $_SESSION['cart'];
setcookie('cart', json_encode($cart_items), time() + 86500);
// print_r($_COOKIE['cart']);
?>
<div class="container my-3 py-3 shadow">
    <form action="../razorpay/pay.php" method="post">
        <div class=" py-5 text-center">
            <h2>Checkout form</h2>
        </div>

        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Your cart</span>
                    <span class="badge badge-secondary badge-pill">3</span>
                </h4>
                <ul class="list-group mb-3">
                    <?php
                    $total_amt = 0;
                    $total_qty = 0;
                    if (isset($_SESSION['cart'])) {
                        foreach ($_SESSION['cart'] as $key => $value) { ?><li
                        class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0"><?php echo
                                                        $value['product_name'];
                                                        echo " ";
                                                        echo "( " . $value['product_qty'] . " )";
                                                        ?></h6>
                            <small class="text-muted">Price for 1 pcs
                                <?php echo " $ " . number_format($value['product_price'], 2); ?></small>
                        </div>
                        <span
                            class="text-muted"><?php echo " $ " . number_format($value['product_price'] * $value['product_qty'], 2); ?></span>
                    </li>


                    <?php $total_amt = $total_amt + $value['product_price'] * $value['product_qty'];
                            $total_qty = $total_qty + $value['product_qty'];
                        }
                    }
                    ?>




                    <li class="list-group-item d-flex justify-content-between bg-light">
                        <div class="text-success">
                            <h6 class="my-0">Promo code</h6>
                            <small>EXAMPLECODE</small>
                        </div>
                        <span class="text-success">-$5</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (USD)</span>
                        <strong>$ <?php echo number_format($total_amt, 2); ?></strong>
                    </li>
                    <input type="hidden" name="price_to_pay" value="<?= $total_amt; ?>">
                    <input type="hidden" name="total_qty_to_send" value="<?= $total_qty; ?>">
                </ul>
                <!-- 
            <form class="card p-2">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Promo code">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-secondary">Redeem</button>
                    </div>
                </div>
            </form> -->
            </div>
            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Billing address</h4>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">First name</label>
                        <input type="text" class="form-control" name="f_name" id="firstName" placeholder=""
                            value="<?= $f_name; ?>" required readonly>

                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName">Last name</label>
                        <input type="text" class="form-control" name="l_name" id="lastName" placeholder=""
                            value="<?= $l_name; ?>" required readonly>

                    </div>
                </div>


                <div class="mb-3">
                    <label for="email">Email </label>
                    <input type="email" class="form-control" name="email_id" id="email" value="<?= $email_id; ?>"
                        placeholder="you@example.com" required readonly>

                </div>

                <div class="mb-3">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" name="address" value="<?= $address; ?>" id="address"
                        placeholder="1234 Main St" required>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="country">Country</label>
                        <input type="text" class="form-control" id="country" name="country" placeholder=""
                            value="<?= $country; ?>" required>

                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="state">State</label>
                        <input type="text" class="form-control" id="state" name="state" value="<?= $state; ?>"
                            placeholder="" required>

                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="zip">Zip</label>
                        <input type="text" class="form-control" id="zip" placeholder="" name="zip" value="<?= $zip; ?>"
                            required>

                    </div>
                </div>
                <hr class="mb-4">

                <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>

            </div>
        </div>
    </form>
</div>


<?php
include('./footer.php'); ?>