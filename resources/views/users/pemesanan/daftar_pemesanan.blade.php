@extends('users.layouts.app')
@section('content')
<div class="container mt-5"  >
        <h3>Riwayat Pemesanan</h3>
        <table class="table table-bordered" style="margin-bottom: 180px;">
            <thead class="sub-judul">
                <tr>
                    <th scope="col">NO</th>
                    <th scope="col">NAMA PAKET WISATA</th>
                    <th scope="col">STATUS PEMESANAN</th>
                    <th scope="col">JUMLAH PESERTA PERJALANAN</th>
                    <th>STATUS</th>
                </tr>
            </thead>
            <tbody class="isi-list">
                <tr>
                    <th scope="row" class="jumlah-peserta-no-detail">1</th>
                    <td>Incredible Tour Packages on Samosir Island</td>
                    <td>Menunggu Konfirmasi Pembayaran dari Pengelola Paket</td>
                    <td class="jumlah-peserta-no-detail">12</td>
                    <td class="jumlah-peserta-no-detail"> <a href="detail_pemesanan" class="btn btn-dark btn-lg active mt-2 ml-2 right-block" role="button" aria-pressed="true">Detail</a></td>
                   
                </tr>
                <tr>
                    <th scope="row" class="jumlah-peserta-no-detail">2</th>
                    <td>Explore Dairi Regency</td>
                    <td>Menunggu Konfirmasi Pembayaran dari Pengelola Paket</td>
                    <td class="jumlah-peserta-no-detail">5</td>
                    <td class="jumlah-peserta-no-detail"> <a href="detail_pemesanan" class="btn btn-dark btn-lg active mt-2 ml-2 right-block" role="button" aria-pressed="true">Detail</a></td>
                </tr>
            </tbody>
        </table>
</div>

@endsection
