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
                            <h3 class="pb-2 display-5"># {{ $transaction->id}}</h3>
                        </div>
                        <div class="typo-articles">
                            <blockquote class="blockquote mt-3 text-left">
                                <p> {{ $transaction->created_at }} </p>
                                <footer class="blockquote-footer"><b> {{ $transaction->customer->profile->name}}</b></footer>
                            </blockquote>
                        </div>

                        <div class="vue-lists">
                            <h4 class="mb-4">Product List</h4>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Product Name</th>
                                                <th scope="col">Jumlah</th>
                                                <th scope="col">Harga</th>
                                                <th scope="col">Diskon (%)</th>
                                                <th scope="col">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($transaction->orders as $idx => $order)
                                            <tr>
                                                <th scope="row"> {{$idx + 1}}</th>
                                                <td>{{ $order->product->name }}</td>
                                                <td>{{ $order->quantity }}</td>
                                                <td>IDR {{ $order->product->price }}</td>
                                                <td>0%</td>
                                                <td>IDR {{ $order->product->price * $order->quantity}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
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
                                        {{ $transaction->address }}<br>
                                        Sitoluama, Laguboti, 22474<br>
                                        {{ $transaction->customer->email}}
                                    </address>
                                </div>
                                <div class="col-md-6">
                                    <h3 class="mb-3">Proof of Payment</h3>
                                    @if($transaction->payment->proof)
                                    <div class="jumbotron">
                                        <img class="card-img-top" src="{{ url('/images/proof-of-payment', json_decode($transaction->payment->proof)->image)}}" alt="Resi pembayaran">
                                    </div>
                                    @else
                                    <div class="jumbotron align-center">
                                        <h3 class="text-danger"> Not Paid Yet </h3>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        @if($transaction->payment->proof)
                        <div class="card-body">
                            <a href="#"><button type="button" class="btn btn-primary btn-lg btn-block">Accept</button></a>
                        </div>
                        <div class="card-body">
                            <a href="#"><button type="button" class="btn btn-danger btn-lg btn-block">Reject</button></a>
                        </div>
                        @else
                        <div class="card-body">
                            <a href="#"><button type="button" class="btn btn-danger btn-lg btn-block">Reject</button></a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection