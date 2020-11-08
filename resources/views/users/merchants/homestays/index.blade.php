@extends('users.layouts.app')
@section('title') {{ "Homestays" }}
@endsection

@section('content')

<section class="shop_grid_area section-padding-80">
    <h2>Homestay</h2>
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
            @foreach ($homestays as $product)
            <div class="col-12 col-sm-6 col-lg-4">
              <div class="single-product-wrapper">
                <a href="{{ '../images/assets/no-image.jpg'}}">
                  <div class="product-img">

                      <img src="{{ '../images/assets/no-image.jpg'}}" alt="">

                  </div>
                </a>
                  <div class="product-description">
                    <a href="{{ url('/homestays/find', $product->id)}}" > <h6>{{ $product->name }}</h6> </a>
                    <p class="product-price"> IDR {{ $product->price }}</p>
                </div>
                </a>
              </div>
            </div>
            @endforeach
          </div>
        </div>
        <!-- Pagination -->
        <nav aria-label="navigation">
          <ul class="pagination mt-50 mb-70">
            <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-left"></i></a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">...</a></li>
            <li class="page-item"><a class="page-link" href="#">21</a></li>
            <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a></li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</section>
<!-- ##### Shop Grid Area End ##### -->
@endsection
