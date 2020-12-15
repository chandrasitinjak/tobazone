@extends('users.anggotacbt.app')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Event</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Manajemen Informasi</a></li>
                        <li class="breadcrumb-item"><a href="#">Event</a></li>
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
                            <form role="form" action="{{ route('event.update', $event->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="PUT">
                                <div class="form-group">
                                    <label for="nama_event">Nama Event</label>
                                    <input type="text" name="nama_event" value="{{ $event->nama_event}}" class="form-control {{ $errors->has('nama_event') ? 'is-invalid':'' }}" id="nama_event" required>
                                </div>
                                <div class="form-group">
                                    <label for="tgl_awal">Tanggal Mulai</label>
                                    <input type="date" name="tgl_awal"  value="{{ $event->tgl_awal }}" class="form-control {{ $errors->has('tgl_awal') ? 'is-invalid':'' }}" id="tgl_awal" required>
                                </div>
                                <div class="form-group">
                                    <label for="tgl_akhir">Tanggal Selesai</label>
                                    <input type="date" name="tgl_akhir" value="{{ $event->tgl_akhir }}" class="form-control {{ $errors->has('tgl_akhir') ? 'is-invalid':'' }}" id="tgl_akhir" required>
                                </div>
                                <div class="form-group">
                                    <label for="lokasi">Lokasi</label>
                                    <textarea name="lokasi" id="lokasi" cols="5" rows="5" class="form-control {{ $errors->has('lokasi') ? 'is-invalid':'' }}" required="">{{ $event->lokasi}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea name="deskripsi" id="ckedtor" cols="5" rows="5" class="form-control {{ $errors->has('deskripsi') ? 'is-invalid':'' }}" required=""> {{$event->deskripsi}} </textarea>
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