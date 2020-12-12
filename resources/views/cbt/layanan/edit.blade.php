@extends('users.anggotacbt.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Anggota CBT</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Layanan Wisata</a></li>
                        <li class="breadcrumb-item active">Edit Layanan Wisata</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3>Edit Data Layanan Wisata</h3>
                            @if(session('sukses'))
                                <div class="alert alert-success" role="alert">
                                    {{session('sukses')}}
                                </div>
                            @endif
                        </div>

                        <form action="{{route('anggotacbt.layanan.update',$layanan_wisata->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Layanan</label>
                                    <input name="nama_layanan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Layanan" value="{{$layanan_wisata->nama_layanan}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Pilih Jenis Layanan</label>
                                    <select name="jenisLayanan_id" class="form-control" id="exampleFormControlSelect1">
                                        @foreach($jenis_layanan as $row)
                                            <option value="{{$row->id}}" @if($layanan_wisata->jenisLayanan_id == $row->id) selected @endif>{{$row->nama_jenis_layanan}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Pilih Kabupaten</label>
                                    <select name="kabupaten_id" class="form-control" id="exampleFormControlSelect1">
                                        @foreach($kabupaten as $row)
                                            <option value="{{$row->id_kabupaten}}" @if($layanan_wisata->kabupaten_id == $row->id_kabupaten) selected @endif>{{$row->nama_kabupaten}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Deskripsi Layanan</label>
                                    <textarea name="deskripsi_layanan" class="form-control" id="exampleFormControlTextarea1" rows="3" required>{{$layanan_wisata->deskripsi_layanan}}</textarea>
                                </div>


                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button onclick="return confirm('Apakah data ini ingin diedit?')" type="submit" class="btn btn-warning">Update</button>


                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </section>
@endsection
