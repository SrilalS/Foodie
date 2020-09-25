<?php
session_start();


$islogged = session('lgd');

if ($islogged !=='1'){
    header('Location: http://127.0.0.1:8000/');
    die();
} else {
    $shopname = session('shopname');
    $fname = session('fname');
    $lname = session('lname');
    $email = session('email');
    $mobile = session('mobile');


}
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Payment - Foodie</title>
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

                    if ($shopname !== null) {
                        echo <<< NV


                        <button class="btn btn-danger">View Orders (0)</button>
                        NV;
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
        <main class="page payment-page">
            <section class="clean-block payment-form dark">
                <div class="container">
                    <div class="block-heading">
                        <?php

                         echo <<< NM
                                    <h2 class="text-info">Hi $shopname!</h2>
                                  NM;
                        ?>
                    </div>
                    <?php
                    echo <<< DTL
                        <div class="form shadow-lg rounded-lg">


                        <div class="card-body bg-danger rounded-lg">
                        <h2 class="text-white ">You Have New Orders!</h2>
                        <button class="btn btn-success" type="submit">View All</button>
                        </div>

                        <div class="products" style="padding-bottom: 0px;">
                            <h3 class="">Account Details</h3>

                            <div class="item"><span class="price">$fname $lname</span>
                                <p class="item-name">Owner</p>
                            </div>

                            <div class="item"><span class="price">$email</span>
                                <p class="item-name">Email</p>
                            </div>

                            <div class="item"><span class="price">$mobile</span>
                                <p class="item-name">Phone Number</p>
                            </div>
                        </div>
                        DTL;
                        ?>
                        <div class="card-details" style="padding-top: 0px;">

                            <div class="form-row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                    <button class="btn btn-primary btn-block" type="submit">View Selling History</button>
                                        <button class="btn btn-success btn-block" type="submit">View My Items</button>
                                        <a href="http://127.0.0.1:8000/addproduct">
                                            <button class="btn btn-primary btn-block" type="submit">Add a New Item</button>
                                        </a>
                                        <?php
                                        echo <<< FR
                                        <form method="post" >
                                        <button class="btn btn-danger btn-block" type="submit">Log Out</button>
                                        </form>
                                        FR;
                                        ?>
                                    </div>
                                </div>
                            </div>

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
