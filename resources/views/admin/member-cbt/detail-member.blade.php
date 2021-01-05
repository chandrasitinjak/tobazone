@extends('admin.layouts.app')
@section('title') {{ "Detail Request Member" }}
@endsection

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img style="max-width: 300px;height: 200px;border: 3px solid #adb5bd;padding: 3px;" class="rounded mx-auto d-block"
                                     src="{{asset('/images/ktp-cbt/'.$member->photo)}}"
                                     alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center">{{$member->getUser->name}}</h3>

                            <p class="text-muted text-center">{{$member->getUser->email}}</p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Nama</b> <a class="float-right">{{$member->getUser->name}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Email</b> <a class="float-right">{{$member->getUser->email}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Nomor WhatsApp ( WA )</b> <a class="float-right">{{$member->getUser->no_WA}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Nomor Telepon ( Hp )</b> <a class="float-right">{{$member->getUser->no_HP}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Status Keanggotaan </b> <a class="float-right">{{$member->defineStatus($member->getUser->registerStatus)}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Nomor KTP </b> <a class="float-right">{{$member->no_KTP}}</a>
                                </li>
                            </ul>

                            <a href="{{route('member.request.terima',$member->id)}}" class="btn btn-primary btn-block"><b>Terima</b></a>
                            <a href="{{route('member.request.tolak',$member->id)}}" class="btn btn-danger btn-block"><b>Tolak</b></a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
