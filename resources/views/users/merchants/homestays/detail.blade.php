@extends('users.layouts.app') 
@section('title') {{ "Homestays" }}
@endsection
 
@section('content')

<section class="shop_grid_area section-padding-80">
    <h2>Detail Homestay {{$homestays->name}}</h2>
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