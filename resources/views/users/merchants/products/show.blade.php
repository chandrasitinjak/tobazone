@extends('users.layouts.app') 
@section('title') {{ "Products Detail" }}
@endsection
 
@section('content')
<section class="single_product_details_area d-flex align-items-center">

  <!-- Single Product Thumb -->
  <div class="single_product_thumb clearfix">
    <div class="product_thumbnail_slides owl-carousel">
      @foreach(json_decode($product->images) as $image)
        <img src="{{ url('/images/' . $image)}}" alt=""> 
      @endforeach
    </div>
  </div>

  <!-- Single Product Description -->
  <div class="single_product_desc clearfix">
    <a href="cart.html">
      <h2> {{ $product->name }}</h2>
    </a>
    <p class="product-price"> IDR {{ $product->price}}</p>
    <p class="product-desc"> {{ $product->description }} </p>

    @role('customer')
      <!-- Form -->
      <form class="cart-form clearfix" method="post">
        <!-- Select Box -->
        <div class="select-box d-flex mt-50 mb-30">
          <select name="select" id="productSize" class="mr-5">
                      <option value="value">Size: XL</option>
                      <option value="value">Size: X</option>
                      <option value="value">Size: M</option>
                      <option value="value">Size: S</option>
                  </select>
          <select name="select" id="productColor">
                      <option value="value">Color: Black</option>
                      <option value="value">Color: White</option>
                      <option value="value">Color: Red</option>
                      <option value="value">Color: Purple</option>
                  </select>
        </div>
        
        <div class="cart-fav-box d-flex align-items-center">
          <!-- Cart -->
          <button type="submit" name="addtocart" value="5" class="btn essence-btn">Add to cart</button>
          <!-- Favourite -->
          <div class="product-favourite ml-4">
            <a href="#" class="favme fa fa-heart"></a>
          </div>
        </div>
      </form>
    @else
    <div class="cart-fav-box d-flex align-items-center">
      <a href="{{ url('/products/edit', $product->id)}}" class="btn essence-btn">Edit</a>
      
      <form method="POST" action="{{ url('/products/delete', $product->id)}}">
        {{ csrf_field() }}
        <button class="btn essence-btn ml-4">Delete</button>
      </form>
    </div>
    @endrole
  </div>
</section>
@endsection