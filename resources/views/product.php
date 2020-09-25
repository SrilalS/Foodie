<?php
session_start();

$id = $_GET['id'];

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - Foodie</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">
    <link rel="stylesheet" href="assets/css/Simple-Slider.css">
    <link rel="stylesheet" href="assets/css/smoothproducts.css">
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
<?php

    $name = DB::table('foods')->where('foodid',$id)->value('name');
    $price = DB::table('foods')->where('foodid',$id)->value('price');
    $amount = DB::table('foods')->where('foodid',$id)->value('amount');
    $desc = DB::table('foods')->where('foodid',$id)->value('desc');
    $shopid = DB::table('foods')->where('foodid',$id)->value('shopid');
    $enable = '';
    if ($amount < 1) {
        $enable = 'disabled';
    }

    echo <<< BLOK
    <main class="page product-page">
        <section class="clean-block clean-product dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">$name</h2>
                </div>
                <div class="block-content">
                    <div class="product-info">
                        <div class="row">
                            <div class="col-md-6">
                                <div>
                                    <div class="sp-wrap">
                                        <img class="img-fluid" src="assets/img/tech/image1.png">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info">
                                    <h3>$name</h3>
                                    <div class="price">
                                        <h3>LKR $price/=</h3>
                                    </div>
                                    <form method="post">
                                    <input hidden name="id" value="$id">
                                    <input hidden name="shopid" value="$shopid">
                                    <label>Amount</label>
                                    <input type="number" name="amount" class="form-control quantity-input" value="1" />
                                    <br>
                                    <button class="btn btn-primary " type="submit" $enable>
                                    <i class="icon-basket"></i>Add to Cart</button>
                                    </form>
                                    <div class="summary">
                                        <p>$desc</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    BLOK;
    ?>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="assets/js/smoothproducts.min.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
    <script src="assets/js/Simple-Slider.js"></script>
</body>

</html>
