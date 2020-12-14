@extends('users.anggotacbt.app')
@section('content')
    <div class="jumbutron">
        <div class="jumbotron text-white jumbotron-image shadow ml-2"  style="height:500px;background-image: url({{'/Kab/information/Akomodasi/'.$akomodasi->foto}});background-size:2000px 1000px ;background-repeat: no-repeat">
            <h1 class="mb-4 text-white">
                <span class="badge badge-light">{{$akomodasi->nama_akomodasi}}</span>
            </h1>
            <p class="mb-4">
            <h4><span class="badge badge-warning">Akomodasi</span></h4>
            </p>
        </div>
    </div>

    <div class="row ml-2">
        <div class="col-md-8">
            <h3>Deskripsi</h3>
            <?php echo $akomodasi->deskripsi ?>
        </div>
        <div class="col-md-4">
            <h3>Lokasi</h3><br>
            <div id="map" style="height: 400px;width: 400px"></div>
        </div>
    </div>

    <style>
        .marker {
            display: block;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            padding: 0;
        }
    </style>
    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v1.11.0/mapbox-gl.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v1.11.0/mapbox-gl.css' rel='stylesheet' />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.5.3/umd/popper.min.js"></script>
    <script>

        mapboxgl.accessToken = 'pk.eyJ1IjoiYW5kcmVhczEwMDkiLCJhIjoiY2tiNGV0NzNyMGl0MTJ0bzhhNHM4NG40NyJ9._rnTijdsx8Rysc27SrGyxg';
        var geojson = {
            'type': 'FeatureCollection',
            'features': [
                {
                    'type': 'Feature',
                    'properties': {
                        'message': '{{ $akomodasi->nama_akomodasi}}',
                        'iconSize': [25, 25]
                    },
                    'geometry': {
                        'type': 'Point',
                        'coordinates': [<?php echo $akomodasi->longitude ?>, <?php echo $akomodasi->latitude ?>]
                    }
                }
            ]
        };
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/light-v10',
            center: [<?php echo $akomodasi->longitude ?>, <?php echo $akomodasi->latitude ?>],
            zoom: 8
        });

        // add markers to map
        geojson.features.forEach(function(marker) {
            // create a DOM element for the marker
            var el = document.createElement('div');
            el.className = 'marker';
            el.style.backgroundImage =
                'url(http://icons.iconarchive.com/icons/google/noto-emoji-travel-places/24/42493-hotel-icon.png)';
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