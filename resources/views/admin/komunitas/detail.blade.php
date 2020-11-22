@extends('admin.layouts.app')
@section('title') {{ "Paket Wisata" }}
@endsection

@section('content')

    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-3">

                            <!-- Profile Image -->
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <button type="button" class="btn btn-default" data-toggle="modal"
                                                data-target="#modal-default">
                                            <img src="{{asset('/storage/img/komunitas/'.$komunitas->gambar)}}" class="img-fluid mb-2"
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
                                                            <img src="{{asset('/storage/img/komunitas/'.$komunitas->gambar)}}"
                                                                 class="img-fluid" style="width: 100%;">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                    </div>

                                    <h3 class="profile-username text-center">{{$komunitas->nama_komunitas}}</h3>

                                    <p class="text-muted text-center">Kabupaten {{$komunitas->getKabupaten->nama_kabupaten}}</p>

                                    @if(isset($komunitas->getKomunitasMember))
                                        <ul class="list-group list-group-unbordered mb-3">
                                            <li class="list-group-item">
                                                <b>Total Anggota </b> <a
                                                    class="float-right"> {{$komunitas->getKomunitasMember->count()}}</a>
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
                                        <li class="nav-item"><a class="nav-link active" href="#detailkomunitas" data-toggle="tab">Detail Komunitas</a></li>
                                        <li class="nav-item" style="margin-left: 20px">
                                            <form action="{{route('member.filter')}}" method="post">
                                                @csrf
                                                <input name="komunitas" value="{{$komunitas->id}}" type="text" hidden>
                                                <input name="status" value="semua" type="text" hidden>
                                                <button type="submit" class="btn btn-success btn-md"><i class="fa fa-users"> </i> Anggota CBT</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="active tab-pane" id="detailkomunitas">
                                            <strong><i class="far fa-file-alt mr-1"></i> Nama Komunitas</strong>

                                            <p class="text-muted">
                                                {{$komunitas->nama_komunitas}}
                                            </p>

                                            <hr>

                                            <strong><i class="fa fa-link mr-1"></i> Link WhatsApp Group Komunitas</strong>

                                            <p class="text-muted">{{$komunitas->link}}</p>

                                            <hr>

                                            <strong><i class="fa fa-phone mr-1"></i> Deskripsi</strong>

                                            <p class="text-muted"><?= $komunitas['deskripsi'] ?></p>

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
