@extends('admin.layouts.app')
@section('title') {{ "Detail Merchant" }}
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
                                    <th class="serial">#</th>
                                    <th>Homestay Name</th>
                                    <th>Address</th>
                                    <th>Check In</th>
                                    <th>Check Out</th>
                                    <th>Jumlah Orang</th>
                                    <th>Layanan Tambahan</th>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Sogu Homestay</td>
                                    <td>Silaen</td>
                                    <td>12-11-2020</td>
                                    <td>30-12-2020</td>
                                    <td>5</td>
                                    <td>-</td>
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
                                                <th>Total Harga Produk</th>
                                                <td>IDR 350.000</td>
                                            </tr>
                                            <tr>
                                                <th>Biaya Layanan Tambahan</th>
                                                <td>IDR 0</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Total Pembayaran</th>
                                                <td>IDR 350.000</td>
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