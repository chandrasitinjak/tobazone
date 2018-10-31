@extends('users.layouts.app') 
@section('title') {{ "Products" }}
@endsection
 
@section('content')
<div class="breadcumb_area bg-img" style="background-image: url(/user-assets/img/bg-img/breadcumb.jpg);">
  <div class="container h-100">
    <div class="row h-100 align-items-center">
      <div class="col-12">
        <div class="page-title text-center">
          <h2>My Product</h2>
        </div>
      </div>
    </div>
  </div>
</div>

<section class="shop_grid_area section-padding-80">
  <div class="container">
    <div class="row">
  @include('users.merchants.sidebar')

      <div class="col-12 col-md-8 col-lg-9">
        <div class="shop_grid_product_area">
          <div class="row">
            <div class="col-12">
              <div class="product-topbar d-flex align-items-center justify-content-between">
                <!-- Total Products -->
                <div class="total-products">
                  <p><span>186</span> products found</p>
                </div>
                <!-- Sorting -->
                <div class="product-sorting d-flex">
                  <p>Sort by:</p>
                  <form action="#" method="get">
                    <select name="select" id="sortByselect">
                        <option value="value">Highest Rated</option>
                        <option value="value">Newest</option>
                        <option value="value">Price: $$ - $</option>
                        <option value="value">Price: $ - $$</option>
                    </select>
                    <input type="submit" class="d-none" value="">
                  </form>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            @foreach ($products as $product)
            <div class="col-12 col-sm-6 col-lg-4">
              <div class="single-product-wrapper">
                <div class="product-img">
                  <img src="{{ "/images/" . json_decode($product->images)[0]}}" alt="">
                </div>

                <div class="product-description">
                  <a href="single-product-details.html">
                    <h6>{{ $product->name }}</h6>
                  </a>
                  <p class="product-price"> IDR {{ $product->price }}</p>
                </div>
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