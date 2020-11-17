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

                    <div class="row">
                        @foreach ($homestays as $product)
                        <div class="col-md-12">
                            <div class="card" style="background-color: #F5F5F5">
                                <div class="row">
                                    <div class="col-md-3">
                                        <a href="{{ '../images/assets/no-image.jpg'}}">
                                            <div class="product-img">
                                                <img src="{{ '../images/assets/no-image.jpg'}}"
                                                     alt="">
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-3">
                                        <br>
                                        <h3>{{ $product->name }}</h3>
                                        <br>
                                        <p>{{$product->address}}</p>
                                        <br>
                                        <p style="color: #FF8311; font-size: 20px" class="product-price"> IDR {{ $product->price }}</p>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="product-description">
                                            <p class="product-price" style="margin: 20px"> {{ $product->description
                                                }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <button class="btn"
                                                href="{{ url('/homestays/find', $product->id)}}"
                                                style="background-color: #0b0b0b; color: #ffffff; margin-top: 100px; width: 100px">
                                            Lihat
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <br><br><br>
                        </div>
                        @endforeach
                    </div>
                </div>
                <!-- Pagination -->
                <nav aria-label="navigation">
                    <ul class="pagination mt-50 mb-70">
                        <li class="page-item"><a class="page-link" href="#"><i
                                    class="fa fa-angle-left"></i></a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">...</a></li>
                        <li class="page-item"><a class="page-link" href="#">21</a></li>
                        <li class="page-item"><a class="page-link" href="#"><i
                                    class="fa fa-angle-right"></i></a></li>
                    </ul>
                </nav>
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
