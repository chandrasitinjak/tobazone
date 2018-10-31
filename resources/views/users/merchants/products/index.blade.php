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
                  <!-- Product Image -->
                  <div class="product-img">
                    {{ $product->images }}
                    <img src="/user-assets/img/product-img/product-1.jpg" alt="">
                    <!-- Hover Thumb -->
                    <img class="hover-img" src="/user-assets/img/product-img/product-2.jpg" alt="">
  
                    <!-- Product Badge -->
                    <div class="product-badge offer-badge">
                      <span>-30%</span>
                    </div>
                    <!-- Favourite -->
                    <div class="product-favourite">
                      <a href="#" class="favme fa fa-heart"></a>
                    </div>
                  </div>
  
                  <!-- Product Description -->
                  <div class="product-description">
                    <span>topshop</span>
                    <a href="single-product-details.html">
                      <h6>Knot Front Mini Dress</h6>
                    </a>
                    <p class="product-price"><span class="old-price">$75.00</span> $55.00</p>
  
                    <!-- Hover Content -->
                    <div class="hover-content">
                      <!-- Add to Cart -->
                      <div class="add-to-cart-btn">
                        <a href="#" class="btn essence-btn">Add to Cart</a>
                      </div>
                    </div>
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