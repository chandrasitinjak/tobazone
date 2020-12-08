@extends('layouts.wisatawan.master')


<head>
    <title>Akomodasi</title>

    <script src="{{asset('js_wisatawan/google-map.js')}}"></script>
    <script type="text/javascript">
    var map ;
    var posisi = {lat:<?= $akomodasi->latitude ?>, lng: <?= $akomodasi->longitude?>};
    var gambar = "http://icons.iconarchive.com/icons/paomedia/small-n-flat/32/map-marker-icon.png";
    var isiInfo = "<b><?= $akomodasi->nama_akomodasi ?></b> </br>"+
    "Kabupaten : <?= $akomodasi->kabupaten->nama_kabupaten ?> </br>" +
    "Lokasi : <?= $akomodasi->lokasi?>";

    function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
              zoom: 14,
              center: posisi
            });
            var marker = new google.maps.Marker({
              position:posisi,
              map: map,
              draggable: true,
              title: '<?= $akomodasi->nama_objek_wisata ?>',
              icon: gambar,
       });
       var infoWindow = new google.maps.InfoWindow({
       content: isiInfo,
       });
       marker.addListener('click',function() {
       infoWindow.open(map,marker);
       });
    }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCqk0o7gAPnf-hWOKtlFPjYtvWBKgDo33o&callback=initMap">
    </script>
</head>
    

@section('content')
    <div class="jumbotron" style="background-image: url(Kab/information/Akomodasi/<?= $akomodasi->foto ?>);
background-size: cover;
height: 70%;">
    </div>

    <div class="container">
      <div class="row justify-content-center pb-4">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <h2 class="mb-4">{{ $akomodasi->nama_akomodasi}}</h2>
          </div>
      </div>
      <p>
        <?= $akomodasi->deskripsi ?>
      </p>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      </p>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      </p>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      </p>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      </p>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      </p>
    </div>

     <div class="container">
       <div class="row justify-content-center pb-4">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <h4 class="mb-4">Map</h2>
          </div>
      </div> 
       <div id="map" style="height: 500px"></div>
     </div>
     <br>
   

  
    <style type="text/css">
        .kabupaten{
            margin-bottom: 20px;
        }
    </style>
@endsection