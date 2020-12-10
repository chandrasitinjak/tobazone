@extends('admin.layouts.app')
@section('title') {{ "New Orders" }}
@endsection
@section('content')
<div class="content mt-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Kategori Kamar</strong>
                    </div>
                    <div class="card-body">
                        <div align="right">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#exampleModal"><i class="fa fa-plus"></i> Tambah
                            </button>
                        </div>
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form method="POST" action="{{ URL('/admin/tambah-kategori-homestay') }}">
                                        {{csrf_field()}}
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="email">Kategori Kamar</label>
                                                <input type="text" class="form-control" name="nama_kategori">
                                            </div>
                                            <div class="form-group">
                                                <label for="pwd">Deskripsi</label>
                                                <textarea class="form-control" name="deskripsi"></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <br>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="row">#</th>
                                <th>Nama Kategori</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($result as $idx => $order)
                            <tr>
                                <th scope="row"> {{ $idx+1 }}</th>
                                <td>{{ $order->category_name}}</td>
                                <td><span class="address"> {{ $order->category_deskripsi }}</span>
                                </td>
                                <td>
                                    <button class="btn btn-warning"
                                            type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#exampleModal{{$idx}}">Edit</button>&nbsp;
                                    <div class="modal fade" id="exampleModal{{$idx}}" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form method="POST" action="{{ URL('/admin/edit-kategori-homestay/'.$order->id) }}">
                                                    {{csrf_field()}}
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="email">Kategori Kamar</label>
                                                            <input type="text" class="form-control" value="{{ $order->category_name}}" name="nama_kategori">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="pwd">Deskripsi</label>
                                                            <textarea class="form-control" name="deskripsi">{{ $order->category_deskripsi }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <a href="{{ URL('/admin/delete-kategori/'.$order->id) }}"
                                        class="btn btn-danger">Hapus
                                    </a>

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
@endsection
