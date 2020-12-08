@extends('users.anggotacbt.app')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Layanan Wisata</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Anggota CBT</a></li>
                        <li class="breadcrumb-item active">Layanan Wisata</li>

                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header border-0">
                            <h3 class="card-title text-bold text-gray-dark">Komunitas Pariwisata</h3>
                            <div class="card-tools">
                                <a href="{{url('anggotacbt/komunitas/pendaftar')}}" class="btn btn-primary btn-sm"> Daftar Anggota Komunitas</a>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-striped table-valign-middle">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Komunitas</th>
                                    <th>Deskripsi</th>
                                    <th>Link Gabung Komunitas</th>
                                    <th>Kabupaten</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data_komunitas as $index => $data_komunitas)
                                    <tr>
                                        <td>
                                            {{$index+1}}
                                        </td>
                                        <td>
                                            {{$data_komunitas->nama_komunitas}}
                                        </td>
                                        <td>
                                            {{$data_komunitas->deskripsi}}
                                        </td>
                                        <td>
                                            {{$data_komunitas->link}}
                                        </td>
                                        <td>
                                            {{$data_komunitas->getKabupaten->nama_kabupaten}}
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

@endsection
