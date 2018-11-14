@extends('admin.layouts.app') 
@section('title') {{ "Merchant" }}
@endsection
 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="orders">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                        
                            

                            <div class="card-body--">
                                <div class="table-stats order-table ov-h">
                                    <table class="table ">
                                        <thead>
                                            <tr>
                                                <th class="serial">#</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $idx => $user)
                                            <tr>
                                                <td class="serial"> {{ $idx+1 }}</td>
                                                <td> <span class="username"> {{ $user->username}}</span> </td>
                                                <td> <span class="username"> {{ $user->email}}</span> </td>                                                                                              
                                                <td><button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editPermissionModal" onclick=""> Konfirmasi </button></td>
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
        </div>
    </div>
</div>
@endsection