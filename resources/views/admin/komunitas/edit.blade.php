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
                            <h3 class="card-title">Edit Komunitas Pariwisata</h3>
                        </div>
                        <form  action="{{route('update_komunitas',$komunitas->id)}}"  method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="card-body">
                                <div class="form-group">
                                    <input type="hidden" value="{{$komunitas->id}}" name="id">
                                </div>
                                <div class="form-group">
                                    <label>Nama Komunitas</label>
                                    <input name="nama_komunitas" class="form-control" type="text" placeholder="Nama Komunitas" value="{{$komunitas->nama_komunitas}}">
                                </div>
                                <div class="form-group" >
                                    <label for="Deskripsi">Deskripsi</label>
                                    <textarea name="deskripsi" class="textarea" placeholder="Deskripsi"
                                              style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$komunitas->deskripsi}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Link WhatsApp Group Komunitas</label>
                                    <textarea name="link" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$komunitas->link}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Pilih Kabupaten</label>
                                    <select name="kabupaten_id" class="form-control" id="exampleFormControlSelect1">
                                        <option selected="" disabled="">Pilih Kabupaten</option>
                                        @foreach($kabupaten as $row)
                                            <option value="{{$row->id_kabupaten}}" @if($row->id_kabupaten) selected @endif>{{$row->nama_kabupaten}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="gambar">Gambar</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="gambar" id="gambar">
                                            <label class="custom-file-label" for="gambar">Pilih file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="">Upload</span>
                                        </div>
                                    </div>
                                    <div class="row border" style="padding: 5px;border-radius: 10px">
                                        <div class="col-sm-10 text-center">
                                            <img class="img-fluid" src="{{asset('storage/img/komunitas/'.$komunitas->gambar)}}" alt="Photo">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Edit</button>

                                <button type="button" class="btn btn-danger" data-dismiss="modal" ><a href="/adm/komunitas" style="color: #ffffff">Batal</a></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
