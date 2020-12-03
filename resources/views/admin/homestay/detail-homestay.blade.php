@extends('admin.layouts.app')
@section('title') {{ "Detail Homestays" }}
@endsection

@section('content')
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Detail Pemesanan Homestay</strong>
                        </div>

                        <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Homestay Name</th>
                                    <th>Address</th>
                                    <th>Check In</th>
                                    <th>Durasi</th>
                                    <th>Jumlah Kamar</th>
                                </tr>
                                <tr>
                                    <td>{{ $order[0]->name}}</td>
                                    <td> <span class="address"> {{ $order[0]->address }}</span> </td>
                                    <td>{{ $order[0]->check_in}}</td>
                                    <td>{{ $order[0]->duration }} hari</td>
                                    <td>{{ $order[0]->jumlah_kamar}}</td>
                                </tr>
                            </thead>
                        </table>

                        <div class="vue-misc">
                                <div class="row">
                                    <div class="col"></div>
                                    <div class="col-md-6">
                                        &nbsp
                                        <h4 class="mb-4">Ringkasan Biaya</h4>
                                        <table class="table table-striped">
                                            <tbody>
                                            <tr>
                                                <th>Harga Kamar Penginapan </th>
                                                <td>IDR 350.000 / hari</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Total Pembayaran</th>
                                                <td>IDR {{$order[0]->total_price}}</td>
                                            </tr>
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
