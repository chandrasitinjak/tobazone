@extends('admin.layouts.app')
@section('title') {{ "Edit Choice Paket" }}
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Edit Paket Wisata</strong>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <a class="btn btn-primary btn-lg" href="{{route('admin.paket.edit',$id_paket)}}">
                                        <i class="fa fa-folder">
                                        </i>
                                        Informasi Utama
                                    </a>
                                </div>
                                <div class="col">
                                    <a class="btn btn-info btn-lg" href="{{route('admin.paket.ini',$id_paket)}}">
                                        <i class="fa fa-folder">
                                        </i>
                                        Included & Not Included
                                    </a>
                                </div>
                                <div class="col">
                                    <a class="btn btn-secondary btn-lg" href="{{route('admin.paket.layanan',$id_paket)}}">
                                        <i class="fa fa-folder">
                                        </i>
                                        Layanan Paket
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
