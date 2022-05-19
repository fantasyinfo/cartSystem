<?php
include('./header.php'); ?>

<section class="vh-100 gradient-custom bg-light">
    <div class="container py-5 h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-7">
                <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                    <div class="card-body p-4 p-md-5">
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>
                        <?php if (isset($_SESSION['error'])) {
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                        } ?>
                        <form action="register_frm.php" method="POST">

                            <div class="row">
                                <div class="col-md-6 mb-4">

                                    <div class="form-outline">
                                        <label class="form-label" for="firstName">First Name</label>
                                        <input type="text" id="firstName" name="f_name"
                                            class="form-control form-control-lg" />

                                    </div>

                                </div>
                                <div class="col-md-6 mb-4">

                                    <div class="form-outline">
                                        <label class="form-label" for="lastName">Last Name</label>
                                        <input type="text" id="lastName" name="l_name"
                                            class="form-control form-control-lg" />

                                    </div>

                                </div>
                            </div>

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
                                        <label class="form-label" for="phoneNumber">Phone Number</label>
                                        <input type="tel" id="phoneNumber" name="phone_number"
                                            class="form-control form-control-lg" />

                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4 pb-2">

                                    <div class="form-outline">
                                        <label class="form-label" for="pass">Password</label>
                                        <input type="password" id="pass" name="password"
                                            class="form-control form-control-lg" />

                                    </div>
                                </div>
                                <div class="col-md-6 mb-4 pb-2">

                                    <div class="form-outline">
                                        <label class="form-label" for="cnf_pass">Confirm Password</label>
                                        <input type="password" id="cnf_pass" name="cnf_password"
                                            class="form-control form-control-lg" />

                                    </div>

                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Address</label>
                                        <textarea type="text" class="form-control" name="address"
                                            id="exampleFormControlTextarea1" row="3"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-4 mb-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Country</label>
                                        <input type="text" class="form-control" name="country"
                                            id="exampleFormControlTextarea1"></input>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">State</label>
                                        <input type="text" class="form-control" name="state"
                                            id="exampleFormControlTextarea1"></input>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Pin Code</label>
                                        <input type="text" class="form-control" name="zip"
                                            id="exampleFormControlTextarea1"></input>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mt-4 pt-2 text-center">
                                        <input class="btn btn-primary btn-lg btn-block col-md-6"
                                            name="register_frm_save" type="submit" value="Register" />
                                    </div>
                                </div>
                        </form>
                        <div class="row mt-5">
                            <div class="col-md-8">
                                <a class="text-info" href="login.php">Already have an account? Login Now!!</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
</section>
<?php include('./footer.php'); ?>