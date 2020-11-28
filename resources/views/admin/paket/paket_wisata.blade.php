@extends('layout.admin.app')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Paket Wisata</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home.admin')}}">Home</a></li>
                        <li class="breadcrumb-item active">Paket Wisata</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    Paket Wisata
                    |
                    <a class="btn btn-success btn-sm" href="{{route('admin.paket.tambah')}}">
                        <i class="fas fa-plus">
                        </i>
                        Tambah Paket Wisata
                    </a>
                </h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
                            title="Remove">
                        <i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                    <tr>
                        <th style="width: 50px;">
                            ID
                        </th>
                        <th style="width: 50px;">
                            Gambar
                        </th>
                        <th style="width: 300px;">
                            Nama Paket Wisata
                        </th>
                        <th style="width: 50px;" class="text-center">
                            Harga Paket
                        </th>
                        <th style="width: 190px;" class="text-center">
                            Kabupaten
                        </th>
                        <th style="width: 120px;" class="text-center">
                            Status
                        </th>
                        <th style="width: 360px">
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <form action="{{route('admin.paket.filter')}}" method="post">
                        @csrf
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <div class="form-group">
                                    <select name="kabupaten" class="form-control custom-select">
                                        <option selected="" disabled="">Pilih Kabupaten</option>
                                        <option
                                            value="semua" {{(isset($id_kabupaten)&&($id_kabupaten=='semua'))?'selected':null}}>
                                            Semua Kabupaten
                                        </option>
                                        @foreach($kabupaten as $row)
                                            <option
                                                value="{{$row->id_kabupaten}}" {{(isset($id_kabupaten)&&($id_kabupaten==$row->id_kabupaten))?'selected':null}}>{{$row->nama_kabupaten}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <select name="status" class="form-control custom-select">
                                        <option selected="" disabled="">Pilih Status</option>
                                        <option value="-1" {{(isset($id_status)&&($id_status== -1))?'selected':null}}>
                                            Semua Status
                                        </option>
                                        <option value="0" {{(isset($id_status)&&($id_status==0))?'selected':null}}>
                                            Non-Aktif
                                        </option>
                                        <option value="1" {{(isset($id_status)&&($id_status==1))?'selected':null}}>
                                            Aktif
                                        </option>
                                        <option value="2" {{(isset($id_status)&&($id_status==2))?'selected':null}}>
                                            Dihapus
                                        </option>
                                    </select>
                                </div>
                            </td>
                            <td class="text-center">
                                <button style="width: 180px" type="submit" class="btn btn-success btn-sm"><i
                                        class="fa fa-filter"></i>Filter
                                </button>
                            </td>
                        </tr>
                    </form>
                    {{--                    mulai loop data--}}
                    @forelse($pakets as $index => $paket)
                        <tr>
                            <td>
                                {{$index+1}}
                            </td>
                            <td>
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <img alt="Avatar" class="table-avatar"
                                             src="{{asset('storage/img/paket/'.$paket->gambar)}}">
                                    </li>
                                </ul>
                            </td>
                            <td>
                                {{$paket->nama_paket}}
                            </td>
                            <td class="project-state">
                                <span class="badge badge-info">Rp. {{number_format($paket->harga_paket)}}</span>
                            </td>
                            <td class="project-state">
                                <span class="badge badge-primary">{{$paket->getKabupaten->nama_kabupaten}}</span>
                            </td>
                            <td class="project-state">
                                <span
                                    class="badge badge-{{$paket->defineClass($paket->status)}}">{{$paket->defineStatus($paket->status)}}</span>
                            </td>
                            <td class="project-actions text-center">
                                @if($paket->status==0)
                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                            data-target="#aktifkan_{{$paket->id_paket}}">
                                        <i class="fas fa-check-circle">
                                        </i>
                                        Aktifkan
                                    </button>
                                    <div class="modal fade" id="aktifkan_{{$paket->id_paket}}" tabindex="-1"
                                         role="dialog"
                                         aria-labelledby="aktifkanModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="aktifkanModalLongTitle">Aktifkan Kembali
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
                                                    <form action="{{route('admin.paket.aktifkan',$paket->id_paket)}}"
                                                          method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" class="btn btn-success">Aktifkan
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <a class="btn btn-primary btn-sm" href="{{route('admin.paket.show',$paket->id_paket)}}">
                                    <i class="fas fa-eye">
                                    </i>
                                    Lihat
                                </a>
                                <a class="btn btn-info btn-sm"
                                   href="{{ route('admin.paket.editChoice',$paket->id_paket)}}">
                                    <i class="fas fa-edit">
                                    </i>
                                    Edit
                                </a>
                                @if($paket->status==2)
                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                            data-target="#restore_{{$paket->id_paket}}">
                                        <i class="fas fa-recycle">
                                        </i>
                                        Restore
                                    </button>
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
                                                    <form action="{{route('admin.paket.recycle',$paket->id_paket)}}"
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
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#delete_{{$paket->id_paket}}">
                                        <i class="fas fa-trash-alt">
                                        </i>
                                        Hapus
                                    </button>
                                    <div class="modal fade" id="delete_{{$paket->id_paket}}" tabindex="-1" role="dialog"
                                         aria-labelledby="deleteModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="hapusModalLongTitle">Hapus Paket
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
                                                    <form action="{{route('admin.paket.hapus',$paket->id_paket)}}"
                                                          method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @elseif($paket->status==1)
                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                            data-target="#nonaktif_{{$paket->id_paket}}">
                                        <i class="fas fa-ban">
                                        </i>
                                        Non-Aktifkan
                                    </button>
                                    <div class="modal fade" id="nonaktif_{{$paket->id_paket}}" tabindex="-1"
                                         role="dialog"
                                         aria-labelledby="deleteModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="hapusModalLongTitle">Non-Aktifkan Paket
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
                                                    <form action="{{route('admin.paket.nonaktif',$paket->id_paket)}}"
                                                          method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" class="btn btn-warning">Non-Aktifkan
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Tidak Ada Data</td>
                        </tr>
                    @endforelse
                    <tr>
                        <td colspan="6" class="text-center">
                            {!! $pakets->links() !!}
                        </td>
                    </tr>
                    </tbody>
                </table>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
@endsection
