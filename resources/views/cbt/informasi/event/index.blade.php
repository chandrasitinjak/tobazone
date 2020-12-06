@extends('users.anggotacbt.app')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Manajemen Event</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Manajemen Informasi</li>
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
                            <form role="form" action="{{ route('event.store') }}" method="POST"  enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="nama_event">Nama Event</label>
                                    <input type="text" name="nama_event" class="form-control {{ $errors->has('nama_event') ? 'is-invalid':'' }}" id="nama_event" required>
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
                                    <label for="tgl_awal">Tanggal Mulai</label>
                                    <input type="date" name="tgl_awal" class="form-control {{ $errors->has('tgl_awal') ? 'is-invalid':'' }}" id="tgl_awal" required>
                                </div>
                                <div class="form-group">
                                    <label for="tgl_akhir">Tanggal Selesai</label>
                                    <input type="date" name="tgl_akhir" class="form-control {{ $errors->has('tgl_akhir') ? 'is-invalid':'' }}" id="tgl_akhir" required>
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
                            <b>List Event</b>
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
                                        <td>Nama Event</td>
                                        <td>Tanggal mulai</td>
                                        <td>Tanggal Selesai</td>
                                        <td>Lokasi</td>
                                        <td>Aksi</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php $no=1; @endphp
                                    @foreach($events as $event)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{$event->nama_event}}</td>
                                            <td>{{ $event->tgl_awal }}</td>
                                            <td>{{ $event->tgl_akhir }}</td>
                                            <td>{{$event->lokasi}}</td>

                                            <td><form action="{{ route('event.destroy', $event->id) }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <a href="{{ route('event.edit', $event->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                                    <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                                </form></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{ $events->links() }}
                            </div>
                        @endslot
                        @slot('footer')
                            ​                               <i>List Event</i>
                        @endslot
                    @endcomponent
                </div>
            </div>
        </div>
    </section>
@endsection