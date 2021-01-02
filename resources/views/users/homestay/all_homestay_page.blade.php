@extends('users.layouts.app')
@section('title') {{ "Homestays" }}
@endsection

@section('content')
<section class="shop_grid_area section-padding-80">
    <div class="row">
        <div class="col-md-12">
            <div>
                <div class="card" style="background-color: #FFFAF4" style="outline: none">
                    <div>
                        <form action="/homestays/searchInAllPage" method="POST">
                            {{ csrf_field() }}
                            <div class="container">

                                <br><br>
                                <div class="row justify-content-md-center">
                                    <div class="col col-md-1">

                                    </div>
                                    <div class="col-md-6">

                                        <p style="margin-bottom: -5px; font-weight: bolder">Destinasi Penginapan</p>

                                        <div id="lokasi" class="input-container">
                                            <i class="fa fa-map-marker icon fa-lg" style="color:#000000;"></i>
                                            <input class="form-control" type="text" placeholder="Lokasi"
                                                   name="kecamatan">
                                        </div>

                                        <div class="row" id="check">
                                            <div class="col-lg-6">
                                                <p style="margin-bottom: -5px; font-weight: bolder">Check in</p>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"><i class="fa fa-calendar"
                                                                                         aria-hidden="true"></i></div>
                                                    </div>
                                                    <input type="date" class="form-control" id="inlineFormInputGroup">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <p style="margin-bottom: -5px; font-weight: bolder">Durasi</p>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"><i class="fa fa-moon-o"
                                                                                         aria-hidden="true"></i></div>
                                                    </div>
                                                    <input type="number" class="form-control" id="inlineFormInputGroup">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-5">
                                                <p style="margin-bottom: -5px; font-weight: bolder">Check out</p>
                                                <p style="margin-bottom: -5px;font-weight: bold;font-weight: bolder">
                                                    Sabtu,26 Dec 2020</p>

                                            </div>
                                        </div>
                                        <label for="tamu">Tamu dan Kamar</label>
                                        <div id="tamu" class="input-container ">
                                            <i class="fa fa-users icon fa-lg" style="color:#000000;"></i>
                                            <input class="form-control" type="number" min="1" name="tamu">
                                        </div>
                                        <br>
                                        <div>

                                            <button class="form-control"
                                                    style="background-color:#000000; color:#ffffff;" type="submit">Cari
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col col-md-1">

                                    </div>
                                </div>

                                <br><br>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-md-center">
            <div class=" col-md-1">

            </div>
            <div class="col-md-10">
                @foreach ($homestays as $product)
                <a href="{{ url('/homestays/find', $product->id)}}">
                    <div class="container card products mt-5" style="background-color: #F5F5F5">

                        <h3 class="mt-3">{{$product->name }}</h3>
                        <hr>
                        <div class="row">

                            <div class="col-lg-4">
                                <div class="col-12 mb-3">
                                    <img class="img-thumbnail bayangan" src="{{ '../images/'. $product->image}}"
                                         width="1000">
                                </div>
                            </div>
                            <div class="col-lg-6 pt-5 pl-3 mb-2 img-thumbnail bayangan"
                                 style="background-color:#F5F5F5;">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h4 class="product-price" style="color: black">{{$product->name }}</h4>
                                        <h6 style="color: black; margin-top: -10px"><i class="fa fa-map-marker fa-lg"
                                                                                       aria-hidden="true"></i>
                                            {{$product->address }}</h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <form class="row pl-3 pr-3">
                                        <div class="col-lg-12">
                                            <h4 class="product-price" style="color: darkorange">Rp {{
                                                number_format($product->price) }} </h4>
                                            <p style="color: darkorange; margin-top: -10px">{{
                                                $product->username }}</p>

                                        </div>

                                    </form>
                                </div>

                            </div>

                        </div>


                    </div>
                    @endforeach
                </a>
            </div>
            <div class=" col-md-1">

            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-auto">

            </div>
        </div>

    </div>


    <!-- Pagination -->
    {{--
    <nav aria-label="navigation">--}}
        {{--
        <ul class="pagination mt-50 mb-70">--}}
            {{--
            <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-left"></i></a></li>
            --}}
            {{--
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            --}}
            {{--
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            --}}
            {{--
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            --}}
            {{--
            <li class="page-item"><a class="page-link" href="#">...</a></li>
            --}}
            {{--
            <li class="page-item"><a class="page-link" href="#">21</a></li>
            --}}
            {{--
            <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a></li>
            --}}
            {{--
        </ul>
        --}}
        {{--
    </nav>
    --}}
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
<style scoped>
    /* Style the input container */
    .input-container {
        display: flex;
        width: 100%;
        margin-bottom: 15px;
    }

    /* Style the form icons */
    .icon {
        padding: 10px;
        background: #F5F5F5;
        color: white;
        min-width: 50px;
        text-align: center;
    }
</style>
