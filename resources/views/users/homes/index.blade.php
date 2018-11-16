<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title> {{"Uloszone"}}</title>

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
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-8">
                <div id="app" class="mt-0">
                    <carousel-asd />
                </div>
            </div>
        
            <div class="col-md-4" style="">
                <div class="imgbanner " style="height: 160px;background-image: url('/images/1541174865ragihotang.jpg'); background-size: cover; margin-bottom: 17px">
                </div>
                <div class="imgbanner" style="height: 160px;background-image: url('/images/1541174865ragihotang.jpg'); background-size: cover">
                </div>
              </div>
        
        </div>
    </div>
  
    <div id="new-product">
        @if(Auth::check())
            <new-products :user-id="{{Auth::user()->id}}" />
        @else
            <new-products />
        @endif
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