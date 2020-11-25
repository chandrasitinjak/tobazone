@extends('informasi-pariwisata.layouts.wisatawan.master')


<head>
    <title>Objek Wisata</title>

    <meta name='viewport' content='initial-scale=1,maximum-scale=1,user-scalable=no' />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v1.11.0/mapbox-gl.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v1.11.0/mapbox-gl.css' rel='stylesheet' />
    <style>
    .marker {
    display: block;
    border: none;
    border-radius: 50%;
    cursor: pointer;
    padding: 0;
    }
    </style>
</head>
    

@section('content')
    <div class="jumbotron" style="background-image: url(<?= $objekWisata->foto ?>);
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
    <script>

mapboxgl.accessToken = 'pk.eyJ1IjoiYW5kcmVhczEwMDkiLCJhIjoiY2tiNGV0NzNyMGl0MTJ0bzhhNHM4NG40NyJ9._rnTijdsx8Rysc27SrGyxg';
  var geojson = {
    'type': 'FeatureCollection',
    'features': [
      {
      'type': 'Feature',
      'properties': {
      'message': '{{ $objekWisata->nama_objek_wisata}}',
      'iconSize': [25, 25]
      },
      'geometry': {
      'type': 'Point',
      'coordinates': [<?php echo $objekWisata->longitude ?>, <?php echo $objekWisata->latitude ?>]
      }
      }
    ]
};
var map = new mapboxgl.Map({
  container: 'map',
  style: 'mapbox://styles/mapbox/light-v10',
  center: [<?php echo $objekWisata->longitude ?>, <?php echo $objekWisata->latitude ?>],
  zoom: 8
});

// add markers to map
geojson.features.forEach(function(marker) {
// create a DOM element for the marker
var el = document.createElement('div');
el.className = 'marker';
el.style.backgroundImage =
'url(http://icons.iconarchive.com/icons/martz90/circle/24/camera-icon.png)';
el.style.width = marker.properties.iconSize[0] + 'px';
el.style.height = marker.properties.iconSize[1] + 'px';
 
el.addEventListener('click', function() {
window.alert(marker.properties.message);
});
 
// add marker to map
new mapboxgl.Marker(el)
.setLngLat(marker.geometry.coordinates)
.addTo(map);
});

// code from the next step will go here!

</script>
@endsection