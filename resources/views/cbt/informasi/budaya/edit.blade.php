@extends('users.anggotacbt.app')
@section('content')
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Edit Budaya</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Manajemen Informasi</a></li>
                            <li class="breadcrumb-item"><a href="#">Budaya</a></li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        ​
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        @component('components.card')
                            @slot('header')
                                Edit
                            @endslot

                            @slot('body')
                                @if (session('error'))
                                    @alert(['type' => 'danger'])
                                    {!! session('error') !!}
                                    @endalert
                                @endif
                                ​
                                <form role="form" action="{{route('budaya.update',$budaya->id)}}" method="POST"
                                      enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="nama_budaya">Nama Budaya</label>
                                        <input type="text" name="nama_budaya"
                                               value="{{$budaya->nama_budaya}}"
                                               class="form-control {{ $errors->has('nama_budaya') ? 'is-invalid':'' }}"
                                               id="nama_budaya" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="kabupaten_id">Kabupaten</label>
                                        <select class="form-control" name="kabupaten_id">
                                            @foreach($kabupatens as $kabupaten)
                                                <option
                                                    value="{{$kabupaten->id_kabupaten}}" {{$budaya->kabupaten_id == $kabupaten->id_kabupaten?'selected' : ''}} >{{$kabupaten->nama_kabupaten}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="lokasi">Lokasi</label>
                                        <textarea name="lokasi" id="lokasi" cols="5" rows="5"
                                                  class="form-control {{ $errors->has('lokasi') ? 'is-invalid':'' }}"
                                                  required="">{{$budaya->lokasi}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="deskripsi">Deskripsi</label>
                                        <textarea name="deskripsi" id="ckedtor" class="ckeditor" cols="5" rows="5"
                                                  class="form-control {{ $errors->has('deskripsi') ? 'is-invalid':'' }}"
                                                  required="">{{$budaya->deskripsi}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="gambar">Gambar</label><br>
                                        <img src="{{asset('Kab/information/Budaya/'.$budaya->foto)}}" id="img1" style="max-width: 400px" alt=""><br><br>
                                        <input type="file" id="inpFile" name="inpFile" onchange="ubahGambar()">
                                    </div>
                                    @endslot
                                    @slot('footer')
                                        <div class="card-footer">
                                            <button class="btn btn-primary"> Update </button>
                                        </div>
                                </form>
                            @endslot
                        @endcomponent
                    </div>
                </div>
            </div>
        </section>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>

            function ubahGambar() {
                readURL();
            }

            function readURL() {
                if (inpFile.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $("#img1").attr("src", e.target.result);

                    }
                    reader.readAsDataURL(inpFile.files[0]);
                }
            }
        </script>
@endsection
