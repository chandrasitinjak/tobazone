@extends('users.layouts.app')
@section('title') {{ "Homestays" }}
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-1">

            </div>
            <div class="col-md-10">
                <div class="container card products mt-5" style="background-color: #F5F5F5">
                    <div class="row" id="check">
                        <div class="col-lg-6 mt-2 mb-2">
                            <div class="input-group">
                                <div class="text-black-50">
                                    <h3>Menampilkan hasil homestay di </h3>
                                </div>
                                <input type="form-control" placeholder="Laguboti" style="margin-left: 10px; width: 50px;font-weight: bold;" readonly class="form-control" id="inlineFormInputGroup">
                            </div>
                        </div>
                        <div class="col-lg- mt-2 mb-2">
                            <div class="input-group">
                                <div class="text-black-50">
                                    <h3>Pada tanggal </h3>
                                </div>
                                <input type="form-control" placeholder="25 Desember 2020" style="margin-left: 10px; font-weight: bold;" readonly class="form-control" id="inlineFormInputGroup">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-1">

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
                                        <img class="img-thumbnail bayangan" src="{{ '../images/'. $product->image}}" width="1000">
                                    </div>
                                </div>
                                <div class="col-lg-6 pt-5 pl-3 mb-2 img-thumbnail bayangan" style="background-color:#F5F5F5;">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h4 class="product-price" style="color: black">{{$product->name }}</h4>
                                            <h6 style="color: black; margin-top: -10px"><i class="fa fa-map-marker fa-lg" aria-hidden="true"></i> {{$product->address }}</h6>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <form class="row pl-3 pr-3">
                                            <div class="col-lg-12">
                                                <h4 class="product-price" style="color: darkorange">Rp {{ number_format($product->price) }} </h4>
                                                <p style="color: darkorange; margin-top: -10px">{{$product->username }}</p>
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

    </div>
@endsection

{{--<script>--}}
{{--    import MainPage from "../../../js/components/homestay/MainPage";--}}
{{--    import CarouselHomestay from "../../../js/components/homestay/CarouselHomestay";--}}

{{--    export default {--}}
{{--        components : {MainPage,CarouselHomestay}--}}
{{--    }--}}
{{--</script>--}}
{{--<style scoped>--}}
{{--    /* Style the input container */--}}
{{--    .input-container {--}}
{{--        display: flex;--}}
{{--        width: 100%;--}}
{{--        margin-bottom: 15px;--}}
{{--    }--}}

{{--    /* Style the form icons */--}}
{{--    .icon {--}}
{{--        padding: 10px;--}}
{{--        background: #F5F5F5;--}}
{{--        color: white;--}}
{{--        min-width: 50px;--}}
{{--        text-align: center;--}}
{{--    }--}}

{{--</style>--}}

