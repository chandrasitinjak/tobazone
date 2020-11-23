@extends('users.layouts.app')
@section('title') {{ "Order" }}
@endsection

@section('content')
    <div class="container-fluid"><br><h1 style="font-family: &quot;Arial Black&quot;; text-align: left;">Daftar Pesanan </h1><hr><div><div class="card"><!---->
    <nav class="card-header"><ul class="nav nav-tabs card-header-tabs"><li class="nav-item">
    <a target="_self" href="#" class="nav-link">Pesanan Produk</a></li><li class="nav-item">
    <a target="_self" href="#" class="nav-link">Pesanan Produk Sudah Bayar</a></li><li class="nav-item">
    <a target="_self" href="#" class="nav-link active">Pesanan Penginapan</a></li><li class="nav-item">
    <a target="_self" href="#" class="nav-link">Pesanan Penginapan Sudah Bayar </a>
    </li></ul>
    </nav>
    <div class="card-body"><!----><!---->
    <div class="card">
        <div class="row">
        <div class="col-md-3"><h3>Penginapan Tujuan</h3></div>
        <div class="col-md-2"><h3>Lama Menginap</h3></div>
        <div class="col-md-3"><h3>Metode Pembayaran</h3></div>
        <div class="col-md-2"><h3>Harga</h3></div>
        <div class="col-md-2"><h3>Status</h3></div></div><!---->
        <p class="card-text"><div><center><img width="450px" align="center" src="https://portal-desa.herokuapp.com/penginapan/get/AMBA-0001-1.png" alt="" class="card"></center>
        <div class="row"><div class="col-md-3"><br><br><p>Guest House Bukit Hijau</p></div>
        <div class="col-md-2"><br><br><p>3</p></div>
        <div class="col-md-3"><br><br><p>ATM Mandiri</p></div>
        <p>Harga : Rp. 800,000</p>
        <div class="col-md-2"><!----></div></div></div></p>
        <p class="card-text">
        <div><center><img width="450px" align="center" src="https://portal-desa.herokuapp.com/penginapan/get/AEKB-0001-1.png" alt="" class="card"></center>
        <div class="row"><div class="col-md-3"><br><br><p>Brusseel Hotel</p></div>
        <div class="col-md-2"><br><br><p>0</p></div>
        <div class="col-md-3"><br><br><p></p></div><p>Harga : Rp. 1,000,000</p>
        <div class="col-md-2"><!----></div></div></div></p><p class="card-text">
        <div><center><img width="450px" align="center" src="https://portal-desa.herokuapp.com/penginapan/get/AEKB-0001-1.png" alt="" class="card"></center>
        <div class="row"><div class="col-md-3"><br><br><p>Brusseel Hotel</p></div><div class="col-md-2"><br><br><p>0</p></div>
        <div class="col-md-3"><br><br><p></p></div><p>Harga : Rp. 1,000,000</p><div class="col-md-2"><!----></div></div></div></p><p class="card-text"><div><center><img width="450px" align="center" src="https://portal-desa.herokuapp.com/penginapan/get/AMBO-0001-1.png" alt="" class="card"></center><div class="row"><div class="col-md-3"><br><br><p>Santo Djava</p></div><div class="col-md-2"><br><br><p>2</p></div><div class="col-md-3"><br><br><p>ATM Mandiri</p></div><p>Harga : Rp. 700,000</p><div class="col-md-2"><!----></div></div></div></p><p class="card-text"><div><center><img width="450px" align="center" src="https://portal-desa.herokuapp.com/penginapan/get/AMBO-0001-1.png" alt="" class="card"></center><div class="row"><div class="col-md-3"><br><br><p>Santo Djava</p></div><div class="col-md-2"><br><br><p>2</p></div><div class="col-md-3"><br><br><p>ATM Mandiri</p></div><p>Harga : Rp. 700,000</p><div class="col-md-2"><!----></div></div></div></p></div></div><!----><!----></div></div><!----><br><br><br></div>
@endsection