@extends('layout.admin.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            @if(session('error'))
                <div class="row danger bg-danger">
                    <div class="col text-center" style="margin: 5px;">
                        {{session('error')}}
                    </div>
                </div>
            @endif
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Paket</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home.admin')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.paket')}}">Paket Wisata</a></li>
                        <li class="breadcrumb-item active">Detail</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#detail"
                                                        data-toggle="tab">Detail</a></li>
                                <li class="nav-item"><a class="nav-link" href="#layanan-wisata" data-toggle="tab">Layanan
                                        Wisata</a></li>
                                <li class="nav-item"><a class="nav-link" href="#included-not-included"
                                                        data-toggle="tab">Included & Not Included</a></li>
                                <li class="nav-item"><a class="nav-link" href="#sesi"
                                                        data-toggle="tab">Sesi/Jadwal Paket Wisata</a></li>
                                <li class="nav-item" style="margin-left: 10px">
                                    <a class="btn btn-info btn-md"
                                       href="{{ route('admin.paket.editChoice',$paket->id_paket)}}">
                                        <i class="fas fa-edit"></i>
                                        Edit Paket
                                    </a>
                                </li>
                                @if($paket->status==1)
                                    <li class="nav-item" style="margin-left: 10px">
                                        <button type="button" class="btn btn-warning btn-md" data-toggle="modal"
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
                                                        <h5 class="modal-title" id="hapusModalLongTitle">Non-Aktifkan
                                                            Paket
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
                                                            <button type="submit" class="btn btn-warning">Non-Aktifkan
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @elseif($paket->status==0)
                                    <li class="nav-item" style="margin-left: 10px">
                                        <button type="button" class="btn btn-danger btn-md" data-toggle="modal"
                                                data-target="#delete_{{$paket->id_paket}}">
                                            <i class="fas fa-trash-alt">
                                            </i>
                                            Hapus Paket
                                        </button>
                                        <div class="modal fade" id="delete_{{$paket->id_paket}}" tabindex="-1"
                                             role="dialog"
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
                                    </li>
                                    <li class="nav-item" style="margin-left: 10px">
                                        <button type="button" class="btn btn-success btn-md" data-toggle="modal"
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
                                                        <h5 class="modal-title" id="aktifkanModalLongTitle">Aktifkan
                                                            Kembali
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
                                                            <button type="submit" class="btn btn-success">Aktifkan
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @elseif($paket->status==2)
                                    <li class="nav-item" style="margin-left: 10px">
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
                                                        <h5 class="modal-title" id="restoreModalLongTitle">
                                                            <i>Restore</i>
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
                                    </li>
                                @endif
                            </ul>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="detail">
                                    <strong>{{$paket->nama_paket}}</strong>

                                    <p class="text-muted">
                                        Paket Kabupaten {{$paket->getKabupaten->nama_kabupaten}}
                                    </p>

                                    <hr>
                                    <strong>Harga Paket Wisata</strong>

                                    <p class="text-muted">
                                        {{number_format($paket->harga_paket)}}
                                    </p>

                                    <hr>
                                    <strong>Avalability</strong>

                                    <p class="text-muted">
                                        {{$paket->availability}}
                                    </p>

                                    <hr>
                                    <strong>Durasi</strong>

                                    <p class="text-muted">
                                        {{$paket->durasi}}
                                    </p>

                                    <hr>
                                    <strong>Deskripsi Paket</strong>

                                    <p class="text-muted">
                                        <?php echo $paket->deskripsi_paket; ?>
                                        <br>
                                    </p>

                                    <hr>
                                    <strong>Rencana Perjalanan</strong>

                                    <p class="text-muted">
                                        <?php echo $paket->rencana_perjalanan; ?>
                                        <br>
                                    </p>

                                    <hr>
                                    <strong>Tambahan</strong>

                                    <p class="text-muted">
                                        <?php echo $paket->tambahan; ?>
                                        <br>
                                    </p>

                                    <hr>
                                    <strong>Daerah</strong>

                                    <p class="text-muted">
                                        Kabupaten {{$paket->getKabupaten->nama_kabupaten}}
                                        <br>
                                    </p>

                                    <hr>
                                    <strong>Gambar</strong>
                                    <p></p>
                                    <div class="row border" style="border-radius: 10px;padding: 5px">
                                        <div class="col-sm-10 text-center">
                                            <img class="img-fluid" src="{{asset('storage/img/paket/'.$paket->gambar)}}"
                                                 alt="Photo">
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="layanan-wisata">
                                    @foreach($paket->getPaketLayanan as $layanan)
                                        <hr>
                                        <strong>{{$layanan->nama_layanan}}</strong>

                                        <p class="text-muted">
                                            {{$layanan->deskripsi_layanan}}
                                        </p>
                                    @endforeach
                                </div>
                                <div class="tab-pane" id="included-not-included">
                                    <strong>Included</strong>
                                    <ul>
                                        @foreach($paket->getIncludedNotIncluded as $ini)
                                            @if($ini->jenis_ini=='included')
                                                <li>
                                                    {{$ini->keterangan}}
                                                </li>
                                            @endif

                                        @endforeach
                                    </ul>
                                    <hr>
                                    <strong>Not Included</strong>

                                    <ul>
                                        @foreach($paket->getIncludedNotIncluded as $ini)
                                            @if($ini->jenis_ini=='not included')
                                                <li>
                                                    {{$ini->keterangan}}
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>

                                    <hr>
                                </div>
                                <div class="tab-pane" id="sesi">
                                    <a class="btn btn-success btn-sm" style="margin-bottom:10px"
                                       href="{{route('admin.sesi.create',$paket->id_paket)}}">
                                        <i class="fas fa-plus">
                                        </i>
                                        Tambah Sesi Paket
                                    </a>
                                    <table class="table table-striped projects">
                                        <thead>
                                        <tr>
                                            <th style="width: 1%">
                                                ID
                                            </th>
                                            <th style="width: 30%">
                                                Jadwal/tanggal Kegiatan Paket
                                            </th>
                                            <th style="width: 20%">
                                                Kuota Peserta
                                            </th>
                                            <th class="text-center">
                                                Status
                                            </th>
                                            <th style="width: 30%">
                                            </th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        {{--                    mulai loop data--}}
                                        @forelse($sesi as $index =>  $row)
                                            <tr>
                                                <td>
                                                    {{$index+1}}
                                                </td>
                                                <td>
                                                    {{$row->jadwal}}
                                                </td>
                                                <td>
                                                    <ul class="list-inline">
                                                        <li class="list-inline-item">
                                                            {{$row->kuota_peserta}}
                                                        </li>
                                                    </ul>
                                                </td>
                                                <td class="project-state">
                                                    {{$row->defineStatus($row->status)}}
                                                </td>

                                                <td class="project-actions text-right">

                                                    @if($row->status==0)
                                                        <button type="button" class="btn btn-success btn-sm"
                                                                data-toggle="modal"
                                                                data-target="#aktifkan_sesi_{{$row->id_sesi}}">
                                                            <i class="fas fa-check-circle">
                                                            </i>
                                                            Aktifkan
                                                        </button>
                                                        <div class="modal fade" id="aktifkan_sesi_{{$row->id_sesi}}"
                                                             tabindex="-1" role="dialog"
                                                             aria-labelledby="aktifkanSesiModalCenterTitle"
                                                             aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered"
                                                                 role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="aktifkanSesiModalLongTitle">
                                                                            Aktifkan Sesi Paket Wisata</h5>
                                                                        <button type="button" class="close"
                                                                                data-dismiss="modal"
                                                                                aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body text-left">
                                                                        Anda Yakin Ingin Mengaktifkan Sesi Paket ?
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                                data-dismiss="modal">
                                                                            Batal
                                                                        </button>
                                                                        <form
                                                                            action="{{route('admin.sesi.aktif',$row->id_sesi)}}"
                                                                            method="post">
                                                                            @csrf
                                                                            @method('PUT')
                                                                            <button type="submit"
                                                                                    class="btn btn-success">
                                                                                Aktifkan
                                                                            </button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    <a class="btn btn-info btn-sm"
                                                       href="{{ route('admin.sesi.edit',$row->id_sesi) }}">
                                                        <i class="fas fa-edit">
                                                        </i>
                                                        Edit
                                                    </a>
                                                    @if($row->status==0)
                                                        <button type="button" class="btn btn-danger btn-sm"
                                                                data-toggle="modal"
                                                                data-target="#delete_sesi_{{$row->id_sesi}}">
                                                            <i class="fas fa-trash-alt">
                                                            </i>
                                                            Hapus
                                                        </button>
                                                        <div class="modal fade" id="delete_sesi_{{$row->id_sesi}}"
                                                             tabindex="-1" role="dialog"
                                                             aria-labelledby="deleteModalCenterTitle"
                                                             aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered"
                                                                 role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="hapusModalLongTitle">
                                                                            Hapus Sesi Paket Wisata</h5>
                                                                        <button type="button" class="close"
                                                                                data-dismiss="modal"
                                                                                aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body text-left">
                                                                        Anda Yakin Ingin Menghapus Sesi Paket ...
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                                data-dismiss="modal">
                                                                            Batal
                                                                        </button>
                                                                        <form
                                                                            action="{{route('admin.sesi.delete',$row->id_sesi)}}"
                                                                            method="post">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit"
                                                                                    class="btn btn-danger">
                                                                                Hapus
                                                                            </button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @elseif($row->status==1)
                                                        <button type="button" class="btn btn-danger btn-sm"
                                                                data-toggle="modal"
                                                                data-target="#nonaktif_sesi_{{$row->id_sesi}}">
                                                            Non-Aktifkan
                                                        </button>
                                                        <div class="modal fade" id="nonaktif_sesi_{{$row->id_sesi}}"
                                                             tabindex="-1" role="dialog"
                                                             aria-labelledby="deleteModalCenterTitle"
                                                             aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered"
                                                                 role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="hapusModalLongTitle">
                                                                            Non-Aktifkan Sesi Paket Wisata</h5>
                                                                        <button type="button" class="close"
                                                                                data-dismiss="modal"
                                                                                aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body text-left">
                                                                        Anda Yakin Ingin Non-Aktifkan Sesi Paket ?
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                                data-dismiss="modal">
                                                                            Batal
                                                                        </button>
                                                                        <form
                                                                            action="{{route('admin.sesi.nonaktif',$row->id_sesi)}}"
                                                                            method="post">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit"
                                                                                    class="btn btn-danger">
                                                                                Non-Aktifkan
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
                                                <td colspan="6" class="text-center">Belum Ada Sesi</td>
                                            </tr>
                                        @endforelse
                                        <tr>
                                            <td colspan="6" class="text-center">
                                                {!! $sesi->links() !!}
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </section>
@endsection
