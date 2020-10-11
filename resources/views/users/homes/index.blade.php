<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title> {{"Tobazone"}}</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon  -->
    <link rel="shortcut icon" href="/images/assets/icon_1.png">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="/user-assets/css/core-style.css">
    <link rel="stylesheet" href="/user-assets/style.css">

    <link rel="stylesheet" href="/user-assets/new-css.css">

    <!-- <link rel="stylesheet" href="/user-assets/normalize.css"> -->
    <!-- <link rel="stylesheet" href="/user-assets/webflow.css"> -->
    <link rel="stylesheet" href="/user-assets/test-page-gridstyle.css">



    <link rel="stylesheet" href="/user-assets/css/header.css">

    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

    <link href='https://unpkg.com/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>


<div id="app">
    @include('users.layouts.header')
    <div class="container-fluid">

            <div class="row mt-3" style="background-color : white ">
                <div class="col-md-8" style="padding-right:1.8rem;">
                    <carousel> </carousel>
                </div>

                <div class="col-md-4 col-sm-12">
                    <div class="row">
                        <div class="col-md-12"  style="padding-left:0.5rem">
                            <a href="/search">
                            <img class="img-besidecar" src="{{ url("/images/carousels/carouselsamping1.png" )}}" alt="Card image cap test" style="height: 100%; width : 100%">
                            </a>
                        </div>
                    </div>

                    <div class="row pt-2 pr-0">
                    <div class="col-md-12" style="padding-left:0.5rem">
                            <a href="/product/ulos">
                            <img class="img-besidecar" src="{{ url("/images/carousels/carouselsamping2.png" )}}" alt="Card image cap test" style="height:100%; width : 100%;  background-color: black!important">
                            </a>
                        </div>
                    </div>
                </div>
            </div>



              <div id="new-product">
                @if(Auth::check())
                    <new-products :user-id="{{Auth::user()->id}}" :title="'Produk Terbaru'"/>
                @else
                    <new-products :title="'Produk Terbaru'"/>
                @endif
              </div>


              <div class="row" style="padding-top: 2rem; position:center" >
                <div class="col-md-12">
                  <center>
                    <div class="row">
                        <div class="col-md-12">
                                <h3>Kategori</h3>
                        </div>
                    </div>

                    <div class="col-md-12" >
                      <div class="image-wrapper">
                        <div class="w-layout-grid image-grid">

                          <div id="w-node-29f467322595-cecc6f8b" class="image-container">
                            <a href="{{ url('/product/pakaian') }}">
                              <div class="text-block">PAKAIAN</div>
                            </a>
                          </div>

                          <div id="w-node-d4886159c096-cecc6f8b" class="image-container _2">
                            <a href="{{ url('/product/obat') }}">
                              <div class="text-block">OBAT</div>
                            </a>
                          </div>

                          <div id="w-node-60cd9d4111ae-cecc6f8b" class="image-container _3">
                            <a href="{{ url('/product/ulos') }}">
                              <div class="text-block">ULOS</div>
                            </a>
                          </div>

                          <div id="w-node-12ffc40a2e90-cecc6f8b" class="image-container _4">
                            <a href="{{ url('/product/aksesoris') }}">
                              <div class="text-block">AKSESORIS</div>
                            </a>
                          </div>

                          <div id="w-node-2d179ca0bff4-cecc6f8b" class="image-container _5">
                            <a href="{{ url('/product/makanan') }}">
                              <div class="text-block">MAKANAN</div>
                            </a>
                          </div>

                        </div>
                      </div>
                    </div>
                  </center>
                </div>
            </div>


    <!-- <div id="banner">
        <banner/>
    </div> -->
</div>
@include('users.layouts.footer')
</div>
@include('users.layouts.script')
<script>
$(document).ready(function() {
  $("#sidebar1Collapse").on("click", function() {
    $("#sidebar1").addClass("active");
    console.log("a!");
  });

  $("#sidebar1CollapseX").on("click", function() {
    $("#sidebar1").removeClass("active");
    console.log("b!");
  });

  $("#sidebar1Collapse").on("click", function() {
    if ($("#sidebar1").hasClass("active")) {
      $(".overlay").addClass("visible");
      console.log("c!");
    }
  });

  $("#sidebar1CollapseX").on("click", function() {
    $(".overlay").removeClass("visible");
    console.log("d!");
  });

  $("#butMasuk").on("click", function() {
    $("#sidebar1").removeClass("active");
    $(".overlay").removeClass("visible");
  });

  $("#butDaftar").on("click", function() {
    $("#sidebar1").removeClass("active");
    $(".overlay").removeClass("visible");
  });

});

</script>
</body>

</html>
