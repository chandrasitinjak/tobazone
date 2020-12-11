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
                        <strong class="card-title">Orders</strong>
                    </div>
                    @if(count($transactions) == 0)
                    <br>
                    <center><img src="/images/assets/search_result_empty.png"
                                 style="height: 120px; alignment: center; border: none; opacity: 0.5"/>
                        <br>
                        <p>pesanan anda belum ada</p>
                    </center>
                    <br>
                    @else
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="row">#</th>
                                <th>Nama Pelanggan</th>
                                <th>Nama Penginapan</th>
                                <th>Tanggal Check In</th>
                                <th>Durasi</th>
                                <th>Alamat Penginapan</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($transactions as $idx => $order)
                            <tr>
                                <th scope="row"> {{ $idx+1 }}</th>
                                <td>{{ $order->username}}</td>
                                <td>{{ $order->name}}</td>
                                <td>{{ $order->duration }} hari</td>
                                <td>{{ $order->check_in}}</td>
                                <td><span class="address"> {{ $order->address }}</span></td>
                                <td> {{ $order->status }}</td>
                                <td>
                                    <a href="{{ url('/admin/homestay/new-order', $order->id)}}">
                                        <button type="button" class="btn btn-primary btn-sm"
                                                title="Lihat Detail">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
