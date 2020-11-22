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
            <h4>Pesanan Masuk</h4>
            <hr>
            <br>
            <div class="row">
                @foreach ($result['orders'] as $product)
                <div class="col-lg-12 card" style="background-color: #F5F5F5">
                    <div class="row container">
                        <br>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <p>Nama : </p>
                                    <p>Check in : </p>
                                    <p>Durasi : </p>
                                    <p>Homestay : </p>
                                    <p>Lokasi : </p>
                                    <p>Total : </p>
                                </div>
                                <div class="col-md-6">
                                    <p>--</p>
                                    <p>Check in : </p>
                                    <p>Durasi : </p>
                                    <p>Homestay : </p>
                                    <p>Lokasi : </p>
                                    <p>Total : </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <p>Resi : </p>
                            <div class="product-img">
                                <img src="{{ '../../images/assets/no-image.jpg'}}" alt="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <br><br><br>
                            <center>
                                <button class="btn" style="width: 100px; background-color: #222757; color: white">Terima</button>
                                <br><br><br>
                                <button class="btn" style="width: 100px; background-color: #6D0000; color: white">Tolak</button>
                            </center>

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
