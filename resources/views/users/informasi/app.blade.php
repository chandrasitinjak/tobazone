<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> @yield('title', 'Tobazone')</title>

    <link rel="shortcut icon" href="/images/assets/icon_1.png">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="/user-assets/css/core-style.css">
    <link rel="stylesheet" href="/user-assets/style.css">

    <link rel="stylesheet" href="/user-assets/css/header.css">
    <link rel="stylesheet" href="/user-assets/css/header_merchant.css">
    @yield('style')
</head>

<body>

<div id="app">
    @include('users.layouts.header')
    <div class="container-fluid">
        @include('users.layouts.cart')
        @yield('content')
    </div>
    @include('users.layouts.footer')
    <div class="modal fade" id="enlargeImageModal" tabindex="-1" role="dialog" aria-labelledby="enlargeImageModal" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                {{--<div class="modal-header">--}}
                <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="float-right" style="margin: 10px 10px 0">×</span></button>
                {{--</div>--}}
                <div class="modal-body">
                    <img src="" class="enlargeImageModalSource" style="width: 200%;">
                </div>
            </div>
        </div>
    </div>
    <!-- </div> -->
</div>
@include('users.layouts.script')
<script>
    $(document).ready(function() {
        //untuk customer
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

        //untuk merchant
        $("#sidebar2Collapse").on("click", function() {
            $("#sidebar2").addClass("active");
        });

        $("#sidebar2CollapseX").on("click", function() {
            $("#sidebar2").removeClass("active");
        });

        $("#sidebar2Collapse").on("click", function() {
            if ($("#sidebar2").hasClass("active")) {
                $(".overlay").addClass("visible");
            }
        });

        $("#sidebar2CollapseX").on("click", function() {
            $(".overlay").removeClass("visible");
        });
    });

</script>
@yield('js')
</body>
</html>
