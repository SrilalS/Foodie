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
            <div class="collapse navbar-collapse"
                id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="index.html">Home</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="catalog.html">All Items</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="shops.html">Shops</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="shopping-cart.html">Cart (0)</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="account.html">My Account</a></li>
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
                        <div class="container" style="width: 100%;">
                            <div class="block-heading">
                                <h2 class="text-info">Add a Item</h2>
                            </div>

                            <?php
                            echo 'Allahu Akabar';

                            if(isset($_POST['name'])) {
                                $name=$_POST['name'];
                                $price=$_POST['price'];
                                $amount=$_POST['amount'];
                                $desc=$_POST['desc'];
                                $shopid=$_POST['shopid'];

                                $curl = curl_init();

                                curl_setopt_array($curl, array(
                                    CURLOPT_URL => "http://127.0.0.1:8000/api/1.0/foods/add",
                                    CURLOPT_RETURNTRANSFER => true,
                                    CURLOPT_ENCODING => "",
                                    CURLOPT_MAXREDIRS => 10,
                                    CURLOPT_TIMEOUT => 0,
                                    CURLOPT_FOLLOWLOCATION => true,
                                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                    CURLOPT_CUSTOMREQUEST => "POST",
                                    CURLOPT_POSTFIELDS =>"{\r\n    \"name\": \"$name\",\r\n    \"price\": \"$price\",\r\n    \"amount\": \"$amount\",\r\n    \"desc\": \"$desc\",\r\n    \"shopid\": \"$shopid\"\r\n}",
                                    CURLOPT_HTTPHEADER => array(
                                        "Content-Type: application/json"
                                    ),
                                ));
                                $response = curl_exec($curl);
                                curl_close($curl);
                                echo "ajkdjelk $response";
                            }



                            echo <<<FR

                            <form class="shadow-lg" method="post" >
                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="shadow-sm form-control item" type="text" id="name" required="">
                                </div>
                                <div class="form-group">
                                    <label>Price</label>
                                    <input class="shadow-sm form-control" type="text" id="price" inputmode="numeric" required="">
                                </div>
                                <div class="form-group">
                                    <label >Amount</label>
                                    <input class="shadow-sm form-control" type="text" id="amount" inputmode="numeric" required="">
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <input class="shadow-sm form-control" type="text" id="desc" required="">
                                </div>
                                <div class="form-group">
                                    <label >Shop ID</label>
                                    <input class="shadow-sm form-control" type="text" id="shopid" value="SOB" inputmode="text" required="">
                                </div>
                                <button class="btn btn-success btn-block btn-lg" type="submit">Add</button>
                            </form>

                            FR;
                            ?>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <footer class="page-footer dark">
        <div class="footer-copyright">
            <p>© 2020 Foodie.com</p>
        </div>
    </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="assets/js/smoothproducts.min.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
    <script src="assets/js/Simple-Slider.js"></script>
</body>

</html>
