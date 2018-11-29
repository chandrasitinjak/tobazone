@extends('admin.layouts.app')
@section('title') {{ "Detail Orders" }}
@endsection

@section('content')
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Detail Order</strong>
                        </div>
                        <div class="card-body">
                            <div class="typo-headers">
                                <h3 class="pb-2 display-5">#37843246</h3>

                            </div>
                            <div class="typo-articles">
                                <blockquote class="blockquote mt-3 text-left">
                                    <p> 20 November 2018 --- 17.00 WIB</p>

                                    <footer class="blockquote-footer"><b>Patota Adi Petro</b></footer>

                                </blockquote>

                            </div>

                            <div class="vue-lists">

                                <h4 class="mb-4">Lists Order</h4>
                                <div class="row">

                                    <div class="col-md-12">

                                        <table class="table table-striped">
                                            <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Nama Produk</th>
                                                <th scope="col">Jumlah</th>
                                                <th scope="col">Harga</th>
                                                <th scope="col">Diskon (%)</th>
                                                <th scope="col">Total</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Ulos Mangiring</td>
                                                <td>2</td>
                                                <td>Rp200000</td>
                                                <td>0%</td>
                                                <td>400000</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>Ulos Sadum</td>
                                                <td>1</td>
                                                <td>Rp300000</td>
                                                <td>0%</td>
                                                <td>300000</td>
                                                <td></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div> <!-- /.table-stats -->
                                </div>

                            </div>
                            <div class="vue-misc">
                                <div class="row">
                                    <div class="col-md-6">

                                    </div>

                                    <div class="col-md-6">
                                        <table class="table">
                                            <tr>
                                                <th scope="row">
                                                    Jumlah
                                                </th>
                                                <td>
                                                    Rp700000
                                                </td>
                                            </tr>

                                            <tr>
                                                <th>
                                                    Diskon
                                                </th>
                                                <td>
                                                    0%
                                                </td>
                                            </tr>

                                            <tr>
                                                <th>
                                                    Total harga
                                                </th>
                                                <th>
                                                    Rp700000
                                                </th>
                                            </tr>

                                        </table>
                                    </div>

                                </div>
                            </div>
                            <br>

                            <div class="vue-misc">
                                <!-- <h2 class="display-5 my-3">Misc</h2> -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <h3>Address</h3>
                                        <address class="mt-3">
                                            <strong>IT DEL</strong><br>
                                            Jalan Lintas Sitoluama<br>
                                            Sitoluama, Laguboti, 22474<br>
                                            +62 2345678<br>
                                            <br>
                                            <b>Email</b><br>
                                            <a href="mailto">customer@gmail.com</a>

                                        </address>
                                    </div>
                                    <div class="col-md-6">
                                        <h3 class="mb-3">Payment transfer</h3>
                                        <div class="jumbotron">
                                            <img class="card-img-top" src="images/resi.jpg" alt="Resi pembayaran">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <a href="#"><button type="button" class="btn btn-primary btn-lg btn-block">Konfirmasi</button></a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection