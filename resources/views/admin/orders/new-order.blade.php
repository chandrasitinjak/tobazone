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
                            <strong class="card-title">New Order</strong>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead align="center">
                                <tr>
                                    <th scope="row">#</th>
                                    <th>Nama Customer</th>
                                    <th>Produk</th>
                                    <th>Jumlah</th>
                                    <th>Total Harga</th>
                                    <th>Tanggal Order</th>
                                    <th>Address</th>
                                    <th colspan="2">Action</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($transactions as $idx => $order)
                                    <tr>
                                        <th scope="row"> {{ $idx+1 }}</th>
                                        <td>Patota</td>
                                        <td>Ulos Mangiring</td>
                                        <td>5</td>
                                        <td>500000</td>
                                        <td>10 November 2018</td>
                                        <td> <span class="address"> {{ $order->address}}</span> </td>
                                        <td colspan="2">

                                            <form action="{{ url('/orderconfirm', $order->id) }}" method="POST">
                                                {{csrf_field()}}
                                                <button type="button" class="btn btn-primary btn-sm" title="Konfirmasi"><i class="fa fa-check"></i></button>
                                            </form>
                                        </td>
                                        <td>
                                            <a href="/admin/new-order/order-detail"<button type="button" class="btn btn-primary btn-sm" title="Lihat Detail"><i class="fa fa-eye"></i></button></a>
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