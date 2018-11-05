@extends('users.layouts.app') 
@section('title') {{ "Products Detail" }}
@endsection
 
@section('content')
<div class="col-md-12">
  <div class="row">
    <div class="col-md-10">
      <div class="card globalcard">
        <div class="card-body">
          <div class="row">
            <div class="col-md-4">
              <div class="detailproduct">
                <div id="myCarousel" class="carousel slide " data-ride="carousel">
                  <!-- Wrapper for slides -->
                  <div class="carousel-inner">
                    @foreach (json_decode($product->images) as $image) @if ($loop->first)
                    <div class="carousel-item active">
                      <img class="align-self-center" src="{{ '/images/' . $image }}" alt="">
                    </div>
                    @else
                    <div class="carousel-item">
                      <img src="{{ '/images/' . $image }}">
                    </div>
                    @endif @endforeach
                  </div>

                  <ul class="nav nav-pills nav-justified smallimage mt-15">
                    @foreach (json_decode($product->images) as $idx => $image) @if ($loop->first)
                    <li data-target="#myCarousel" data-slide-to="{{ $idx }}" class="active">
                      <img src="{{ '/images/' . $image }}" alt="">
                    </li>
                    @else
                    <li data-target="#myCarousel" data-slide-to="{{ $idx }}">
                      <img src="{{ '/images/' . $image }}" alt="">
                    </li>
                    @endif @endforeach
                  </ul>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <a href="cart.html">
                <h2>{{ $product->name }}</h2>
              </a>
              <p class="product-price">Rp {{ $product->price }}</p>
              <p class="product-desc">{{$product->description}}</p>

              {{-- <div>
                <input class="form-control" id="total" type="number" min="1" value="1" max="{{ $product->stock }}" />
              </div> --}}
              
              <div id="add-to-cart-button">
                <add-to-cart-button :max-unit="{{$product->stock}}" :user-id="{{Auth::user()->id}}" :product-id="{{$product->id}}"/>
              </div>
              {{-- <div class="cart-fav-box d-flex align-items-center mt-4">
                <button type="submit" onclick="addToCart({{ $product->id }})" class="btn essence-btn">Add to cart</button>
              </div> --}}
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-2">
      <div class="card globalcard">
        <div class="card-body">
          asd
        </div>
      </div>
    </div>
  </div>
</div>
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