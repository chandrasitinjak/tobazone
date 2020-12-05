@extends('users.anggotacbt.app')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Manajemen Budaya</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Kategori</li>
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
                        ​                            @slot('body')
                            <form role="form" action="" method="POST"  enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="nama_budaya">Nama Budaya</label>
                                    <input type="text" name="nama_budaya" class="form-control {{ $errors->has('nama_budaya') ? 'is-invalid':'' }}" id="nama_budaya" required>
                                </div>
                                <div class="form-group">
                                    <label for="kabupaten_id">Kabupaten</label>
                                    <select class="form-control" name="kabupaten_id">
                                        @foreach($kabupatens as $kabupaten)
                                            <option value="{{$kabupaten->id_kabupaten}}">{{$kabupaten->nama_kabupaten}}</option>
                                        @endforeach
                                    </select>
                                </div>                           <div class="form-group">
                                    <label for="lokasi">Lokasi</label>
                                    <textarea name="lokasi" id="lokasi" cols="5" rows="5" class="form-control {{ $errors->has('lokasi') ? 'is-invalid':'' }}" required=""></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="foto">Foto</label>
                                    <input type="file" name="foto" id="foto" class="form-control {{ $errors->has('foto') ? 'is-invalid':'' }}" required="">
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
                            <b>List Budaya</b>
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
                                        <td>Nama Budaya</td>
                                        <td>Lokasi</td>
                                        <td>Cbt</td>
                                        <td>Aksi</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php $no=1; @endphp
                                    @foreach($budayas as $budaya)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{$budaya->nama_budaya}}</td>
                                            <td>{{$budaya->lokasi}}</td>
                                            <td>{{$budaya->cbt_id}}</td>

                                            <td><form action="{{ route('Budaya.destroy', $budaya->id) }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <a href="{{ route('Budaya.edit', $budaya->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                                    <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                                </form></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{ $budayas->links() }}
                            </div>
                        @endslot
                        @slot('footer')
                            ​                               <i>List Budaya</i>
                        @endslot
                    @endcomponent
                </div>
            </div>
        </div>
    </section>


    </div>
@endsection