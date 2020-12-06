@extends('users.anggotacbt.app')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Kuliner</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Manajemen Informasi</a></li>
                        <li class="breadcrumb-item"><a href="#">Kuliner</a></li>
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
                            <form role="form" action="{{ route('kuliner.update', $kuliner->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="PUT">
                                <div class="form-group">
                                    <label for="nama_kuliner">Nama Kuliner</label>
                                    <input type="text" name="nama_kuliner" value="{{ $kuliner->nama_kuliner}}" class="form-control {{ $errors->has('nama_kuliner') ? 'is-invalid':'' }}" id="nama_kuliner" required>
                                </div>
                                <div class="form-group">
                                    <label for="jenis_kuliner">Jenis Kuliner</label>
                                    <input type="text" name="jenis_kuliner" value="{{ $kuliner->jenis_kuliner}}" class="form-control {{ $errors->has('jenis_kuliner') ? 'is-invalid':'' }}" id="jenis_kuliner" required>
                                </div>
                                <div class="form-group">
                                    <label for="lokasi">Lokasi</label>
                                    <textarea name="lokasi" id="lokasi" cols="5" rows="5" class="form-control {{ $errors->has('lokasi') ? 'is-invalid':'' }}" required="">{{ $kuliner->lokasi}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="longitude">Longitude</label>
                                    <input type="text" name="longitude" id="longitude" class="form-control {{ $errors->has('longitude') ? 'is-invalid':'' }}" value="{{ $kuliner->longitude}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="latitude">Latitude</label>
                                    <input type="text" name="latitude" id="latitude" class="form-control {{ $errors->has('latitude') ? 'is-invalid':'' }}" value="{{ $kuliner->latitude}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea class="ckeditor"  name="deskripsi" id="ckedtor" cols="5" rows="5" class="form-control {{ $errors->has('deskripsi') ? 'is-invalid':'' }}" required=""> {{$kuliner->deskripsi}} </textarea>
                                </div>
                                @endslot
                                @slot('footer')
                                    <div class="card-footer">
                                        <button class="btn btn-info"><i class="fa fa-edit"></i> Update</button>
                                    </div>
                            </form>
                        @endslot
                    @endcomponent
                </div>
            </div>
        </div>
    </section>
@endsection