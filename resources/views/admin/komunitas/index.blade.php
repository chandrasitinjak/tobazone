@extends('admin.layouts.app')
@section('title') {{ "Paket Wisata" }}
@endsection

@section('content')

    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">
                                Komunitas Pariwisata
                            </strong>
                             | <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                    data-target="#exampleModal">
                                <i class="fa fa-plus"> </i> Tambah data komunitas
                            </button>
                            <div class="card-tools">

                            </div>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped projects">
                                <thead>
                                <tr>
                                    <th style="width: 20%">
                                        Nama Komunitas
                                    </th>
                                    <th>
                                        Deskripsi
                                    </th>
                                    <th>
                                        Link Gabung Group Komunitas
                                    </th>
                                    <th class="text-center" style="width: 20%">
                                        Kabupaten
                                    </th>
                                    <th class="text-center" style="width:25%">
                                        Aksi
                                    </th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data_komunitas as $komunitas)
                                    <tr>
                                        <td>{{$komunitas->nama_komunitas}}</td>
                                        <td> <?php echo str_limit($komunitas->deskripsi, 100, '...'); ?></td>
                                        <td><a href="{{$komunitas->link}}">{{$komunitas->link}}</a></td>
                                        <td>{{$komunitas->getKabupaten->nama_kabupaten}}</td>
                                        <td class="text-center">
                                            <a href="{{route('show_komunitas',$komunitas->id)}}" class="btn btn-primary btn-sm"><i
                                                    class="fa fa-eye"></i>Lihat</a>
                                            <a href="{{ route('edit_komunitas',$komunitas->id)}}" class="btn btn-info btn-sm"><i
                                                    class="fa fa-edit"> </i> Edit</a>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#delete_{{$komunitas->id}}">
                                                <i class="fas fa-trash-alt">
                                                </i>
                                                Hapus
                                            </button>

                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>

                        <!-- Modal -->

                        <!-- Modal -->



                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"> Tambah Komunitas</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{route('tambah_komunitas')}}" enctype="multipart/form-data" role="form"
                                          method="POST">
                                        {{csrf_field()}}
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Nama Komunitas</label>
                                                <input name="nama_komunitas" class="form-control" type="text"
                                                       placeholder="Nama Komunitas">
                                            </div>
                                            <div class="form-group">
                                                <label for="Deskripsi">Deskripsi</label>
                                                <textarea name="deskripsi" class="textarea" placeholder="Deskripsi"
                                                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
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
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Link WhatsApp Group Komunitas</label>
                                                <textarea name="link" class="form-control" id="exampleFormControlTextarea1"
                                                          rows="3"></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Pilih Kabupaten</label>
                                                <select name="kabupaten_id" class="form-control" id="exampleFormControlSelect1">
                                                    <option selected="" disabled="">Pilih Kabupaten</option>
                                                    @foreach($kabupaten as $row)
                                                        <option value="{{$row->id_kabupaten}}">{{$row->nama_kabupaten}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Tambah</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
    @foreach($data_komunitas as $komunitas)
        <div class="modal fade" id="delete_{{$komunitas->id}}" tabindex="-1" role="dialog"
             aria-labelledby="deleteModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="hapusModalLongTitle">Hapus Komunitas</h5>
                        <button type="button" class="close" data-dismiss="modal"
                                aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-left">
                        Anda Yakin Ingin Menghapus Komunitas ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            Batal
                        </button>
                        <a href="{{ route('hapus_komunitas',$komunitas->id)}}"
                           class="btn btn-danger btn-md">
                            <i class="fa fa-trash-alt"> </i> Hapus
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
