@extends('layout.admin.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Adminstrator</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home.admin')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.paket')}}">Paket Wisata</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.paket.show',$id_paket)}}">Detail</a></li>
                        <li class="breadcrumb-item active">Tambah Sesi Wisata</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Sesi Wisata</h3>
                        </div>
                        <form action="{{ route('admin.sesi.store',$id_paket) }}" method="post"
                              enctype="multipart/form-data"
                              id="store-form">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="kuota">Kuota Peserta</label>
                                    <input type="number" class="form-control"
                                           name="kuota_peserta"
                                           id="kuota_peserta"
                                           placeholder="Kouta Peserta" value="0" min="0" required>
                                    {{--                                    <p class="text-danger">{{$error->first('nama-paket-wisata')}}</p>--}}
                                </div>
                                <div class="form-group">
                                    <label for="jadwal">Jadwal</label>
                                    <input type="date" class="form-control"
                                           name="jadwal"
                                           id="jadwal" required>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{route('admin.paket.show',$id_paket)}}" class="btn btn-danger">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
