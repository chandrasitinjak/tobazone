<!DOCTYPE html>
<html lang="en">
  <head>
    @yield('title')
    <style type="text/css">A
      .kabupaten{
        margin-bottom: 20px;
      }
    </style>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ asset('css_wisatawan/animate.css') }}">
    <link rel="stylesheet" href="{{asset('css_wisatawan/style.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

  </head>
  <body>
	<!-- nav -->
    @include('informasi-pariwisata.layouts.wisatawan.module.nav')
    <!-- END nav -->


    @yield('content')

    @include('informasi-pariwisata.layouts.wisatawan.module.footer')
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

  <script src="{{asset('js_wisatawan/jquery.min.js')}}"></script>
  <script src="{{asset('js_wisatawan/jquery-migrate-3.0.1.min.js')}}"></script>
  <script src="{{asset('js_wisatawan/popper.min.js')}}"></script>
  <script src="{{asset('js_wisatawan/bootstrap.min.js')}}"></script>
  <script src="{{asset('js_wisatawan/jquery.easing.1.3.js')}}"></script>
  <script src="{{asset('js_wisatawan/jquery.waypoints.min.js')}}"></script>
  <script src="{{asset('js_wisatawan/jquery.stellar.min.js')}}"></script>
  <script src="{{asset('js_wisatawan/owl.carousel.min.js')}}"></script>
  <script src="{{asset('js_wisatawan/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{asset('js_wisatawan/aos.js')}}"></script>
  <script src="{{asset('js_wisatawan/jquery.animateNumber.min.js')}}"></script>
  <script src="{{asset('js_wisatawan/bootstrap-datepicker.js')}}"></script>
  <script src="{{asset('js_wisatawan/scrollax.min.js')}}"></script>

  <script src="{{asset('js_wisatawan/main.js')}}"></script>
  <link rel="stylesheet" type="text/css" href="{{asset('css_wisatawan/style2.css')}}">
    
  </body>
</html>