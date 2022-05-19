<?php include('./header.php'); ?>

<div class="container mt-5">
    <div class="row my-3">
        <div class="col-md-12 .card">
            <h4 class='card-header text-center'>Product Page</h4>



        </div>
    </div>
    <div class="row">
        <!-- counter form -->
        <div class="col-md-12">

            <div class="row">


                <?php

                $query = mysqli_query($conn, 'select * from cart where status = 1');
                $count = mysqli_num_rows($query);
                if ($count > 0) {
                    while ($row = mysqli_fetch_assoc($query)) { ?>
                <div class="col-md-3">
                    <form action="cart.php" method="POST" />
                    <div class="card shadow" style="width: 18rem;">
                        <img class="card-img-top" src="<?= $row['product_img']; ?>" alt="Card image cap">
                        <div class="card-body text-center">
                            <h5 class="card-title"><?= $row['product_name']; ?></h5>
                            <div class="form-group">
                                <label for="qty">Quantity</label>
                                <select name="product_qty" class="form-control" id="qty">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <h4 class="card-text text-dark">$ <?= $row['product_price']; ?> .00</h4>
                            <input type="hidden" name="product_id" value="<?= $row['product_id']; ?>">
                            <input type="hidden" name="product_price" value="<?= $row['product_price']; ?>">
                            <input type="hidden" name="product_name" value="<?= $row['product_name']; ?>">
                            <button type="submit" class="btn btn-warning btn-block">Add to cart</button>
                        </div>
                    </div>
                    </form>
                </div>
                <?  }
                }
                ?>


            </div>


        </div>


        <!-- <div class="col-md-8 mt-3">

            
            </div> -->
    </div>
</div>















<?php include('./footer.php'); ?>