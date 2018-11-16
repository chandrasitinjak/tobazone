@extends('users.layouts.app') 
@section('title') {{ "Products Detail" }}
@endsection
 
@section('content')
<div class="col-md-12">
  <div class="row">
    <div class="col-md-12">
      <div class="card globalcard">
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
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
              <p class="product-desc">{{$product->category}}</p>
              <h6 class="product-desc"> Berat {{ json_decode($product->specification)->weight}} kg</h6>
              <h6 class="product-desc"> Ukuran {{ json_decode($product->specification)->dimention }}</h6>

              @role('merchant')
              <div class="cart-fav-box d-flex align-items-center mt-4">
                <a href="{{ url('/products/edit', $product->id) }}" class="btn essence-btn">Edit</a>
                <form action="{{ url('/products/delete', $product->id)}}" method="POST">
                  {{ csrf_field() }}
                  <button type="submit" class="btn essence-btn ml-4">Delete</button>
                </form>
              </div>
              @else 
                @if(Auth::check())
                <div id="add-to-cart-button">
                  <add-to-cart-button :max-unit="{{$product->stock}}" :user-id="{{Auth::user()->id}}" :product-id="{{$product->id}}" />
                </div>
                @else
                <div>
                  <button class="btn essence-btn ml4"> Login Untuk Memesan Barang</button>
                </div>
                @endif
              @endrole
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">

  <!--Card Swipe-->
  <div class="col-md-12">
    <div class="card globalcard">
      <div class="card-header">
        <h6>Produk Rekomendasi</h6>
      </div>
      <div class="card-body">
        <div id="carouselExampleIndicators" class="carousel slide mt-0" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="row">
                <div class="col-md-2">
                  <div class="card product">
                    <div class="imgwrapper">
                      <img src="img/product-img/product-33.jpg" alt="Card image cap">
                    </div>

                    <div class="card-body">
                      <p class="card-title productname">Ulos Ragihotang asdjahslkd</p>
                      <h6 style="color: #ff5205"> Rp 2.400.000</h6>
                      <p class="card-text float-right">
                        <small class="text-muted">Balige</small>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="card product">
                    <div class="imgwrapper">
                      <img src="img/product-img/product-44.jpg" alt="Card image cap">
                    </div>

                    <div class="card-body">
                      <p class="card-title productname">Ulos Ragihotang asdjahslkd</p>
                      <h6 style="color: #ff5205"> Rp 2.400.000</h6>
                      <p class="card-text float-right">
                        <small class="text-muted">Balige</small>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="card product">
                    <div class="imgwrapper">
                      <img src="img/product-img/product-22.jpg" alt="Card image cap">
                    </div>

                    <div class="card-body">
                      <p class="card-title productname">Ulos Ragihotang asdjahslkd</p>
                      <h6 style="color: #ff5205"> Rp 2.400.000</h6>
                      <p class="card-text float-right">
                        <small class="text-muted">Balige</small>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="card product">
                    <div class="imgwrapper">
                      <img src="img/product-img/product-22.jpg" alt="Card image cap">
                    </div>

                    <div class="card-body">
                      <p class="card-title productname">Ulos Ragihotang asdjahslkd</p>
                      <h6 style="color: #ff5205"> Rp 2.400.000</h6>
                      <p class="card-text float-right">
                        <small class="text-muted">Balige</small>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="card product">
                    <div class="imgwrapper">
                      <img src="img/product-img/product-22.jpg" alt="Card image cap">
                    </div>

                    <div class="card-body">
                      <p class="card-title productname">Ulos Ragihotang asdjahslkd</p>
                      <h6 style="color: #ff5205"> Rp 2.400.000</h6>
                      <p class="card-text float-right">
                        <small class="text-muted">Balige</small>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="card product">
                    <div class="imgwrapper">
                      <img src="img/product-img/product-44.jpg" alt="Card image cap">
                    </div>

                    <div class="card-body">
                      <p class="card-title productname">Ulos Ragihotang asdjahslkd</p>
                      <h6 style="color: #ff5205"> Rp 2.400.000</h6>
                      <p class="card-text float-right">
                        <small class="text-muted">Balige</small>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="row">
                <div class="col-md-2">
                  <div class="card product">
                    <div class="imgwrapper">
                      <img src="img/product-img/product-22.jpg" alt="Card image cap">
                    </div>

                    <div class="card-body">
                      <p class="card-title productname">Ulos Ragihotang asdjahslkd</p>
                      <h6 style="color: #ff5205"> Rp 2.400.000</h6>
                      <p class="card-text float-right">
                        <small class="text-muted">Balige</small>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="card product">
                    <div class="imgwrapper">
                      <img src="img/product-img/product-22.jpg" alt="Card image cap">
                    </div>

                    <div class="card-body">
                      <p class="card-title productname">Ulos Ragihotang asdjahslkd</p>
                      <h6 style="color: #ff5205"> Rp 2.400.000</h6>
                      <p class="card-text float-right">
                        <small class="text-muted">Balige</small>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="card product">
                    <div class="imgwrapper">
                      <img src="img/product-img/product-22.jpg" alt="Card image cap">
                    </div>

                    <div class="card-body">
                      <p class="card-title productname">Ulos Ragihotang asdjahslkd</p>
                      <h6 style="color: #ff5205"> Rp 2.400.000</h6>
                      <p class="card-text float-right">
                        <small class="text-muted">Balige</small>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="card product">
                    <div class="imgwrapper">
                      <img src="img/product-img/product-22.jpg" alt="Card image cap">
                    </div>

                    <div class="card-body">
                      <p class="card-title productname">Ulos Ragihotang asdjahslkd</p>
                      <h6 style="color: #ff5205"> Rp 2.400.000</h6>
                      <p class="card-text float-right">
                        <small class="text-muted">Balige</small>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="card product">
                    <div class="imgwrapper">
                      <img src="img/product-img/product-22.jpg" alt="Card image cap">
                    </div>

                    <div class="card-body">
                      <p class="card-title productname">Ulos Ragihotang asdjahslkd</p>
                      <h6 style="color: #ff5205"> Rp 2.400.000</h6>
                      <p class="card-text float-right">
                        <small class="text-muted">Balige</small>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="card product">
                    <div class="imgwrapper">
                      <img src="img/product-img/product-22.jpg" alt="Card image cap">
                    </div>

                    <div class="card-body">
                      <p class="card-title productname">Ulos Ragihotang asdjahslkd</p>
                      <h6 style="color: #ff5205"> Rp 2.400.000</h6>
                      <p class="card-text float-right">
                        <small class="text-muted">Balige</small>
                      </p>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev" style="margin-left: -10px">
            <span class="carousel-control-prev-icon" aria-hidden="true" style="background-color: black;
    padding: 10px;
    height: 50px;
    width: 30px;"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true" style="background-color: black;
    padding: 10px;
    height: 50px;
    width: 30px;"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>

  </div>
  <!--Card Swipe End-->
</div>
@endsection