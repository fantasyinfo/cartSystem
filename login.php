<?php
include('./header.php');

if (isset($_SESSION['email_id']) && $_SESSION['login_status'] == true) {

    header("location: dashboard.php");
}


?>

<section class="vh-100 gradient-custom bg-light">
    <div class="container py-5 h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-7">
                <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                    <div class="card-body p-4 p-md-5">
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Login Form</h3>
                        <?php if (isset($_SESSION['error'])) {
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                        } ?>
                        <form action="login_frm.php" method="POST">
                            <div class="row">
                                <div class="col-md-6 mb-4 pb-2">

                                    <div class="form-outline">
                                        <label class="form-label" for="emailAddress">Email</label>
                                        <input type="email" id="emailAddress" name="email_id"
                                            class="form-control form-control-lg" />

                                    </div>

                                </div>
                                <div class="col-md-6 mb-4 pb-2">

                                    <div class="form-outline">
                                        <label class="form-label" for="pass">Password</label>
                                        <input type="password" id="pass" name="password"
                                            class="form-control form-control-lg" />

                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="mt-4 pt-2 text-center">
                                    <input class="btn btn-primary btn-lg btn-block col-md-6" name="login_frm_save"
                                        type="submit" value="Login" />
                                </div>
                            </div>
                        </form>
                        <div class="row mt-5">
                            <div class="col-md-8">
                                <a class="text-info" href="register.php">Don't have an account? Register Now!!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<?php include('./footer.php'); ?>