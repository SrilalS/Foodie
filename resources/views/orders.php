<?php
session_start();


$islogged = session('lgd');

if ($islogged !== '1') {
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
    <div class="container"><a class="navbar-brand logo" href="#">Foodie</a>
        <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse"
             id="navcol-1">
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item" role="presentation"><a class="nav-link" href="catalog">All Items</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="shops.html">Shops</a></li>
                <?php
                if (session('crt') !== null) {
                    $count = count(session('crt'));
                } else {
                    $count = 0;
                }
                echo <<< CR

                    <li class="nav-item" role="presentation"><a class="nav-link" href="cart">Cart ($count)</a></li>
                    CR;
                $usrtype = session('acctype');
                $path = 'accountSeller';
                if ($usrtype == 'Buyer') {
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
    <section class="clean-block dark">

        <div class="container pt-4 ">
            <div class="form rounded-lg">

                <table class="table table-hover table-dark">
                    <thead>
                    <tr>
                        <th scope="col">Order</th>
                        <th scope="col">Items</th>
                        <th scope="col">Time To Pickup</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                    $rw = DB::table('orders')->get();

                    foreach ($rw as $row) {

                        $tp = $row->OrderJSON;
                        $tp = json_decode($tp);

                        foreach ($tp as $ors) {
                            if ($ors[0] == $shopname) {
                                $name = DB::table('foods')->where('foodid', $ors[1])->value('name');
                                $orderid = $row->orderid;
                                echo <<< TR
                                        <tr>
                                            <th scope="row">$orderid</th>
                                                <td>
                                                    <h4>$name x $ors[2]</h4>
                                                </td>
                                                    <td>8.00AM</td>
                                                <td>
                                                    <form method="post"><button class="btn btn-success btn-block">Complete Order</button></form>
                                                    <br>
                                                    <form method="post"><button class="btn btn-danger btn-block">Finish Order</button></form>
                                                </td>
                                        </tr>

                                        TR;

                            }

                        }
                    }
                    ?>

                    </tbody>
                </table>

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
