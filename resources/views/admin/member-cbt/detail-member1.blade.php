@extends('admin.layouts.app') 
@section('title') {{ "Detail Member" }}
@endsection

@section('content')
<section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Anggota CBT</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('member')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('member')}}">Anggota CBT</a></li>
                        <li class="breadcrumb-item active">Detail</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <button type="button" class="btn btn-default" data-toggle="modal"
                                        data-target="#modal-default">
                                    <img src="{{asset('/storage/img/member/'.$member->photo)}}" class="img-fluid mb-2"
                                         alt="white sample"/>
                                </button>
                                <div class="modal fade" id="modal-default">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Gambar</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="ekko-lightbox-container">
                                                    <img src="{{asset('/storage/img/member/'.$member->photo)}}"
                                                        class="img-fluid" style="width: 100%;">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                            </div>

                            <h3 class="profile-username text-center">{{$member->getUser->name}}</h3>

                            <p class="text-muted text-center">{{$member->getUser->email}}</p>

                            @if(isset($member->getLayanan))
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Total Layanan </b> <a
                                            class="float-right"> {{$member->getLayanan->count()}}</a>
                                    </li>
                                </ul>
                            @endif
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#detailmember" data-toggle="tab">Data
                                        Diri</a></li>
                                <li class="nav-item"><a class="nav-link" href="#layanan" data-toggle="tab">Layanan
                                        Wisata</a></li>
                            </ul>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="detailmember">
                                    <strong><i class="far fa-file-alt mr-1"></i> Nama</strong>

                                    <p class="text-muted">
                                        {{$member->getUser->name}}
                                    </p>

                                    <hr>

                                    <strong><i class="fas fa-book mr-1"></i> Nomor HP</strong>

                                    <p class="text-muted">{{$member->getUser->no_HP}}</p>

                                    <hr>

                                    <strong><i class="fas fa-phone mr-1"></i> Nomor WhatsApp</strong>

                                    <p class="text-muted">{{$member->getUser->no_WA}}</p>

                                    <hr>

                                    <strong><i class="fas fa-mail-bulk mr-1"></i> Email</strong>

                                    <p class="text-muted">{{$member->getUser->email}}</p>

                                    <hr>

                                    <strong><i class="fas fa-question-circle mr-1"></i> Status</strong>

                                    <p class="text-muted">{{$member->defineStatus($member->register_status)}}</p>

                                    <hr>

                                    <strong><i class="fas fa-user-friends mr-1"></i> Komunitas</strong>


                                    <table class="table table-striped table-valign-middle">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Komunitas</th>
                                            <th>Kabupaten</th>
                                            <th>Link Whats App</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($member->getKomunitasMember as $index => $row)
                                            <tr>
                                                <td>
                                                    {{$index+1}}
                                                </td>
                                                <td>
                                                    {{$row->nama_komunitas}}
                                                </td>
                                                <td>
                                                    {{$row->getkabupaten->nama_kabupaten}}
                                                </td>
                                                <td>
                                                    {{$row->link}}
                                                </td>
                                                <td>
                                                    <form action="{{route('member.keluarkan',['id_komunitas'=>$row->id,'id_member'=>$member->id])}}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <button class="btn btn-danger btn-sm" type="submit"><i class="fa fa-sign-out-alt"></i> Keluarkan Dari Komunitas</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <hr>

                                    <strong><i class="fas fa-user-friends mr-1"></i> Nomor KTP</strong>

                                    <p class="text-muted">{{$member->no_ktp}}</p>
                                </div>
                                <div class="tab-pane" id="layanan">
                                    <table class="table table-striped table-valign-middle">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Layanan</th>
                                            <th>Jenis Layanan</th>
                                            <th>Kabupaten</th>
                                            <th>Deskripsi Layanan</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($member->getLayanan as $index => $layanan_wisata)
                                            <tr>
                                                <td>
                                                    {{$index+1}}
                                                </td>
                                                <td>
                                                    {{$layanan_wisata->nama_layanan}}
                                                </td>
                                                <td>
                                                    {{$layanan_wisata->getJenisLayanan->nama_jenis_layanan}}
                                                </td>
                                                <td>
                                                    {{$layanan_wisata->getKabupaten->nama_kabupaten}}
                                                </td>
                                                <td>
                                                    {{$layanan_wisata->deskripsi_layanan}}
                                                </td>
                                            </tr>
                                        @endforeach
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