@extends('users.layouts.appPenginapan')
@section('title') {{ "Homestay" }}
@endsection

@section('content')
<section class="shop_grid_area section-padding-80">
    <div class="container">
        <div class="card container" style="background-color: #FFFAF4">
            <br>
            <div class="row">
                <div class="col-md-6">
                    <h4 >{{$homestays->name}}</h4>
                </div>
                <div class="col-md-6" align="right">
                    <p style="color: #FF8311">Harga Kamar/Hari </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <p>{{$homestays->address}}</p>
                </div>
                <div class="col-md-6" align="right">
                    <h4 style="color: #FF8311">Rp. {{$homestays->price}}</h4>
                </div>
            </div>
            <br>
        </div>
        <br><br>
        <div class="container card" style="background-color: #FFFAF4">
            <br>

            <form-pesan-homestay :homestays="{{ $homestays }}"></form-pesan-homestay>

            <br><br>

            <p class="container">{{$homestays->description}}</p>

            <br><br><br><br>
        </div>
    </div>
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="shop_grid_product_area">
                    <div class="row">
                        <div class="col-12">
                            <div
                                class="product-topbar d-flex align-items-center justify-content-between">
                                <!-- Total Products -->
                                <div class="total-products">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
