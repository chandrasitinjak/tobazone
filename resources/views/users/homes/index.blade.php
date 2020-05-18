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
    <link rel="shortcut icon" href="/images/assets/icon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="/user-assets/css/core-style.css">
    <link rel="stylesheet" href="/user-assets/style.css">

</head>

<body>


<div id="app">
    @include('users.layouts.header')    
    <div class="container-fluid">    
            
            <div class="row mt-3" style="background-color : white ">                
                <div class="col-md-8" style="padding-right:0.8rem;">
                    <carousel> </carousel>
                </div>

                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12" style="padding-left:0.5rem">
                            <img src="{{ url("/images/banners/banner-1.png" )}}" alt="Card image cap test" style="height:12.6em">
                        </div>                        
                    </div>

                    <div class="row pt-2 pr-0">
                    <div class="col-md-12" style="padding-left:0.5rem">
                            <img src="{{ url("/images/banners/banner-1.png" )}}" alt="Card image cap test" style="height:12.6em">
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

                    <div class="col-md-12" style="padding: 2rem 7rem 2rem 7rem">
                        <div class="row">
                            <div class="col-md-4" style="padding-left : 4rem">
                            <a href="{{ url('/product/pakaian') }}">
                              <div class="card card-test bg-dark text-white" style="width:250px; height:250px;">
                                <img src="{{ url("/images/kategori/pakaian.png" )}}" alt="Card image cap test" style="width:250px; height:250px;">
                                    <div class="card-img-overlay card-img-overlay-a">
                                        <center>
                                          <p class="card-title card-title-a" style="color: #fff;">PAKAIAN</p>
                                        </center>
                                    </div>
                              </div>
                            </a>
                            </div>

                            <div class="col-md-4">
                            <a href="{{ url('/product/obat') }}">
                              <div class="card card-test bg-dark text-white" style="width:250px; height:250px;">
                                <img src="{{ url("/images/kategori/obat.png" )}}" alt="Card image cap test" style="size: 100%;">
                                    <div class="card-img-overlay card-img-overlay-a">
                                        <center>
                                          <p class="card-title card-title-a" style="color: #fff;">OBAT</p>
                                        </center>
                                    </div>
                              </div>
                              </a>
                            </div>

                            <div class="col-md-4" style="padding-right: 4rem!important">
                            <a href="{{ url('/product/ulos') }}">
                              <div class="card card-test bg-dark text-white" style="width:250px; height:250px;">
                                <img src="{{ url("/images/kategori/ulos.png" )}}" alt="Card image cap test" style="size: 100%;">
                                    <div class="card-img-overlay card-img-overlay-a">
                                        <center>
                                          <p class="card-title card-title-a" style="color: #fff;">ULOS</p>
                                        </center>
                                    </div>
                              </div>
                            </a>
                            </div>
                        </div>

                        <div class="row p-5">
                            <div class="col-md-2">

                            </div>

                            <div class="col-md-4">
                            <a href="{{ url('/product/aksesoris') }}">
                              <div class="card card-test bg-dark text-white" style="width:250px; height:250px;">
                                <img src="{{ url("/images/kategori/aksesoris.png" )}}" alt="Card image cap test" style="size: 100%;">
                                    <div class="card-img-overlay card-img-overlay-a">
                                        <center>
                                          <p class="card-title card-title-a" style="color: #fff;">AKSESORIS</p>
                                        </center>
                                    </div>
                              </div>
                              </a>
                            </div>

                            <div class="col-md-4">
                            <a href="{{ url('/product/makanan') }}">
                              <div class="card card-test bg-dark text-white" style="width:250px; height:250px;">
                                <img src="{{ url("/images/kategori/makanan.png" )}}" alt="Card image cap test" style="size: 100%;">
                                    <div class="card-img-overlay card-img-overlay-a">
                                        <center>
                                          <p class="card-title card-title-a" style="color: #fff;">MAKANAN</p>
                                        </center>
                                    </div>
                              </div>
                              </a>
                            </div>

                            <div class="col-md-2">

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
</body>

</html>