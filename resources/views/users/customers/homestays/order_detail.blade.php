@extends('users.layouts.app')
@section('title') {{ "Homestay Order" }}
@endsection

@section('content')
<section class="shop_grid_area section-padding-80">
    <h2>Detail Pesanan Anda, {{ Auth::user()->username }}</h2>
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td><p class="h6">Penginapan Tujuan</p></td>
                                    <td><p class="h6">:</p></td>
                                    <td><p class="h6">{{ $orderDetail->homestay->name }}</p></td>
                                </tr>
                                <tr>
                                    <td><p class="h6">Lokasi Penginapan</p></td>
                                    <td><p class="h6">:</p></td>
                                    <td><p class="h6">{{ $orderDetail->homestay->address }}</p></td>
                                </tr>
                                <tr>
                                    <td><p class="h6">Lama Menginap</p></td>
                                    <td><p class="h6">:</p></td>
                                    <td><p class="h6">{{ $orderDetail->duration }} Hari</p></td>
                                </tr>
                                <tr>
                                    <td><p class="h6">Metode Pembayaran</p></td>
                                    <td><p class="h6">:</p></td>
                                    <td><p class="h6">{{ $orderDetail->payment_method }}</p></td>
                                </tr>
                                <tr>
                                    <td><p class="h6">Total Harga</p></td>
                                    <td><p class="h6">:</p></td>
                                    <td><p class="h6">Rp {{ number_format($orderDetail->total_price, 2, ',', '.') }}</p></td>
                                </tr>
                                <tr>
                                    <td><p class="h6">Total Check-in</p></td>
                                    <td><p class="h6">:</p></td>
                                    <td><p class="h6">{{ date('d-m-Y', strtotime($orderDetail->check_in)) }}</p></td>
                                </tr>
                            </tbody>
                        </table>

                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td><p class="h6 text-right"><a href="#" class="btn btn-outline-warning">Hapus</a></p></td>
                                    <td><p class="h6 text-left"><a href="#" class="btn btn-dark">Bayar</a></p></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Shop Grid Area End ##### -->
@endsection
