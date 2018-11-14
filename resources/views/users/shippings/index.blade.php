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

                    <div id="address-chooser">
                        <address-chooser :user-id="{{ Auth::user()->id }}" />
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-5 ml-lg-auto">
                <div id="shipping-detail">
                    <shipping-detail :user-id="{{ Auth::user()->id }}"/>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection