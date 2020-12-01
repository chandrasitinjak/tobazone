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

        <center>
            <br>
            <h2>Paket Wisata Terlaris</h2>
        </center>
        <div class="row justify-content-center align-content-center">
            <div class="col-auto" style="margin-top: 190px">
                <a class="btn-floating" href="#multi-item-example" data-slide="prev"><i class="fa fa-chevron-left fa-2x"></i></a>
            </div>
            <div class="col-9">
                <!--Slides-->
                <div class="carousel-inner" role="listbox" style="position: center;">

                    <!--First slide-->
                    <div class="carousel-item active">

                        @foreach($paket as $row)
                        <div class="col-md-4" style="float:left">
                            <div class="card mb-2" style="border-radius: 10px;">
                                <img class="card-img-top"
                                     src="{{asset('storage/img/paket/'.$row->gambar)}}" alt="Card image cap" style="height: 300px">
                                <div class="card-body">
                                    <h7  class="card-title" style="font-weight: bold;">{{$row->nama_paket}} ( <i class="fa fa-clock-o"></i> &nbsp;{{$row->durasi}} )</h7>
                                    <h5 style="color: #FF8311;">Rp.5000000</h5>
                                    <li class="list-inline-item" style="color: #ffc000;"><i class="fa fa-star"></i></li>
                                    <li class="list-inline-item" style="color: #ffc000;"><i class="fa fa-star"></i></li>
                                    <li class="list-inline-item" style="color: #ffc000;"><i class="fa fa-star"></i></li>
                                    <li class="list-inline-item" style="color: #ffc000;"><i class="fa fa-star"></i></li>
                                    <li class="list-inline-item" style="color: #ffc000;"><i class="fa fa-star"></i></li>

                                    <p class="card-text">
                                        <medium class="text-muted  float-right"> &nbsp;&nbsp;{{$row->getKabupaten->nama_kabupaten}}</medium>
                                        <medium class="text-muted  float-left"></medium>
                                    </p>
                                </div>
                            </div>
                        </div>
                            @endforeach

                    </div>



                </div>
                <!--/.Slides-->
            </div>

            <div class="col-auto" style="margin-top: 190px">
                <a class="btn-floating" href="#multi-item-example" data-slide="next"><i class="fa fa-chevron-right fa-2x"></i></a>
            </div>

        </div>


    </div>
    <!--/.Carousel Wrapper-->



    <!--Ragam paket wisata-->

    <div class="container">
            <center>
                <br>
                <h2>Ragam Paket Wisata</h2>
                <br><br>
            </center>
                <div class="card-body">
                <div class="col-12">
                    <div class="row">
                        @forelse($paket as $row)
                    <div class="col-3">
                         <div class="card products"  style="border-radius: 10px;">
                                <a href="">

                                <img class="card-img-top"
                                     src="{{asset('storage/img/paket/'.$row->gambar)}}" alt="Card image cap" style="height: 300px">

                            <div class="card-body">
                                <h7 class="card-title" style="font-weight: bold">{{$row->nama_paket}} ( <i class="fa fa-clock-o"></i> &nbsp;{{$row->durasi}} )</h7>
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
                    <br><br><br>
                    <center>
                    <button class="btn essence-btn">Muat lebih banyak</button>
                    </center>
                    <br><br>
                    <br><br>
                </div>
            </div>
        </div>



@endsection

