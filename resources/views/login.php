<?php
session_start();

$islogged = session('lgd');
$usrtype = session('acctype');
if ($islogged == '1'){
    header('Location: http://127.0.0.1:8000/account'.$usrtype);
    die();
}

?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - Foodie</title>
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="/assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">
    <link rel="stylesheet" href="/assets/css/Simple-Slider.css">
    <link rel="stylesheet" href="/assets/css/smoothproducts.css">
</head>

<body style="background-color: #f6f6f6;">
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
    <main class="page landing-page"></main>
    <div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <section class="text-left clean-block clean-form dark">
                        <div class="container" style="width: 75%;">
                            <div class="block-heading">
                                <h2 class="text-info">Log In</h2>
                            </div>
                            <?php

                            echo <<<FRM

                            <form class="shadow-lg" method="post">
                                <div class="form-group">
                                <label for="email">ID Number</label>
                                <input class="shadow-sm form-control item" type="text" name="stdid">
                                </div>
                                <div class="form-group">
                                <label for="password">Password</label>
                                <input class="shadow-sm form-control" type="password" name="password">
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="checkbox">
                                    <label class="form-check-label" for="checkbox">Remember me</label>
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-block" type="submit">Log In</button>
                                <div class="col" style="padding-top: 15px;">
                                <a href="mailto:Srilalsachintha@Gmail.com">Forgot Password?</a>
                                </div>
                            </form>

                            FRM;
                            ?>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="/assets/js/smoothproducts.min.js"></script>
    <script src="/assets/js/theme.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
    <script src="/assets/js/Simple-Slider.js"></script>
</body>

</html>
