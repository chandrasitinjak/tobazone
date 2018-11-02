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

    <meta name="csrf-token" content="{{ csrf_token() }}">
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

    <div id="app">
        <carousel-asd />
    </div>

    <div id="new-product">
        <new-products />
    </div>

    <div id="banner">
        <banner/>
    </div>

    <div id="card-swiper">
        <card-swiper />
    </div>

    @include('users.layouts.footer')

    @include('users.layouts.script')
</body>

</html>