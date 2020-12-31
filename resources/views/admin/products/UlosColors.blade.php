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
                        <strong class="card-title">Warna Ulos</strong>
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
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah warna</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form method="POST" action="{{ URL('/admin/ulos-colors') }}">
                                        {{csrf_field()}}
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="email">Warna</label>
                                                <input type="text" class="form-control" name="warna">
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
                                <th>Warna</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($ulos as $idx => $order)
                            <tr>
                                <th scope="row"> {{ $idx+1 }}</th>
                                <td><span class="address"> {{ $order->color }}</span>
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
                                                <form method="POST" action="{{ URL('/admin/ulos-colors/edit/'.$order->id) }}">
                                                    {{csrf_field()}}
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="email">Kategori Kamar</label>
                                                            <input type="text" class="form-control" value="{{ $order->color}}" name="warna">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <a href="{{ URL('/admin/ulos-colors/delete/'.$order->id) }}"
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
