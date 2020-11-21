@extends('users.layouts.appPenginapan')
@section('title') {{ "Homestays" }}
@endsection

@section('content')

<section class="shop_grid_area section-padding-80">
    <div class="container">
        <div class="card container" style="background-color: #FFFAF4">
            <br>
            <div class="row">
                <div class="col-md-6">
                    <h6>{{$homestays->name}}</h6>
                </div>
                <div class="col-md-6" align="right">
                    <h6 style="color: #FF8311">Harga Kamar/Hari </h6>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h6>{{$homestays->address}}</h6>
                </div>
                <div class="col-md-6" align="right">
                    <h6 style="color: #FF8311">Rp. {{$homestays->price}}</h6>
                </div>
            </div>
            <br>
        </div>
        <br><br>
        <div class="container card" style="background-color: #FFFAF4">
            <div class="row">
                <div class="col-md-8">
                    <br>
                    <img src="{{ '../../images/assets/no-image.jpg'}}" alt="">
                </div>
                <div class="col-md-4">
                    <br>
                    <p>Check-in</p>
                    <input style="background-color: #F5F5F5" type="text" class="form-control">
                    <p>Durasi</p>
                    <input style="background-color: #F5F5F5" type="text"  class="form-control">
                    <p>Tamu dan Kamar</p>
                    <input style="background-color: #F5F5F5" type="text" class="form-control">
                    <br>
                    <br>
                    <button class="btn form-control" style="background-color: #0b0b0b; color: white">Pesan Homestay</button>
                    <p>{{$homestays->description}}</p>
                </div>
            </div>
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
                            <div class="product-topbar d-flex align-items-center justify-content-between">
                                <!-- Total Products -->
                                <div class="total-products">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-sm-6 col-lg-4">
                            <div class="single-product-wrapper">
                                <a href="{{ '../images/assets/no-image.jpg'}}">
                                    <div class="product-img">

                                        <img src="{{ '../images/assets/no-image.jpg'}}" alt="">

                                    </div>
                                </a>
                                <div class="product-description">
                                    <a > <h6>{{ $homestays->name }}</h6> </a>
                                    <p class="product-price"> IDR {{ $homestays->price }}</p>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Shop Grid Area End ##### -->
@endsection
