@extends('users.layouts.app') 
@section('content')

<div class="breadcumb_area bg-img" style="background-image: url('/user-assets/img/bg-img/breadcumb.jpg')">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="page-title text-center">
                    <h2>Checkout</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="checkout_area section-padding-80">
    <div class="container">
        <div class="row">

            <div class="col-12 col-md-6">
                <div class="checkout_details_area mt-50 clearfix">

                    <div class="cart-page-heading mb-30">
                        <h5>Alamat Pengiriman</h5>
                    </div>

                    <form action="#" method="post">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="select">Pilih Alamat Pengiriman</label>
                                <select name="select" id="productColor">
                                    <option value="none"> Pilih Alamat </option>
                                    @foreach (json_decode($user->profile->address) as $address)
                                        <option value="{{$address->name}}"> {{ $address->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>   
                                <div class="contact-info card p-4">
                                    <b> {{$user->profile->name }} ({{ $user->email }}) </b>
                                    {{-- {{$user->profile->address[0]->detail}} --}}
                                    Mauris viverra cursus ante laoreet eleifend. Donec vel fringilla ante. Aenean finibus
                                        velit id urna vehicula, nec maximus est sollicitudin.
                                    
                                    <button type="button" class="btn btn-sm btn-info col-3 mt-2 pull-right"> Tambah Alamat </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-5 ml-lg-auto">
                <div class="order-details-confirmation">

                    <div class="cart-page-heading">
                        <h5>Pesanan Anda</h5>
                    </div>

                    <ul class="order-details-form mb-4">
                        <li><span>Produk</span> <span>Total</span></li>
                        @foreach ($carts as $cart)
                        <li><span> {{ $cart->product->name }} {{ $cart->total }} unit</span> <span> RP {{ $cart->product->price * $cart->total}}</span></li>
                        @endforeach @php $total = 0; foreach ($carts as $cart) { $total += $cart->product->price * $cart->total; } 
@endphp

                        <li><span>Subtotal</span> <span> Rp. {{ $total }}</span></li>
                        <li><span>Ongkos Kirim</span> <span>Free</span></li>
                        <li><span>Total</span> <span>$59.90</span></li>
                    </ul>

                    <a href="#" class="btn essence-btn">Bayar Sekarang</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection