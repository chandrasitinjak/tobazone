@extends('users.anggotacbt.app')
@section('content')
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Manajemen Akomodasi</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Akomodasi</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        ​
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        @component('components.card')
                            @slot('header')
                                <b>Tambah</b>
                            @endslot

                            @if (session('error'))
                                @alert(['type' => 'danger'])
                                {!! session('error') !!}
                                @endalert
                            @endif
                            ​    @slot('body')
                                <form role="form" action="{{ route('akomodasi.store') }}" method="POST"  enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="nama_akomodasi">Nama Akomodasi</label>
                                        <input type="text" name="nama_akomodasi" class="form-control {{ $errors->has('nama_akomodasi') ? 'is-invalid':'' }}" id="nama_akomodasi" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="kabupaten_id">Kabupaten</label>
                                        <select class="form-control" name="kabupaten_id">
                                                @foreach($kabupatens as $kabupaten)
                                                <option value="{{$kabupaten->id_kabupaten}}">{{$kabupaten->nama_kabupaten}}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="category_id">Category Akomodasi</label>
                                        <select class="form-control" name="category_akomodasi_id">
                                            @foreach($categoryAkomodasis as $categoryAkomodasi)
                                                <option value="{{$categoryAkomodasi->id}}">{{$categoryAkomodasi->nama}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="lokasi">Lokasi</label>
                                        <textarea name="lokasi" id="lokasi" cols="5" rows="5" class="form-control {{ $errors->has('lokasi') ? 'is-invalid':'' }}" required=""></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="foto">Foto</label>
                                        <input type="file" name="foto" id="foto" class="form-control {{ $errors->has('foto') ? 'is-invalid':'' }}" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="longitude">Longitude</label>
                                        <input type="text" name="longitude" id="longitude" class="form-control {{ $errors->has('longitude') ? 'is-invalid':'' }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="latitude">Latitude</label>
                                        <input type="text" name="latitude" id="latitude" class="form-control {{ $errors->has('latitude') ? 'is-invalid':'' }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="deskripsi">Deskripsi</label>
                                        <textarea class="ckeditor"  name="deskripsi" id="ckedtor" cols="5" rows="5" class="form-control {{ $errors->has('deskripsi') ? 'is-invalid':'' }}" required=""></textarea>
                                    </div>
                                    @endslot
                                    @slot('footer')
                                        <div class="card-footer">
                                            <button class="btn btn-primary">Simpan</button>
                                        </div>
                                </form>
                            @endslot
                        @endcomponent
                    </div>
                    <div class="col-md-8">
                        @component('components.card')
                            @slot('header')
                                <b>Cari tempat Akomodasi</b>
                            @endslot
                            @slot('body')
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <!-- Form pencarian -->
                                            <form class="form-horizontal" id="formCariTempat" method="POST" autocomplete="off">
                                                <div class="form-group">
                                                    <label class="control-label col-sm-3" >Cari Tempat:</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="tempat" name="tempat">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-offset-3 col-sm-9">
                                                        <button type="submit" class="btn btn-default">Cari</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <!-- tempat meletakan keterangan alamat dan lat, lng -->
                                            <div id="panelContent"></div>

                                        </div>
                                        <div class="col-md-8">
                                            <center><b>Peta</b></center>
                                            <div id="map" style="height: 500px;width: 600px"></div>
                                        </div>
                                    </div>
                                </div>
                            @endslot
                            @slot('footer')
                                ​                               <i>Peta</i>
                            @endslot

                        @endcomponent('components.card')
                        @component('components.card')
                            @slot('header')
                                <b>List Akomodasi</b>
                            @endslot

                            @slot('body')
                                @if (session('success'))
                                    @component('components.alert')
                                        @slot('message')
                                            {!! session('success') !!}
                                        @endslot
                                    @endcomponent
                                @endif

                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <td>#</td>
                                            <td>Nama Akomadasi</td>
                                            <td>Lokasi</td>
                                            <td>Longitude</td>
                                            <td>Latitude</td>
                                            <td>Category</td>
                                            <td>Aksi</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php $no=1; @endphp
                                        @foreach($akomodasis as $akomodasi)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{$akomodasi->nama_akomodasi}}</td>
                                                <td>{{$akomodasi->lokasi}}</td>
                                                <td>{{$akomodasi->longitude}}</td>
                                                <td>{{$akomodasi->latitude}}</td>
                                                <td>{{$akomodasi->category_akomodasi_id}}</td>
                                                <td><form action="{{ route('akomodasi.destroy', $akomodasi->id) }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <a href="{{ route('akomodasi.show', $akomodasi->id) }}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                                                        <a href="{{ route('akomodasi.edit', $akomodasi->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                                        <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                                    </form></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    {{ $akomodasis->links() }}
                                </div>
                            @endslot
                            @slot('footer')
                                ​                               <i>List Akomodasi</i>
                            @endslot
                        @endcomponent
                    </div>
                </div>
            </div>
        </section>

        <script type="text/javascript">
            $(document).ready(function() {

                function updateMarkerPosition(latLng) {
                    document.getElementById('latitude').value = [latLng.lat()]
                    document.getElementById('longitude').value = [latLng.lng()]
                }
                $("#formCariTempat").submit(function(e) {
                    e.preventDefault();
                    //ambil value dari form
                    var namatempat=$("#tempat").val();

                    if (namatempat!="") {
                        //replace semua spasi menjadi tanda plus (+)
                        namatempat=namatempat.replace(/ /g, "+");
                        //api google maps
                        var url="https://maps.googleapis.com/maps/api/geocode/json?address="+namatempat+"&key=AIzaSyCqk0o7gAPnf-hWOKtlFPjYtvWBKgDo33o";

                        document.getElementById("panelContent").innerHTML="";

                        //ambil data dari json
                        $.getJSON(url, function(result){

                            //menampilkan peta
                            var map;
                            map = new google.maps.Map(document.getElementById('map'), {
                                zoom: 15,
                                center: {lat: result.results[0].geometry.location.lat, lng: result.results[0].geometry.location.lng},
                            });
                            var propertiPeta = {
                                center:new google.maps.LatLng(result.results[0].geometry.location.lat,result.results[0].geometry.location.lng),
                                zoom:15,
                                mapTypeId:google.maps.MapTypeId.ROADMAP,
                                mapTypeControl: false,         zoomControl: true,
                                scaleControl: false,
                                streetViewControl: false,
                                rotateControl: false,
                                fullscreenControl: false
                            }

                            //looping data json
                            $.each(result.results, function(i){
                                //menampilkan data keterangan alamat, lat, long
                                $("#latitude").val(result.results[i].geometry.location.lat);
                                $("#longitude").val(result.results[i].geometry.location.lng);
                                $("#lokasi").val(result.results[i].formatted_address);


                                var peta = new google.maps.Map(document.getElementById("map"), propertiPeta);

                                var latLng = new google.maps.LatLng(result.results[i].geometry.location.lat, result.results[i].geometry.location.lng);
                                var marker = new google.maps.Marker({
                                    position : latLng,
                                    title : 'lokasi',
                                    map : map,
                                    streetViewControl: false,
                                    draggable : true,
                                });
                                updateMarkerPosition(latLng);
                                google.maps.event.addListener(marker, 'drag', function() {
                                    updateMarkerPosition(marker.getPosition());
                                });

                                // To add the marker to the map, call setMap();
                                marker.setMap(peta);

                            });

                        });

                    }else{
                        alert("Nama tempat tidak boleh kosong!");
                    }

                });

            });

        </script>

@endsection