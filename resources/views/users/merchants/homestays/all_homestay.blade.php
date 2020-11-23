@extends('users.layouts.app')
@section('title') {{ "Dashboard" }}
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card globalcard store">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3 col-sm-3 d-none d-sm-block store-image px-0">
                            @if($result['merchant']->profile->photo == NULL)
                            <div class="imgwrapper">
                                <img src="{{ url('/images/assets/no-image.jpg') }}" alt="">
                            </div>
                            @else
                            <div class="imgwrapper">
                                <img src="{{ url("/images/user_profiles/".$result['merchant']->profile->photo
                                )}}" alt="">
                            </div>
                            @endif
                        </div>
                        <div class="col-md-9 col-sm-12 store-name pl-0">
                            <div class="row">
                                <div class="col-10 col-sm-8 col-md-10">
                                    <h5 class="mb-0"> {{ $result['merchant']->profile->name }}</h5>
                                </div>

                                <div class="col-2 ">
                                    <a href="{{ url('/merchant/'.$result['merchant']->id.'/editProfile') }}">
                                        <button type="submit"
                                                class="button essence-btn btn-sm float-right">
                                            <i class="fa fa-gear"></i> &nbsp; UBAH
                                        </button>
                                    </a>
                                </div>
                            </div>
                            <p> Horas Mamangke Mangomo Partiga-tiga </p>
                            <div class="store-desc">
                                <i class="fa fa-map mr-1"></i>
                                {{$result['merchant']->profile->address->subdistrict_name}} {{", " .
                                $result['merchant']->profile->address->city_name}}
                                {{", " . $result['merchant']->profile->address->province_name}} <br>
                                <i class="fa fa-clock-o mr-1"></i>{{date('d-m-Y',
                                strtotime($result['merchant']->email_verified_at))}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--menu-store-->
    <div class="row">
        <!--sidebar-->
        @include('users.merchants.sidebar')
        <!--//sidebar-->

        <!--content-->
        <div id="product-list" class="col-12 col-md-9 col-lg-9">
            <br><br>
            <h4>Semua Penginapan</h4>
            <hr>
            <br>
            <div class="row">
                @foreach ($result['homestay'] as $product)
                <div class="col-12 col-sm-6 col-lg-4 card">
                    <div class="single-product-wrapper">
                        <a href="{{ '../images/assets/no-image.jpg'}}">
                            <div class="product-img">

                                <img src="{{ '../../images/assets/no-image.jpg'}}" alt="">

                            </div>
                        </a>
                        <div class="product-description">
                            <div class="row">
                                <div class="col-md-7">
                                    <a href="{{ url('/homestays/find', $product->id)}}">
                                        <h6>{{$product->name}}</h6></a>
                                </div>
                                <div class="col-md-5" style="alignment: right">
                                    <p class="product-price" style="color: #FF8311; "> Rp.{{
                                        $product->price }}</p>
                                </div>
                                <br>
                            </div>
                            <div class="row">
                                <div class="col-md-1">
                                    <i class="fa fa-map-marker icon fa-lg"
                                       style="color:#000000;"></i>
                                </div>
                                <div class="col-md-10">
                                    <p> {{ $product->address }}</p>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6" align="left">
                                <a class="btn" style="background-color: #222757; color: white" href="{{ url('/merchant/homestay/update',$product->id)}}">
                                    Ubah
                                </a>
                            </div>
                            <div class="col-md-6" align="right">
                                <button class="btn" style="background-color: #6D0000; color: white"
                                        onclick="deletes()">Hapus
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>
</div>
@endsection

<script>
    function deletes() {
        var txt;
        var r = confirm("Press a button!");
        if (r == true) {
            $.delete('//merchant/homestay/delete/' + 2, function (res) {
                alert(res)
            });
            alert("You pressed OK!");
        } else {
            alert("You pressed Cancel!");
        }
    }

</script>
