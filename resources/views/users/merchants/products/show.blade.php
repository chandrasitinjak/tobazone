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

            <div class="col-md-5">
              <div class="detailproduct">
                <div class="row">

                  <div class="col-md-2 pr-0 smallimageholder">
                    <ul class="nav nav-pills nav-justified smallimage ">
                      @foreach (json_decode($product->images) as $idx => $image) @if ($loop->first)
                      <li class="mb-2" data-target="#myCarousel" data-slide-to="{{ $idx }}" class="active">
                        <img src="{{ '/images/' . $image }}" alt="">
                      </li>
                      @else
                      <li class="mb-2" data-target="#myCarousel" data-slide-to="{{ $idx }}">
                        <img src="{{ '/images/' . $image }}" alt="">
                      </li>
                      @endif @endforeach
                    </ul>
                  </div>
                  <div class="imagesliderholder col-md-10 ml-0 ">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">


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
                    </div>
                  </div>
                </div>


              </div>
            </div>

            <div class="col-md-4">
              <button type="button" class="badge custom-badge font-weight-light" data-toggle="test" data-rigger="focus" data-content="<b><a href='single-blog.html'>Klik disini</a></b>  untuk informasi selebihnya "
                data-html="true" title="Dibuat dengan {{$product->category}} ">

                {{$product->category}}
              </button>


              <h2>{{ $product->name }}</h2>

              <h4 class="product-price" style="color: orange">Rp {{ number_format($product->price ,0) }}</h4>
              <p class="product-desc">{{$product->description}}</p>
              <p class="product-desc">Produk ini dibuat dengan metode {{$product->category}}</p>
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

              @else @if(Auth::check())
              <div id="add-to-cart-button">
                <add-to-cart-button :max-unit="{{$product->stock}}" :user-id="{{Auth::user()->id}}" :product-id="{{$product->id}}" />
              </div>
              @else
              <div>
                <button class="btn essence-btn ml4 " data-toggle="modal" data-target="#loginModal"> Login Untuk Memesan Barang</button>
              </div>
              @endif @endrole

            </div>
          </div>

          <div class="row">
            <div class="mt-5 detailreview">

              <div class="col-md-12">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
                      <i class="fa fa-file-text-o mr-2"></i>
                      <span>Deskripsi</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
                      <i class="fa fa-thumbs-o-up mr-2"></i>
                      <span>Ulasan</span></a>
                    </a>
                  </li>

                </ul>
                <div class="tab-content mt-3" id="myTabContent">
                  <div class="tab-pane fade show active " id="home" role="tabpanel" aria-labelledby="home-tab">
                    {{ $product->description }}
                  </div>

                  <div class="tab-pane fade ulasan" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    @if($product->review === null)
                    <div class="text-sm-center">
                      <img src="" alt="">
                      <b>Belum ada ulasan untuk produk ini</b>
                      <p>Jadilah yang pertama membeli produk ini dan memberikan ulasan</p>
                    </div>
                    @else @foreach ($product->reviews as $review)
                    <div class="card mt-3">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-9">
                            Oleh <b> {{ $review->customer->profile->name }}</b> <br>
                            <small>{{ date_format($review->created_at,"l, d F Y, h:i:s") }}</small>
                            <br> {{ $review->body }}
                          </div>
                        </div>
                      </div>
                    </div>
                    @endforeach @endif
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="new-product">
  @if(Auth::check())
  <new-products :user-id="{{Auth::user()->id}}" :title="'Produk Lain'" /> @else
  <new-products :title="'Produk Lain'" /> @endif
</div>
  @include('users.auth.login_modal')
@endsection