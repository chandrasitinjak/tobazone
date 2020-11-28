@extends('layout.admin.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Adminstrator</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home.admin')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.paket')}}">Paket Wisata</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.paket.editChoice',$paket->id_paket)}}">Edit Paket Wisata</a></li>
                        <li class="breadcrumb-item active">Informasi Utama</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    @include('admin.paket.form')
@endsection
