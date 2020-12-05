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
                                <th>Status</th>
                            </tr>
                            <tr>
                                <td>{{ $order[0]->name}}</td>
                                <td><span class="address"> {{ $order[0]->address }}</span></td>
                                <td>{{ $order[0]->check_in}}</td>
                                <td>{{ $order[0]->duration }} hari</td>
                                <td>{{ $order[0]->jumlah_kamar}}</td>
                                <td>{{ $order[0]->status}}</td>
                            </tr>
                            </thead>
                        </table>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <center><a href="{{ '/./../images/'. $order[0]->resi}}"><img
                                                src="{{ '/./../images/'. $order[0]->resi}}"
                                                style='width: 70%; object-fit: cover' alt=""></a>
                                    </center>
                                </div>
                                <div class="col-md-6">
                                    <div class="vue-misc">
                                        <div class="row">
                                            <div class="col"></div>
                                            <div class="col-md-6">
                                                &nbsp
                                                <h4 class="mb-4">Ringkasan Biaya</h4>
                                                <table class="table table-striped">
                                                    <tbody>
                                                    <tr>
                                                        <th>Harga Kamar Penginapan</th>
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
                        @if($order[0]->status == 'In Progress')
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8">

                                </div>
                                <div class="col-md-2">
                                    <a href="/homestay/approvePenginapan/{{$order[0]->id}}">
                                        <button class="btn"
                                                style="width: 100px; background-color: #222757; color: white">
                                            Terima
                                        </button>
                                    </a>
                                    <br><br><br>
                                </div>
                                <div class="col-md-2">
                                    <a href="/homestay/rejectedPenginapan/{{$order[0]->id}}">
                                        <button class="btn"
                                                style="width: 100px; background-color: #6D0000; color: white">
                                            Tolak
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endif


                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
