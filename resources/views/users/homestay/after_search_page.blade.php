@extends('users.layouts.app')
@section('title') {{ "Homestays" }}
@endsection

@section('content')

<section class="shop_grid_area section-padding-80">
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="shop_grid_product_area">
                    <div class="row">
                        <div class="col-12">
                            <div
                                class="product-topbar d-flex align-items-center justify-content-between">
                                <!-- Total Products -->
                                <div class="total-products">
                                </div>
                            </div>
                        </div>
                    </div>
                    @if(count($homestays) == 0)
                    <center><img src="/images/assets/search_result_empty.png"
                                 style="height: 120px; alignment: center; border: none; opacity: 0.5"/>
                        <p>Pencarian tidak ditemukan</p></center>
                    <br>
                    @else
                    <div class="container">
                        @foreach ($homestays as $product)
                        <div class="row justify-content-center">
                            <div class="col-md-9">
                                <div class="card" style="background-color: #F5F5F5">
                                    <div class="row">
                                        <div class="col-md-3 d-flex align-items-center justify-content-center">
                                            <a class="" href="{{ url('/homestays/find', $product->id)}}">
                                                <div class="product-img">
                                                    <img src="{{ asset('/images/'.$product->image)}}"
                                                         alt="">
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-3">
                                            <h3>{{ $product->name }}</h3>
                                            <p>{{$product->address}}</p>
                                            <p style="color: #FF8311; font-size: 20px"
                                               class="product-price"> IDR {{ $product->price }}</p>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="product-description">
                                                <p class="product-price" style="margin: 20px">
                                                    {{ $product->description }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <a class="btn"
                                               href="{{ url('/homestays/find', $product->id)}}"
                                               style="background-color: #0b0b0b; color: #ffffff; margin-top: 100px; width: 100px">
                                                Lihat
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <br><br><br>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    @endif

                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Shop Grid Area End ##### -->
@endsection

<script>
    import MainPage from "../../../js/components/homestay/MainPage";
    import CarouselHomestay from "../../../js/components/homestay/CarouselHomestay";

    export default {
        components: {MainPage, CarouselHomestay}
    }
</script>
