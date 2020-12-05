@extends('admin.layouts.app') 
@section('title') {{ "List Request Member" }}
@endsection
 
@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title"> Member</strong>
                        <button style="margin-left:20px; border-box:3px;" class="btn btn-primary">Tambah Member</button>
                    </div>
                    <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">ID</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Nomor Wa/Telepon</th>
                            <th scope="col">Komunitas</th>
                            <th scope="col">Email</th>
                            <th scope="col">Status</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        <form action="" method="post">
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <div class="form-group">
                                        <select name="komunitas" class="form-control custom-select">
                                            <option selected="" disabled="">Pilih Komunitas</option>
                                            <option value="semua">Semua Komunitas</option>
                                                <option
                                                    value="">
                                                </option>
                                        </select>
                                    </div>
                                </td>
                                <td></td>
                                <td>
                                    <div class="form-group">
                                        <select name="status" class="form-control custom-select">
                                            <option selected="" disabled="">Pilih Status</option>
                                            <option value="semua">Semua Status</option>
                                            <option value="2">
                                                Request
                                            </option>
                                            <option
                                                value="1">
                                                Tolak
                                            </option>
                                        </select>
                                    </div>
                                </td>
                                <td class="project-actions text-right">
                                    <button type="submit" style="width: 180px"
                                            class="btn btn-success btn-sm">
                                        <i class="fas fa-filter">
                                        </i>
                                        Filter
                                    </button>
                                </td>
                            </tr>
                        </form>
                        @foreach ($users as $data)
                        <tr style="font-size: 15px">
                            <th scope="row"></th>
                            <td>{{$data->id}}</td>
                            <td>{{$data->name}}</td>
                            <td>{{$data->no_WA}}</td>
                            <td>Komunitas</td>
                            <td>{{$data->email}}</td>
                            <td>{{$data->status}}</td>
                            <td>            
                                <a href="" class="btn btn-sm btn-info">Detail</a>
                                <a href="{{route('member.request.terima',$data->id)}}" class="btn btn-sm btn-warning">Terima</a>
                                <a href="{{route('member.request.tolak',$data->id)}}" class="btn btn-sm btn-danger">Tolak</a>
                            </td>
                        </tr>
                        @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection