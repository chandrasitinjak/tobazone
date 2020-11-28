@extends('users.layouts.app')
@section('content')


    <!--Gambar atas-->

        <div class="container">
            <div class="row">
                <div class="col-1"></div>
                <div class="col-10">
                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <center>
                                    <br>
                                <h2>Paket Wisata</h2>
                                </center>
                                <br>
                               <a href=""><img src="{{ url("/images/carousels/Banner.png" )}}" class="d-block w-100" alt="..."
                                               style="height: 400px; width: 250px;"></a>
                                <br><br>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-1"></div>
            </div>
        </div>



    <!--Carousel Wrapper-->
    <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">

        <!--Controls-->
        <div class="controls-top">
            <a class="btn-floating" href="#multi-item-example" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
            <a class="btn-floating" href="#multi-item-example" data-slide="next"><i
                    class="fa fa-chevron-right"></i></a>
        </div>
        <!--/.Controls-->


        <!--Slides-->
        <div class="carousel-inner" role="listbox" style="position: center;">

            <!--First slide-->
            <div class="carousel-item active">


                <div class="col-md-3" style="float:left">
                    <div class="card mb-2">
                        <img class="card-img-top"
                             src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(60).jpg" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title">Card title</h4>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                                card's content.</p>
                            <a class="btn btn-primary">Button</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3" style="float:left">
                    <div class="card mb-2">
                        <img class="card-img-top"
                             src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(60).jpg" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title">Card title</h4>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                                card's content.</p>
                            <a class="btn btn-primary">Button</a>
                        </div>
                    </div>
                </div>

            </div>
            <!--/.First slide-->

            <!--Second slide-->
            <div class="carousel-item">

                <div class="col-md-3" style="float:left">
                    <div class="card-products" style="border-radius: 10px;">
                        <img class="card-img-top"
                             src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(60).jpg" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title">Card title</h4>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                                card's content.</p>
                            <a class="btn btn-primary">Button</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3" style="float:left">
                    <div class="card mb-2">
                        <img class="card-img-top"
                             src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(47).jpg" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title">Card title</h4>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                                card's content.</p>
                            <a class="btn btn-primary">Button</a>
                        </div>
                    </div>
                </div>



            </div>
            <!--/.Second slide-->



        </div>
        <!--/.Slides-->

    </div>
    <!--/.Carousel Wrapper-->









    <!--Ragam paket wisata-->

    <div class="container">
            <center>
                <br>
                <h2>Ragam Paket Wisata</h2>
            </center>
                <div class="card-body">
                <div class="col-12">
                    <div class="row">
                        @forelse($paket as $row)
                    <div class="col-3">
                         <div class="card products"  style="border-radius: 10px;">
                                <a href="">
                            <div class="imgwrapper">
                                <img src="{{asset('storage/img/paket/'.$row->gambar)}}"
                                     alt="Card image cap" style="width: 1200px">
                            </div>
                            <div class="card-body">
                                <h7 class="card-title">{{$row->nama_paket}} ( <i class="fa fa-clock-o"></i> &nbsp;{{$row->durasi}} )</h7>
                                {{--                                    <h7 class="card-title">Nama ( <i class="fa fa-clock-o"></i> &nbsp; )</h7>--}}
                                <h5 style="color: #FF8311;">Rp.{{number_format($row->harga_paket)}}</h5>
                                <li class="list-inline-item" style="color: #ffc000;"><i class="fa fa-star"></i></li>
                                <li class="list-inline-item" style="color: #ffc000;"><i class="fa fa-star"></i></li>
                                <li class="list-inline-item" style="color: #ffc000;"><i class="fa fa-star"></i></li>
                                <li class="list-inline-item" style="color: #ffc000;"><i class="fa fa-star"></i></li>
                                <li class="list-inline-item" style="color: #ffc000;"><i class="fa fa-star"></i></li>

                                <h5 style="color: #FF8311;"></h5>
                                <p></p>
                                <p class="card-text">
                                    <medium class="text-muted  float-right"> &nbsp;{{$row->getKabupaten->nama_kabupaten}}</medium>
                                    <medium class="text-muted  float-left"></medium>
                                </p>
                            </div>
                             </a>
                         </div>
                     </div>
                @endforeach
                </div>
                </div>
            </div>
        </div>














{{--            <div class="row">--}}
{{--                <center><br><h2>Ragam Paket Wisata</h2><br></center>--}}
{{--                <div class="col-md-12">--}}
{{--                @forelse($paket as $row)--}}
{{--                    <div class="col-3">--}}
{{--                        <div class="card products"  style="border-radius: 10px;">--}}
{{--                            <a href="">--}}
{{--                                <div class="imgwrapper">--}}
{{--                                    <img src="{{ url("/images/carousels/Banner.png" )}}"--}}
{{--                                         alt="Card image cap" style="width: 1500px">--}}
{{--                                </div>--}}
{{--                                <div class="card-body">--}}
{{--                                    <h7 class="card-title">Nama Pket ( <i class="fa fa-clock-o"></i> &nbsp;Durasi )</h7>--}}
{{--                                                                        <h7 class="card-title">{{$row->nama_paket}} ( <i class="fa fa-clock-o"></i> &nbsp;{{$row->durasi}} )</h7>--}}
{{--                                                                        <h5 style="color: #FF8311;">Harga</h5>--}}
{{--                                    <h5 style="color: #FF8311;">Harga</h5>--}}
{{--                                    <p></p>--}}
{{--                                    <p class="card-text">--}}
{{--                                                                                <medium class="text-muted  float-right"> &nbsp;{{$row->getKabupaten->nama_kabupaten}}</medium>--}}
{{--                                        <medium class="text-muted  float-right"> &nbsp;Kabupatej}</medium>--}}
{{--                                        <medium class="text-muted  float-left"></medium>--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}


{{--                    @endforeach--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div>--}}

{{--        </div>--}}



@endsection

