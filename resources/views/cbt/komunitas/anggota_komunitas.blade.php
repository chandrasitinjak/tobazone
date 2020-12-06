@extends('users.anggotacbt.app')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Pendaftar Komunitas</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Pendaftar Pariwisata</li>
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


                    <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal"
                            data-target="#exampleModal">
                        Bergabung Komunitas
                    </button>


                </h3>

                <div class="card-tools">

                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                    <tr>
                        <th>
                            Nama Anggota
                        </th>
                        <th>
                            Nomor Whatsapp
                        </th>
                        <th>
                            Layanan Wisata
                        </th>
                        <th>
                            Nama Komunitas
                        </th>


                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data_pendaftar as $daftar)
                        <tr>
                            <td>{{$daftar->getUser->name}}</td>
                            <td>{{$daftar->getUser->no_WA}}</td>
                            <td>
                                <ul>
                                    @foreach($daftar->getLayanan as $row)
                                        <li>{{$row->nama_layanan}}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                <ul>
                                    @foreach($daftar->getKomunitasMember as $row)
                                        <li>{{$row->nama_komunitas}}</li>
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Komunitas</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{route('gabung_daftar')}}" method="POST">
                            {{csrf_field()}}
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Pilih Komunitas</label>
                                    <select name="komunitas_id" class="form-control" id="exampleFormControlSelect1">
                                        <option selected="" disabled="">Pilih Komunitas</option>
                                        @foreach($komunitas as $row)
                                            <option value="{{$row->id}}"
                                                    @if($row->id) selected @endif>{{$row->nama_komunitas}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Mendaftar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <!-- Modal -->


        </div>
        <!-- /.card-body -->


        <!-- /.card -->

    </section>
@endsection

