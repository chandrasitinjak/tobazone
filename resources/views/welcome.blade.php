<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Essence - Fashion Ecommerce Template</title>

    <!-- Favicon  -->
    <link rel="icon" href="/user-assets/img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="/user-assets/css/owl.carousel.css">

    <link rel="stylesheet" href="/user-assets/css/core-style.css">
    <link rel="stylesheet" href="/user-assets/style.css">
    <link href="/user-assets/css/full-slider.css" rel="stylesheet">
    <link href="/user-assets/css/cardslide.css" rel="stylesheet">
</head>

<body>
    @include('users.layouts.header')
    @include('users.auth.login_modal')

    <!--carousel-->
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="/user-assets/img/bg-img/banner1.png" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="/user-assets/img/bg-img/banner2.png" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="/user-assets/img/bg-img/banner3.png" alt="Third slide">
            </div>

        </div>

        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true" style="    background-color: black;
    padding: 10px;
    height: 50px;
    width: 30px;"></span>
        <span class="sr-only">Previous</span>
    </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true" style="    background-color: black;
    padding: 10px;
    height: 50px;
    width: 30px;"></span>
        <span class="sr-only">Next</span>
    </a>
    </div>
    <!--Carousel end-->

    <!--Produk Terbaru-->
    <div class="col-md-12">
        <div class="card globalcard">
            <div class="card-header">
                <h5 style="float: left">Produk Terbaru</h5>
                <h6 style="float: right">
                    <a href="shop.html" style="color: -webkit-link">see more</a>
                </h6>
            </div>
            <div class=" card-body  ">
                <div class="row">
                    <div class="col-md-2">
                        <div class="card product">
                            <div class="imgwrapper">
                                <img src="/user-assets/img/product-img/product-22.jpg" alt="Card image cap">
                            </div>

                            <div class="card-body">
                                <p class="card-title productname">Ulos Ragihotang asdjahslkd</p>
                                <h6 style="color: #ff5205"> Rp 2.400.000</h6>
                                <p class="card-text float-right">
                                    <small class="text-muted">Balige</small>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card product">
                            <div class="imgwrapper">
                                <img src="/user-assets/img/product-img/product-55.jpg" alt="Card image cap">
                            </div>

                            <div class="card-body">
                                <p class="card-title productname">Ulos Ragihotang asdjahslkd</p>
                                <h6 style="color: #ff5205"> Rp 2.400.000</h6>
                                <p class="card-text float-right">
                                    <small class="text-muted">Balige</small>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card product">
                            <div class="imgwrapper">
                                <img src="/user-assets/img/product-img/product-33.jpg" alt="Card image cap">
                            </div>

                            <div class="card-body">
                                <p class="card-title productname">Ulos Ragihotang asdjahslkd</p>
                                <h6 style="color: #ff5205"> Rp 2.400.000</h6>
                                <p class="card-text float-right">
                                    <small class="text-muted">Balige</small>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card product">
                            <div class="imgwrapper">
                                <img src="/user-assets/img/product-img/product-44.jpg" alt="Card image cap">
                            </div>

                            <div class="card-body">
                                <p class="card-title productname">Ulos Ragihotang asdjahslkd</p>
                                <h6 style="color: #ff5205"> Rp 2.400.000</h6>
                                <p class="card-text float-right">
                                    <small class="text-muted">Balige</small>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card product">
                            <div class="imgwrapper">
                                <img src="/user-assets/img/product-img/product-22.jpg" alt="Card image cap">
                            </div>

                            <div class="card-body">
                                <p class="card-title productname">Ulos Ragihotang asdjahslkd</p>
                                <h6 style="color: #ff5205"> Rp 2.400.000</h6>
                                <p class="card-text float-right">
                                    <small class="text-muted">Balige</small>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card product">
                            <div class="imgwrapper">
                                <img src="/user-assets/img/product-img/product-44.jpg" alt="Card image cap">
                            </div>

                            <div class="card-body">
                                <p class="card-title productname">Ulos Ragihotang asdjahslkd</p>
                                <h6 style="color: #ff5205"> Rp 2.400.000</h6>
                                <p class="card-text float-right">
                                    <small class="text-muted">Balige</small>
                                </p>
                            </div>
                        </div>
                    </div>


                </div>


            </div>

        </div>
    </div>
    <!--Produk Terbaru End-->

    <!--CTO Banner-->
    <div class="col-md-12">
        <div class="card globalcard">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card cto">
                                    <img src="/user-assets/img/bg-img/banner2.png" alt="" style="object-fit: cover">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card cto ">
                                            <img src="/user-assets/img/bg-img/banner2.png" alt="" style="object-fit: cover">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card cto " style="margin-top: 1em">
                                            <img src="/user-assets/img/bg-img/banner2.png" alt="" style="object-fit: cover">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--CTO Banner End-->

    <!--Card Swipe-->
    <div class="col-md-12">
        <div class="card globalcard">
            <div class="card-header">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="card product">
                                        <div class="imgwrapper">
                                            <img src="/user-assets/img/product-img/product-33.jpg" alt="Card image cap">
                                        </div>

                                        <div class="card-body">
                                            <p class="card-title productname">Ulos Ragihotang asdjahslkd</p>
                                            <h6 style="color: #ff5205"> Rp 2.400.000</h6>
                                            <p class="card-text float-right">
                                                <small class="text-muted">Balige</small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card product">
                                        <div class="imgwrapper">
                                            <img src="/user-assets/img/product-img/product-44.jpg" alt="Card image cap">
                                        </div>

                                        <div class="card-body">
                                            <p class="card-title productname">Ulos Ragihotang asdjahslkd</p>
                                            <h6 style="color: #ff5205"> Rp 2.400.000</h6>
                                            <p class="card-text float-right">
                                                <small class="text-muted">Balige</small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card product">
                                        <div class="imgwrapper">
                                            <img src="/user-assets/img/product-img/product-22.jpg" alt="Card image cap">
                                        </div>

                                        <div class="card-body">
                                            <p class="card-title productname">Ulos Ragihotang asdjahslkd</p>
                                            <h6 style="color: #ff5205"> Rp 2.400.000</h6>
                                            <p class="card-text float-right">
                                                <small class="text-muted">Balige</small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card product">
                                        <div class="imgwrapper">
                                            <img src="/user-assets/img/product-img/product-44.jpg" alt="Card image cap">
                                        </div>

                                        <div class="card-body">
                                            <p class="card-title productname">Ulos Ragihotang asdjahslkd</p>
                                            <h6 style="color: #ff5205"> Rp 2.400.000</h6>
                                            <p class="card-text float-right">
                                                <small class="text-muted">Balige</small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="card product">
                                        <div class="imgwrapper">
                                            <img src="/user-assets/img/product-img/product-33.jpg" alt="Card image cap">
                                        </div>

                                        <div class="card-body">
                                            <p class="card-title productname">Ulos Ragihotang asdjahslkd</p>
                                            <h6 style="color: #ff5205"> Rp 2.400.000</h6>
                                            <p class="card-text float-right">
                                                <small class="text-muted">Balige</small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card product">
                                        <div class="imgwrapper">
                                            <img src="/user-assets/img/product-img/product-44.jpg" alt="Card image cap">
                                        </div>

                                        <div class="card-body">
                                            <p class="card-title productname">Ulos Ragihotang asdjahslkd</p>
                                            <h6 style="color: #ff5205"> Rp 2.400.000</h6>
                                            <p class="card-text float-right">
                                                <small class="text-muted">Balige</small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card product">
                                        <div class="imgwrapper">
                                            <img src="/user-assets/img/product-img/product-22.jpg" alt="Card image cap">
                                        </div>

                                        <div class="card-body">
                                            <p class="card-title productname">Ulos Ragihotang asdjahslkd</p>
                                            <h6 style="color: #ff5205"> Rp 2.400.000</h6>
                                            <p class="card-text float-right">
                                                <small class="text-muted">Balige</small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card product">
                                        <div class="imgwrapper">
                                            <img src="/user-assets/img/product-img/product-44.jpg" alt="Card image cap">
                                        </div>

                                        <div class="card-body">
                                            <p class="card-title productname">Ulos Ragihotang asdjahslkd</p>
                                            <h6 style="color: #ff5205"> Rp 2.400.000</h6>
                                            <p class="card-text float-right">
                                                <small class="text-muted">Balige</small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev" style="margin-left: -20px">
            <span class="carousel-control-prev-icon" aria-hidden="true" style="background-color: black;
    padding: 10px;
    height: 50px;
    width: 30px;"></span>
                    <span class="sr-only">Previous</span>
                </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true" style="background-color: black;
    padding: 10px;
    height: 50px;
    width: 30px;"></span>
                    <span class="sr-only">Next</span>
                </a>
                </div>
            </div>
        </div>

    </div>
    <!--Card Swipe End-->


    <!-- ##### Footer Area Start ##### -->
    <footer class="footer_area clearfix">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h5 class="">Pingendo</h5>
                    <p>A company for whatever you may need, from website prototyping to publishing</p>
                </div>
                <div class=" col-md-2 ">
                    <h5 class="">Mapsite</h5>
                    <ul class="list-unstyled">
                        <li>
                            <a href="#" class="text-white-50">Home</a>
                        </li>
                        <li>
                            <a href="#" class="text-white-50">Kategori</a>
                        </li>
                        <li>
                            <a href="#" class="text-white-50">Blog</a>
                        </li>

                    </ul>
                </div>
                <div class=" col-md-3">
                    <h5 class="">Contact</h5>
                    <ul class="list-unstyled">
                        <li>
                            <a href="#" class="text-white-50">
                            <i class="fa d-inline mr-3 text-white-50 fa-phone"></i>+246 - 542 550 5462</a>
                        </li>


                    </ul>
                </div>
                <div class=" col-md-3">
                    <h5 class="">Subscribe</h5>
                    <form>
                        <fieldset class="form-group"><input type="email" class="form-control" placeholder="Enter email"></fieldset>
                        <button type="submit" class="btn btn-outline-dark">Submit</button>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-3">
                    <p class="text-center">© Copyright 2018 Pingendo - All rights reserved. </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area End ##### -->

    @include('users.layouts.script')

</body>

</html>