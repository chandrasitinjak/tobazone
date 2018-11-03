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

    <!-- Form -->
    <form class="cart-form clearfix" method="post">
      <!-- Select Box -->
      <div class="select-box d-flex mt-50 mb-30 col-3">
        <label class="label mr-4"> Total </label>
        <input type="number" id="total" min="1" value="1" class="form-control"/>
      </div>
      <!-- Cart & Favourite Box -->
      <div class="cart-fav-box d-flex align-items-center">
        <!-- Cart -->
        <button type="button" onclick="addToCart({{$product->id}})" class="btn essence-btn">Add to cart</button>
        <!-- Favourite -->
        <div class="product-favourite ml-4">
          <a href="#" class="favme fa fa-heart"></a>
        </div>
      </div>
    </form>
  </div>
</section>
@endsection

<script>
  function addToCart(id) {
    const total = document.getElementById('total').value
  
    jQuery.ajax({
      url: '/api/carts',
      type: 'POST',
      data: {
        productId: id,
        userId: '{{ Auth::user()->id }}',
        total: total,
        _token: "{{ csrf_token() }}"
      },
      dataType: 'json',
      success: function( data ) {
        console.log(data);
      }       
    })
  }
</script>