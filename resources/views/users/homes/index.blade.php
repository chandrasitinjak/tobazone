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
              
            
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <center>
                                <h3>Kategori</h3>
                            </center>
                        </div>
                    </div>

                    <div class="col-md-12">

                        
                        <div class="row">
                            
                            <div class="col-md-4">
                            <a href="{{ url('/product/ulos') }}">
                            <div class="card bg-dark text-white">
                            <img src="{{ url("/images/banners/banner-1.png" )}}" alt="Card image cap test" style="height:12.6em">
                                <div class="card-img-overlay">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                    <p class="card-text">Last updated 3 mins ago</p>
                                </div>
                                </div>
                            </a>
                            </div>
                            

                            <div class="col-md-4">
                            <a href="{{ url('/product/pakaian') }}">
                            <div class="card bg-dark text-white">
                            <img src="{{ url("/images/banners/banner-1.png" )}}" alt="Card image cap test" style="height:12.6em">
                                <div class="card-img-overlay p-lg-5">
                                    <h5 class="align-items : center">Ulos</h5>                                    
                                </div>
                                </div>
                            </a>
                            </div>                            

                            <div class="col-md-4">
                            <a href="{{ url('/product/makanan') }}">
                            <div class="card bg-dark text-white">
                            <img src="{{ url("/images/banners/banner-1.png" )}}" alt="Card image cap test" style="height:12.6em">
                                <div class="card-img-overlay">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                    <p class="card-text">Last updated 3 mins ago</p>
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
                            <div class="card bg-dark text-white">
                            <img src="{{ url("/images/banners/banner-1.png" )}}" alt="Card image cap test" style="height:12.6em">
                                <div class="card-img-overlay">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                    <p class="card-text">Last updated 3 mins ago</p>
                                </div>
                                </div>
                            </a>
                            </div>

                            <div class="col-md-4">
                            <a href="{{ url('/product/obat') }}">   
                            <div class="card bg-dark text-white">
                            <img src="{{ url("/images/banners/banner-1.png" )}}" alt="Card image cap test" style="height:12.6em">
                            <div class="card-img-overlay">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <p class="card-text">Last updated 3 mins ago</p>
                            </div>
                            </div>
                            </a>
                            </div>

                            <div class="col-md-2">

                            </div>
                        </div>
                    </div>
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