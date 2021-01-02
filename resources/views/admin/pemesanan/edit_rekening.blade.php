@extends('admin.layouts.app')
@section('title') {{ "Paket Wisata" }}
@endsection

@section('content')
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Rekening</h3>
                        </div>
                        <form  action="{{route('admin.rekening.update',$rekening->id_rekening)}}"  method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Bank</label>
                                    <input name="nama_bank" class="form-control" type="text" placeholder="Nama Bank" value="{{$rekening->nama_bank}}">
                                </div>
                                <div class="form-group">
                                    <label>Nama Bank</label>
                                    <input name="nomor_rekening" class="form-control" type="text" placeholder="Nomor Rekening" value="{{$rekening->nomor_rekening}}">
                                </div>
                                <div class="form-group">
                                    <label for="gambar">Gambar/Logo Bank</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="gambar" id="gambar"
                                            >
                                            <label class="custom-file-label" for="gambar">Choose file</label>
                                        </div>

                                    </div>
                                    <br>
                                    <div class="row border" style="padding: 5px;border-radius: 10px">
                                        <div class="col-sm-10 text-center">
                                            <img class="img-fluid" src="{{asset('storage/img/rekening/'.$rekening->gambar)}}"
                                                 alt="Photo">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Edit</button>
                                <a href="{{route('admin.pemesanan')}}" class="btn btn-danger">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
