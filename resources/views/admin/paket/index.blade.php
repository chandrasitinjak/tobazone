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
                            <strong class="card-title">Paket Wisata</strong>
                            | <a class="btn btn-success btn-sm" href="{{route('admin.paket.tambah')}}">
                                <i class="fa fa-plus">
                                </i>
                                Tambah Paket Wisata
                            </a>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="row">#</th>
                                    <th>Gambar</th>
                                    <th>Nama Paket Wisata</th>
                                    <th>Harga Paket</th>
                                    <th>Kabupaten</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($pakets as $index => $paket)
                                    <tr>
                                        <th scope="row">{{$index+1}}</th>
                                        <td>
                                            <ul class="list-inline" style="max-width: 100px">
                                                <li class="list-inline-item">
                                                    <img alt="Avatar" class="table-avatar"
                                                         src="{{asset('/storage/img/paket/'.$paket->gambar)}}">
                                                </li>
                                            </ul>
                                        </td>
                                        <td>{{$paket->nama_paket}}</td>
                                        <td>{{$paket->harga_paket}}</td>
                                        <td><span class="address">{{$paket->getKabupaten->nama_kabupaten}}</span></td>
                                        <td>
                                            @if($paket->status==0)
                                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                                        data-target="#aktifkan_{{$paket->id_paket}}">
                                                    <i class="fa fa-check-circle">
                                                    </i>
                                                </button>
                                            @endif
                                            <a href="{{route('admin.paket.show',$paket->id_paket)}}">
                                                <button type="button" class="btn btn-primary btn-sm"
                                                        title="Lihat Detail">
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                            </a>
                                            <a href="{{route('admin.paket.editChoice',$paket->id_paket)}}">
                                                <button type="button" class="btn btn-info btn-sm" title="Edit">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                            </a>
                                            @if($paket->status==2)
                                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                                        data-target="#restore_{{$paket->id_paket}}">
                                                    <i class="fa fa-recycle">
                                                    </i>
                                                    Restore
                                                </button>

                                            @elseif($paket->status==0)
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                        data-target="#delete_{{$paket->id_paket}}">
                                                    <i class="fa fa-trash">
                                                    </i>
                                                </button>
                                            @elseif($paket->status==1)
                                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                                        data-target="#nonaktif_{{$paket->id_paket}}">
                                                    <i id="profil" class="fa fa-ban">
                                                    </i>
                                                </button>

                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @foreach($pakets as $index => $paket)
        @if($paket->status==0)
            <div class="modal fade" id="aktifkan_{{$paket->id_paket}}" tabindex="-1"
                 role="dialog"
                 aria-labelledby="aktifkanModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="aktifkanModalLongTitle">
                                Aktifkan Kembali
                                Paket
                                Wisata</h5>
                            <button type="button" class="close" data-dismiss="modal"
                                    aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-left">
                            Anda Yakin Ingin Mengaktifkan kembali Paket ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">
                                Tidak
                            </button>
                            <form
                                action="{{route('admin.paket.aktifkan',$paket->id_paket)}}"
                                method="post">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-success">
                                    Aktifkan
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if($paket->status==2)
            <div class="modal fade" id="restore_{{$paket->id_paket}}" tabindex="-1"
                 role="dialog"
                 aria-labelledby="restoreModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="restoreModalLongTitle"><i>Restore</i>
                                Paket
                                Wisata</h5>
                            <button type="button" class="close" data-dismiss="modal"
                                    aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-left">
                            Anda Yakin Ingin Me-<i>restore</i> Paket ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">
                                Tidak
                            </button>
                            <form
                                action="{{route('admin.paket.recycle',$paket->id_paket)}}"
                                method="post">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-warning"><i>Restore</i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @elseif($paket->status==0)
            <div class="modal fade" id="delete_{{$paket->id_paket}}" tabindex="-1"
                 role="dialog"
                 aria-labelledby="deleteModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="hapusModalLongTitle">Hapus
                                Paket
                                Wisata</h5>
                            <button type="button" class="close" data-dismiss="modal"
                                    aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-left">
                            Anda Yakin Ingin Menghapus Paket ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">
                                Batal
                            </button>
                            <form
                                action="{{route('admin.paket.hapus',$paket->id_paket)}}"
                                method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @elseif($paket->status==1)
            <div class="modal fade" id="nonaktif_{{$paket->id_paket}}" tabindex="-1"
                 role="dialog"
                 aria-labelledby="deleteModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="hapusModalLongTitle">
                                Non-Aktifkan Paket
                                Wisata</h5>
                            <button type="button" class="close" data-dismiss="modal"
                                    aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-left">
                            Anda Yakin Ingin Non-Aktifkan Paket ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">
                                Batal
                            </button>
                            <form
                                action="{{route('admin.paket.nonaktif',$paket->id_paket)}}"
                                method="post">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-warning">
                                    Non-Aktifkan
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
@endsection
