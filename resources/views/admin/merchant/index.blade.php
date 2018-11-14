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
                                                <th>Address</th>
                                                <th>Phone</th>
                                                <th>Photo</th>
                                                <th>Gender</th>
                                                <th>Birthday</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($profiles as $idx => $user)
                                            <tr>
                                                <td class="serial"> {{ $idx+1 }}</td>
                                                <td> <span class="username"> {{ $user->name}}</span> </td>
                                                <td> <span class="username"> {{ $user->address}}</span> </td>  
                                                <td> <span class="username"> {{ $user->phone}}</span> </td>  
                                                <td> <span class="username"> {{ $user->photo}}</span> </td>  
                                                <td> <span class="username"> {{ $user->gender}}</span> </td>  
                                                <td> <span class="username"> {{ $user->birthday}}</span> </td>                                                                                              
                                                <td>
                                                <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#detailMerchantModal" onclick=""> Konfirmasi </button>
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
        </div>
    </div>
</div>
@endsection