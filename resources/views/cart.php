<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Catalog - Foodie</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">
    <link rel="stylesheet" href="assets/css/Simple-Slider.css">
    <link rel="stylesheet" href="assets/css/smoothproducts.css">
</head>

<body>
<nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
    <div class="container"><a class="navbar-brand logo" href="#">Foodie</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class = "collapse navbar-collapse"
             id="navcol-1">
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item" role="presentation"><a class="nav-link" href="catalog">All Items</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="shops.html">Shops</a></li>
                <?php
                if (session('crt')!==null) {
                    $count = count(session('crt'));
                } else {
                    $count = 0;
                }
                echo <<< CR

                    <li class="nav-item" role="presentation"><a class="nav-link active" href="cart">Cart ($count)</a></li>
                    CR;
                $usrtype = session('acctype');
                $path = 'accountSeller';
                if ($usrtype =='Buyer'){
                    $path = 'accountBuyer';
                }
                echo <<< NAV
                    <li class="nav-item" role="presentation"><a class="nav-link" href="$path">My Account</a></li>
                    NAV;
                ?>
            </ul>
        </div>
    </div>
</nav>
    <main class="page shopping-cart-page">
        <section class="clean-block clean-cart dark">
            <div class="container">
                <div class="block-heading">

                    <h2 class="text-info">Shopping Cart</h2>


                </div>
                <div class="shadow-sm content">
                    <div class="row ">

                                <?php

                                $comp = session('crt');
                                if (session('crt')== null){
                                    echo <<< BLOK
                                    <h2>No Items In the Cart!</h2>
                                    BLOK;
                                } else {
                                    $total = 0;
                                    foreach ($comp as $itm){

                                        $name = DB::table('foods')->where('foodid',$itm[0])->value('name');
                                        $price = DB::table('foods')->where('foodid',$itm[0])->value('price');
                                        $amount = DB::table('foods')->where('foodid',$itm[0])->value('amount');
                                        $desc = DB::table('foods')->where('foodid',$itm[0])->value('desc');
                                        $shopid = DB::table('foods')->where('foodid',$itm[0])->value('shopid');

                                        $price = $price*$itm[1];
                                        $total = $total + $price;
                                        echo <<< BLOK
                                    <div class="col-md-12 col-lg-8">
                                    <div class="items">
                                    <div class="product">
                                    <div class="row justify-content-center align-items-center">
                                        <div class="col-md-3">
                                            <div class="product-image"><img class="img-fluid d-block mx-auto image" src="assets/img/tech/image1.png"></div>
                                        </div>
                                        <div class="col-md-5 product-info">
                                            <a class="product-name">$name</a>
                                        </div>

                                        <div class="col-6 col-md-2 quantity">
                                            <label class="d-none d-md-block" for="quantity">Quantity</label>
                                            <label class="quantity">$itm[1]</label>
                                        </div>

                                        <div class="col-6 col-md-2 price">
                                            <span>Total : LKR$price/=</span>
                                        </div>
                                    </div>
                                    </div>
                                    </div>
                                    </div>

                                    BLOK;
                                }

                                    echo <<< BK
                                    <div class="col-md-12 col-lg-4">
                                    <div class="summary">

                                            <form method="post">
                                            <h2>Summary</h2>
                                            <label>Time To PickUp</label>
                                            <input hidden name="flag" value="make"><br>
                                            <select name="time" class="dropdown">
                                              <option value="7.30AM">7.30AM</option>
                                              <option value="8.00AM">8.00AM</option>
                                              <option value="8.30AM">8.30AM</option>
                                              <option value="9.00AM">9.00AM</option>
                                            </select>

                                            <h2><span class="text">Total</span>
                                                <span style="font-size: larger" class="price">LKR$total/=</span>
                                            </h2>
                                            <button class="btn btn-primary shadow btn-block btn-lg" type="submit">Checkout</button>
                                            </form>

                                            <form method="post">
                                            <input hidden name="flag" value="clr">
                                            <button class="btn btn-danger btn-block btn-lg" type="submit">Clear Cart</button>
                                            </form>
                                        </div>
                                    </div>
                                    BK;



                                }
                        ?>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="assets/js/smoothproducts.min.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
    <script src="assets/js/Simple-Slider.js"></script>
</body>

</html>
