<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Map</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css_wisatawan/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css_wisatawan/animate.css') }}">
    
    <link rel="stylesheet" href="{{ asset('css_wisatawan/owl.carousel.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('css_wisatawan/owl.theme.default.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('css_wisatawan/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('css_wisatawan/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('css_wisatawan/ionicons.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css_wisatawan/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('css_wisatawan/jquery.timepicker.css') }}">

    
    <link rel="stylesheet" href="{{asset('css_wisatawan/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('css_wisatawan/icomoon.css')}}">
    <link rel="stylesheet" href="{{asset('css_wisatawan/style.css')}}">
    <link rel="stylesheet" href="{{asset('css_wisatawan/style2.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 80%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
  <body>
     @include('informasi-pariwisata.layouts.wisatawan.module.nav')
    
    <div id="map"></div>
    <script>

      // The following example creates complex markers to indicate beaches near
      // Sydney, NSW, Australia. Note that the anchor is set to (0,32) to correspond
      // to the base of the flagpole.

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 10,
          center: {lat: 2.3484022, lng: 99.0732353}
        });

        setMarkers(map);
      }

      // Data for the markers consisting of a name, a LatLng and a zIndex for the
      // order in which these markers should display on top of each other.
      var wisatas = [
        <?php 
          foreach($objekWisatas as $objekWisata){
            echo '["'.$objekWisata->nama_objek_wisata.'", '.$objekWisata->latitude.', '.$objekWisata->longitude.', "'.$objekWisata->lokasi.'"],';
          }
        ?>
      ];


      function setMarkers(map) {
        // Adds markers to the map.

        // Marker sizes are expressed as a Size of X,Y where the origin of the image
        // (0,0) is located in the top left of the image.

        // Origins, anchor positions and coordinates of the marker increase in the X
        // direction to the right and in the Y direction down.
        var image_wisata = {
          url: 'http://icons.iconarchive.com/icons/martz90/circle/24/camera-icon.png',
          // This marker is 20 pixels wide by 32 pixels high.
          size: new google.maps.Size(20, 32),
          // The origin for this image is (0, 0).
          origin: new google.maps.Point(0, 0),
          // The anchor for this image is the base of the flagpole at (0, 32).
          anchor: new google.maps.Point(0, 32)
        };


        var shape = {
          coords: [1, 1, 1, 20, 18, 20, 18, 1],
          type: 'poly'
        };
        for (var i = 0; i < wisatas.length; i++) {
          var wisata = wisatas[i];
          var marker = new google.maps.Marker({
            position: {lat: wisata[1], lng: wisata[2]},
            map: map,
            icon: image_wisata,
            shape: shape,
            title: wisata[0]
          });
        }

      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCqk0o7gAPnf-hWOKtlFPjYtvWBKgDo33o&callback=initMap">
    </script>
    @include('informasi-pariwisata.layouts.wisatawan.module.footer')

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