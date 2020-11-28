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
                        <li class="breadcrumb-item"><a href="{{route('admin.paket.show',$sesi->getPaket->id_paket)}}">Detail</a></li>
                        <li class="breadcrumb-item active">Edit Sesi Wisata</li>
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
                            <h3 class="card-title">Edit Sesi Wisata</h3>
                        </div>
                        <form action="{{ route('admin.sesi.update',$sesi->id_sesi) }}" method="post"
                              enctype="multipart/form-data"
                              id="store-form">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="kuota_peserta">Kuota Peserta</label>
                                    <input type="number" class="form-control"
                                           name="kuota_peserta"
                                           id="kuota_peserta"
                                           placeholder="Kuota Peserta" value="{{$sesi->kuota_peserta}}" min="0" required>
                                    {{--                                    <p class="text-danger">{{$error->first('nama-paket-wisata')}}</p>--}}
                                </div>
                                <div class="form-group">
                                    <label for="jadwal">Jadwal</label>
                                    <input type="date" value="{{$sesi->jadwal}}" class="form-control"
                                           name="jadwal"
                                           id="jadwal" required>
                                </div>

                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control custom-select" name="status" id="status" required>
                                        <option selected="" disabled="">Pilih status</option>

                                        <option value="1" {{($sesi->status==1)?'selected':null}}>Aktif</option>
                                        <option value="0" {{($sesi->status==0)?'selected':null}}>Non-Aktif</option>

                                    </select>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Edit</button>
                                <a href="{{route('admin.paket.show',$sesi->getPaket->id_paket)}}" class="btn btn-danger">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
