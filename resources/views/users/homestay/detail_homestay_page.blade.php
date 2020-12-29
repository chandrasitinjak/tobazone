@extends('users.layouts.app')
@section('title') {{ "Homestay" }}
@endsection

@section('content')
<section class="shop_grid_area section-padding-80">
    <div class="container">
        <div class="card container bayangan-bawah"
             style="background-color: #FFFAF4; margin-bottom: -20px">
            <br>
            <div class="row">
                <div class="col-md-6">
                    <h4>{{$homestays['homestays']->name}}</h4>
                </div>
                {{--
                <div class="col-md-6" align="right">--}}
                    {{-- <p style="color: #FF8311">Harga Kamar/Hari </p>--}}
                    {{--
                </div>
                --}}
            </div>
            <div class="row">
                <div class="col-md-6">
                    <p>{{$homestays['homestays']->address}}</p>
                </div>
                {{--
                <div class="col-md-6" align="right">--}}
                    {{-- <h4 style="color: #FF8311">Rp. {{$homestays['homestays']->price}}</h4>--}}
                    {{--
                </div>
                --}}
            </div>
            <br>
        </div>
        <br><br>

        @if(count($homestays['kamar'])==0)
        <center>
            <img src="/images/assets/search_result_empty.png"
                 style="height: 120px; border: none; opacity: 0.5"/>
            <br>
            <p>Kamar tidak ditemukan</p>
        </center>
        @endif
        <?php $count = 0; ?>
        @foreach ($homestays['kamar'] as $kamar)
        <div class="container card bayangan-luar mt-5" style="background-color: #f2eded">
            <?php $count++ ?>
            <div class="row">
                <div class="col-md-6">
                    <h4 class="mt-3">Kamar {{$count}}</h4>
                </div>
                <div class="col-md-5" align="end">
                    <h4 class="mt-3" style="color: darkorange">{{$kamar->kategori}}</h4>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-5">
                    <div class="col-12 mb-3">
                        <img class="img-thumbnail bayangan"
                             src="data:image/jpeg;base64,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"
                             width="1000">
                    </div>
                </div>
                <div class="col-lg-7 bg-white pt-3 pl-3 mb-3 img-thumbnail bayangan">
                    <div class="row">
                        <div class="col-md-12 row">
                            <form class="row pl-3 pr-3" method="POST"
                                  action="{{ url('/homestay/pesan', $kamar->id)}}">
                                {{ csrf_field() }}
                                <div class="col-lg-6">
                                    <p style="margin-bottom: -5px; font-weight: bolder">Check in</p>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-calendar"
                                                                             aria-hidden="true"></i>
                                            </div>
                                        </div>
                                        <input type="date" name="checkIn" class="form-control"
                                               id="inlineFormInputGroup">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <p style="margin-bottom: -5px; font-weight: bolder">Durasi</p>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-moon-o"
                                                                             aria-hidden="true"></i>
                                            </div>
                                        </div>
                                        <input type="number" min="1" class="form-control"
                                               name="durasi" id="inlineFormInputGroup">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <p style="margin-bottom: -5px; font-weight: bolder">Tamu</p>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-users"
                                                                             aria-hidden="true"></i>
                                            </div>
                                        </div>
                                        <input type="number" min="1" name="totalRoom"
                                               class="form-control" id="inlineFormInputGroup">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-5">
                            <p>Fasilitas</p>
                            <hr>
                            @if(str_contains($kamar->facilities,'Wifi'))
                            <p><i class="fa fa-wifi" aria-hidden="true"></i>&nbsp;&nbsp;Wifi</p>
                            @endif
                            @if(str_contains($kamar->facilities,'Pemanas'))
                            <p><i class="fa fa-coffee" aria-hidden="true"></i>&nbsp;&nbsp;Pemanas
                            </p>
                            @endif
                            @if(str_contains($kamar->facilities,'Kamar mandi'))
                            <p><i class="fa fa-bath" aria-hidden="true"></i>&nbsp;&nbsp;Kamar Mandi
                            </p>
                            @endif
                            @if(str_contains($kamar->facilities,'Ac'))
                            <p><i class="fa fa-retweet" aria-hidden="true"></i>&nbsp;&nbsp;Air
                                Conditioner</p>
                            @endif
                        </div>
                        <div class="col-md-7">
                            <div class="col-lg-12 mt-4 mb-3" align="end">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h4 class="product-price" style="color: darkorange">Rp {{
                                            number_format("$kamar->price" ,0) }}</h4>
                                        <p style="color: darkorange; margin-top: -10px">
                                            Harga/Kamar/Malam</p>
                                    </div>
                                </div>
                                <button type="submit" class="btn essence-btn-sm">Pesan
                                    Homestay
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
            </div>
        </div>
        @endforeach

    </div>
    <hr>
    <!--    <div class="container">-->
    <!--        <div class="row">-->
    <!--            <div class="col-12 col-md-12 col-lg-12">-->
    <!--                <div class="shop_grid_product_area">-->
    <!--                    <div class="row justify-content-center mt-4">-->
    <!--                        <div class="col-lg-3 col-md-3 col-12">-->
    <!--                            <div class="card products"  style="border-radius: 10px;">-->
    <!--                                <a href="">-->
    <!--                                    <img class="card-img-top"-->
    <!--                                         src="data:image/jpeg;base64,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" alt="Card image cap">-->
    <!---->
    <!--                                    <div class="card-body">-->
    <!--                                        <h7 class="card-title" style="font-weight: bold">Wisata Danau Toba ( <i class="fa fa-clock-o"></i> &nbsp;2 Hari 1 Malam )</h7>-->
    <!--                                        <h5 style="color: #FF8311;">Rp.{{number_format("300000")}}</h5>-->
    <!--                                        <li class="list-inline-item" style="color: #ffc000;"><i class="fa fa-star"></i></li>-->
    <!--                                        <li class="list-inline-item" style="color: #ffc000;"><i class="fa fa-star"></i></li>-->
    <!--                                        <li class="list-inline-item" style="color: #ffc000;"><i class="fa fa-star"></i></li>-->
    <!--                                        <li class="list-inline-item" style="color: #ffc000;"><i class="fa fa-star"></i></li>-->
    <!--                                        <li class="list-inline-item" style="color: #ffc000;"><i class="fa fa-star"></i></li>-->
    <!---->
    <!--                                        <h5 style="color: #FF8311;"></h5>-->
    <!--                                        <p></p>-->
    <!--                                        <p class="card-text">-->
    <!--                                            <medium class="text-muted  float-right"> &nbsp;Samosir</medium>-->
    <!--                                            <medium class="text-muted  float-left"></medium>-->
    <!--                                        </p>-->
    <!--                                    </div>-->
    <!--                                </a>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!---->
    <!--                        <div class="col-lg-3 col-md-3 col-12">-->
    <!--                            <div class="card products"  style="border-radius: 10px;">-->
    <!--                                <a href="">-->
    <!--                                    <img class="card-img-top"-->
    <!--                                         src="data:image/jpeg;base64,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" alt="Card image cap">-->
    <!---->
    <!--                                    <div class="card-body">-->
    <!--                                        <h7 class="card-title" style="font-weight: bold">Wisata Danau Toba ( <i class="fa fa-clock-o"></i> &nbsp;2 Hari 1 Malam )</h7>-->
    <!--                                        <h5 style="color: #FF8311;">Rp.{{number_format("300000")}}</h5>-->
    <!--                                        <li class="list-inline-item" style="color: #ffc000;"><i class="fa fa-star"></i></li>-->
    <!--                                        <li class="list-inline-item" style="color: #ffc000;"><i class="fa fa-star"></i></li>-->
    <!--                                        <li class="list-inline-item" style="color: #ffc000;"><i class="fa fa-star"></i></li>-->
    <!--                                        <li class="list-inline-item" style="color: #ffc000;"><i class="fa fa-star"></i></li>-->
    <!--                                        <li class="list-inline-item" style="color: #ffc000;"><i class="fa fa-star"></i></li>-->
    <!---->
    <!--                                        <h5 style="color: #FF8311;"></h5>-->
    <!--                                        <p></p>-->
    <!--                                        <p class="card-text">-->
    <!--                                            <medium class="text-muted  float-right"> &nbsp;Samosir</medium>-->
    <!--                                            <medium class="text-muted  float-left"></medium>-->
    <!--                                        </p>-->
    <!--                                    </div>-->
    <!--                                </a>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!---->
    <!--                        <div class="col-lg-3 col-md-3 col-12">-->
    <!--                            <div class="card products"  style="border-radius: 10px;">-->
    <!--                                <a href="">-->
    <!--                                    <img class="card-img-top"-->
    <!--                                         src="data:image/jpeg;base64,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" alt="Card image cap">-->
    <!---->
    <!--                                    <div class="card-body">-->
    <!--                                        <h7 class="card-title" style="font-weight: bold">Wisata Danau Toba ( <i class="fa fa-clock-o"></i> &nbsp;2 Hari 1 Malam )</h7>-->
    <!--                                        <h5 style="color: #FF8311;">Rp.{{number_format("300000")}}</h5>-->
    <!--                                        <li class="list-inline-item" style="color: #ffc000;"><i class="fa fa-star"></i></li>-->
    <!--                                        <li class="list-inline-item" style="color: #ffc000;"><i class="fa fa-star"></i></li>-->
    <!--                                        <li class="list-inline-item" style="color: #ffc000;"><i class="fa fa-star"></i></li>-->
    <!--                                        <li class="list-inline-item" style="color: #ffc000;"><i class="fa fa-star"></i></li>-->
    <!--                                        <li class="list-inline-item" style="color: #ffc000;"><i class="fa fa-star"></i></li>-->
    <!---->
    <!--                                        <h5 style="color: #FF8311;"></h5>-->
    <!--                                        <p></p>-->
    <!--                                        <p class="card-text">-->
    <!--                                            <medium class="text-muted  float-right"> &nbsp;Samosir</medium>-->
    <!--                                            <medium class="text-muted  float-left"></medium>-->
    <!--                                        </p>-->
    <!--                                    </div>-->
    <!--                                </a>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!---->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
</section>
@endsection
<script>
    import FormPesanHomestay from "../../../js/components/homestay/FormPesanHomestay";

    export default {
        components: {FormPesanHomestay}
    }
</script>
@section('style')
<style>
    .bayangan {
        -webkit-box-shadow: 2px 1px 12px 1px rgba(0, 0, 0, 0.75);
        -moz-box-shadow: 2px 1px 12px 1px rgba(0, 0, 0, 0.75);
        box-shadow: 2px 1px 12px 1px rgba(0, 0, 0, 0.75);
    }

    .bayangan-bawah {
        -webkit-box-shadow: 2px 6px 12px -3px rgba(0, 0, 0, 0.75);
        -moz-box-shadow: 2px 6px 12px -3px rgba(0, 0, 0, 0.75);
        box-shadow: 2px 6px 12px -3px rgba(0, 0, 0, 0.75);
    }

    /*.bayangan-luar{*/
    /*    -webkit-box-shadow: 0px 2px 35px -17px rgba(0,0,0,0.75);*/
    /*    -moz-box-shadow: 0px 2px 35px -17px rgba(0,0,0,0.75);*/
    /*    box-shadow: 0px 2px 35px -17px rgba(0,0,0,0.75);*/
    /*}*/
</style>
@endsection
