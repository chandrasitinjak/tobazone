@extends('users.layouts.app')
@section('content')
    <div class="container mb-5 mt-5" style="min-height: 400px">
            <h3>Detail Pemesanan</h3>
            <div class="row">

                <div class="col-6">
                    <div class="card" style="width: 30rem;">
                        <img src="https://visit-toba.id/storage/img/paket/1596960775incredible-tour-packages-on-samosir-island.png" class="p-3" alt="">
                        <div class="card-body">
                            <table class="table1">
                                <tr>
                                    <td>Status</td>
                                    <td>:</td>
                                    <td>Menunggu Pembayaran</td>
                                </tr>
                                <tr>
                                    <td>Penginapan Tujuan</td>
                                    <td>:</td>
                                    <td>Homestay Bul-Bul Area</td>
                                </tr>
                                <tr>
                                    <td>Lokasi Penginapan</td>
                                    <td>:</td>
                                    <td>Jl.Bul Bul dekat Pantai Bul-Bul Balige</td>
                                </tr>
                                <tr>
                                    <td>Lama Menginap</td>
                                    <td>:</td>
                                    <td>5 Hari</td>
                                </tr>
                                <tr>
                                    <td>Metode Pembayaran</td>
                                    <td>:</td>
                                    <td>Ovo</td>
                                </tr>
                                <tr>
                                    <td>Total Harga</td>
                                    <td>:</td>
                                    <td>Rp. 5.200.000,00</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Check-in</td>
                                    <td>:</td>
                                    <td>25-09-2020</td>
                                </tr>
                            </table>     
                            <a href="daftar_pemesanan" class="btn btn-dark btn-lg active mt-2 ml-2 right-block" role="button" aria-pressed="true">Kembali</a> 
                        </div>
                        
                    </div>
                </div>
                
                <div class="col-6">
                    <div  style="width: 30rem;">
                        <div class="card mb-2">
                            <div class="card-body">
                                <h6 class="card-title" style="text-align:center">Waktu Pembayaran</h6>
                            </div>
                        </div>
    
                        <form class="mb-2">
                            <div class="form-group">
                                <select class="form-control" id="pilihJurusan">
                                    <option>Metode Pembayaran</option>
                                <option>ATM</option>
                                <option>ATM</option>
                                <option>CASH</option>
                                </select>
                            </div>
                        </form>
                        
                        <div class="card mb-2">
                            <div class="card-body">
                                <p style="color:black"> Pembayan ke nomor virtual account :
                                <br> 023438**********23423
                                <br> Total Pembayaran : Rp.
                                <br> Upload bukti pembayaran</p>

                                <img src="https://visit-toba.id/storage/img/pembayaran/1605452492_18_12.jpeg" class="row" style="max-width: 300px; max-height:300px; margin:auto">
                            </div>
                        </div>

                        <div >
                            <a href="#" style="width: 30rem;" class="btn btn-dark btn-lg active" role="button" aria-pressed="true">UPLOAD PEMBAYARAN</a>
                        </div>

                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection