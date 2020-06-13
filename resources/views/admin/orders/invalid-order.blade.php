@extends('admin.layouts.app') 
@section('title') {{ "New Orders" }}
@endsection
 
@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Invalid Order</strong>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="row">#</th>
                                    <th>Nama Customer</th>
                                    <th>Nama Merchant</th>
                                    <th>Tanggal Order</th>
                                    <th>Alamat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transactions as $idx => $order)
                                <tr>
                                    <th scope="row"> {{ $idx+1 }}</th>
                                    <td>{{ $order->customer->profile->name}}</td>
                                    <td>{{ $order->merchant->profile->name}}</td>
                                    <td>{{ $order->created_at }}</td>
                                    <td> <span class="address"> {{ $order->address }}</span> </td>
                                    <td>
                                        <a href="{{ url('/admin/invalid-order-detail', $order->id)}}">
                                                <button type="button" class="btn btn-primary btn-sm" title="Lihat Detail">
                                                    <i class="fa fa-eye"></i>
                                                </button>
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