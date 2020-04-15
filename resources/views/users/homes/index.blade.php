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
    <link rel="shortcut icon" href="/images/assets/icon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="/user-assets/css/core-style.css">
    <link rel="stylesheet" href="/user-assets/style.css">

</head>

<body>
<div id="app">
    @include('users.layouts.header')    
    <section>
        <div class="mt-0">            
            <carousel> </carousel>            
        </div>
    </section>

    <div id="new-product">
        @if(Auth::check())
            <new-products :user-id="{{Auth::user()->id}}" :title="'Produk Terbaru'"/>
            
        @else
            <new-products :title="'Produk Terbaru'"/>
        @endif
    </div>

    <div id="banner">
        <banner/>
    </div>
</div>
@include('users.layouts.footer')
@include('users.layouts.script')
</body>

</html>