@extends('layouts.wisatawan.master')


<head>
    <title>Objek Wisata</title>

    <script src="{{asset('js_wisatawan/google-map.js')}}"></script>
    <script type="text/javascript">
    var map ;
    var posisi = {lat:<?= $objekWisata->latitude ?>, lng: <?= $objekWisata->longitude?>};
    var gambar = "http://icons.iconarchive.com/icons/paomedia/small-n-flat/32/map-marker-icon.png";
    var isiInfo = "<b><?= $objekWisata->nama_objek_wisata ?></b> </br>"+
    "Kabupaten : <?= $objekWisata->kabupaten->nama_kabupaten ?> </br>" +
    "Lokasi : <?= $objekWisata->lokasi?>";

    function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
              zoom: 14,
              center: posisi
            });
            var marker = new google.maps.Marker({
              position:posisi,
              map: map,
              draggable: true,
              title: '<?= $objekWisata->nama_objek_wisata ?>',
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
    <div class="jumbotron" style="background-image: url(Kab/information/ObjekWisata/<?= $objekWisata->foto ?>);
background-size: cover;
height: 70%;">
    </div>

    <div class="container">
      <div class="row justify-content-center pb-4">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <h2 class="mb-4">{{ $objekWisata->nama_objek_wisata}}</h2>
            <hr>
          </div>
      </div>
      <p>
        <?= $objekWisata->deskripsi ?>
      </p>
      <p>
       
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