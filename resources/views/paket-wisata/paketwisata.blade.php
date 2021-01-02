@extends('users.layouts.app')
@section('content')
    <br>
    <div class="row mb-5">
        <div class="col"></div>
        <div class="col-lg-10 col-md-12 col-sm-12">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="{{ '/images/banners/banner.png'}}"
                             alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ '/images/banners/banner2.png'}}"
                             alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ '/images/banners/banner3.png'}}"
                             alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="col"></div>
    </div>

    <div class="row mb-5">
        @if(Auth::check())
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="single_travel text-center">
                    <div class="icon">
                        <!-- <img src="images/tour.png" alt=""> -->
                        <a href="{{route('paket.list')}}"><img src="{{ asset("/images/tour.png" )}}" alt="..."
                            ></a>
                    </div>
                    <h3>Paket Wisata</h3>
                    <p>Perjalanan wisata yang dirancang agar perjalanan lebih menyenangkan.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="single_travel text-center">
                    <div class="icon">
                        <!-- <img src="images/tour.png" alt=""> -->
                        <a href="{{route('pemesanan')}}"><img src="{{ asset("/images/riwayatpemesanan.png" )}}"
                                                              alt="..."
                            ></a>
                    </div>
                    <h3>Riwayat Pemesanan</h3>
                    <p>Komunitas yang dibangun untuk meningkatkan produktivitas penyaji wisata.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="single_travel text-center">
                    <div class="icon">
                        <!-- <img src="images/komunitas.png" alt=""> -->
                        <a href="{{route('komunitas')}}"><img src="{{ asset("/images/komunitas.png" )}}"
                                                              alt="..."
                            ></a>
                    </div>
                    <h3>Comunity Based Tourism</h3>
                    <p>Komunitas yang dibangun untuk meningkatkan produktivitas penyaji wisata.</p>
                </div>
            </div>
        @else
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="single_travel text-center">
                    <div class="icon">
                        <!-- <img src="images/tour.png" alt=""> -->
                        <a href="{{route('paket.list')}}"><img src="{{ asset("/images/tour.png" )}}" alt="..."
                            ></a>
                    </div>
                    <h3>Paket Wisata</h3>
                    <p>Perjalanan wisata yang dirancang agar perjalanan lebih menyenangkan.</p>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="single_travel text-center">
                    <div class="icon">
                        <!-- <img src="images/komunitas.png" alt=""> -->
                        <a href="{{route('komunitas')}}"><img src="{{ asset("/images/komunitas.png" )}}"
                                                              alt="..."
                            ></a>
                    </div>
                    <h3>Comunity Based Tourism</h3>
                    <p>Komunitas yang dibangun untuk meningkatkan produktivitas penyaji wisata.</p>
                </div>
            </div>
        @endif
    </div>

    <br>
    <br>


    <!-- <div class="row">
        <div class="col-auto">
            <h4>Filter Paket Wisata</h4>
        </div>
        <div class="col-auto">
            <div class="dropdown">
                <button class="btn dropdown-toggle bg-light" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"  aria-expanded="false" style="background-color: #545454">
                   Kabupaten
                </button>
                <div class="dropdown-menu bg-transparent" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </div>
        </div>
        <div class="col-auto">
            <div class="dropdown">
                <button class="btn dropdown-toggle bg-light" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: #545454">
                  Tipe Jenis Perjalanan
                </button>
                <div class="dropdown-menu bg-transparent" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </div>
        </div>
    </div> -->

    {{--            <div class="row mb-5 ml-1">--}}
    {{--                <div class="col-lg-6 col-md-12 col-sm-12 ">--}}
    {{--                                <form action="{{route('paket.filter')}}" method="post">--}}
    {{--                                    @csrf--}}
    {{--                                        <div class="row">--}}
    {{--                                            <h4>Ragam Paket Wisata</h4>--}}
    {{--                                                <select name="kabupaten" class="col-lg-4 mb-1 mr-1 p-3 col-md-6 col-sm-5" style="--}}
    {{--                                                border: none;--}}
    {{--                                                border-radius: 5px;--}}
    {{--                                                color: black;--}}
    {{--                                                background-color: #d9d9d9;">--}}
    {{--                                                    <option data-display="Kabupaten">Kabupaten</option>--}}
    {{--                                                    @foreach($kabupaten as $row)--}}
    {{--                                                        <option value="{{$row->id_kabupaten}}"--}}
    {{--                                                                data-display="{{$row->nama_kabupaten}}"--}}
    {{--                                                            {{(isset($id_kab)&&($id_kab==$row->id_kabupaten))?'selected':null}}> {{$row->nama_kabupaten}} </option>--}}
    {{--                                                    @endforeach--}}
    {{--                                                </select>--}}
    {{--                                                <select name="jenis" class="col-lg-4 mb-1 mr-1 p-3 col-md col-sm" style="--}}
    {{--                                            border: none;--}}
    {{--                                            border-radius: 5px;--}}
    {{--                                            color: black;--}}
    {{--                                            background-color: #d9d9d9;">--}}
    {{--                                                    <option data-display="Tipe/Jenis Perjalanan"> Tipe/Jenis Perjalanan--}}
    {{--                                                    </option>--}}
    {{--                                                    @foreach($jenis as $row)--}}
    {{--                                                        <option value="{{$row->jenis_paket}}"--}}
    {{--                                                                data-display="{{$row->jenis_paket}}"--}}
    {{--                                                            {{(isset($jeniss)&&(strcmp($jeniss,$row->jenis_paket)==0)?'selected':null)}}>--}}
    {{--                                                            {{$row->jenis_paket}}</option>--}}

    {{--                                                    @endforeach--}}
    {{--                                                </select>--}}
    {{--                                                <button type="submit" class="col-lg-2 mb-1 p-3 col-md-12 col-sm-12" style="--}}
    {{--                                            border: none;--}}
    {{--                                            border-radius: 5px;--}}
    {{--                                            color: black;--}}
    {{--                                            background-color: #d9d9d9;"><i class="fa fa-filter" aria-hidden="true"></i>--}}
    {{--                                                    Filter--}}
    {{--                                                </button>--}}

    {{--                                        </div>--}}
    {{--                                </form>--}}
    {{--                </div>--}}
    {{--                <div class="col">--}}

    {{--                </div>--}}
    {{--            </div>--}}
    <!--Carousel Wrapper-->
    <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">

        <center>
            <br>
            <h2>Paket Wisata Terbaru</h2><br>
        </center>
        <div class="row justify-content-center align-content-center">
            {{--            <div class="col-auto" style="margin-top: 190px">--}}
            {{--                <a class="btn-floating" href="#multi-item-example" data-slide="prev"><i class="fa fa-chevron-left fa-2x"></i></a>--}}
            {{--            </div>--}}
            <div class="col-10">
                <!--Slides-->
                <div class="carousel-inner" role="listbox" style="position: center;">

                    <!--First slide-->
                    <div class="carousel-item active" >
                        @foreach($paket as $row)
                            <div class="col-md-3" style="float:left">
                                <div class="card mb-2" style="border-radius: 10px;">
                                    <a href="{{route('paket.detail',$row->id_paket)}}">
                                        <div class="imgwrapper">
                                            <img class="card-img-top"
                                                 src="{{asset('/storage/img/paket/'.$row->gambar)}}"
                                                 alt="Card image cap"
                                                 style="height: 100%; width: 100%; object-fit: cover">
                                        </div>
                                        <div class="card-body">
                                            <h7 class="card-title"
                                                style="font-weight: bold;">{{strlen($row->nama_paket)>20?substr(strip_tags(str_replace(PHP_EOL, '<br>', $row->nama_paket), '<br>'), 0, 20).' . . .':$row->nama_paket}}
                                                <br>( <i class="fa fa-clock-o"></i> &nbsp;{{$row->durasi}} )
                                            </h7>
                                            <h5 style="color: #ff8311;"> Rp.{{number_format($row->harga_paket)}}</h5>
                                            <p class="card-text">
                                                <medium class="text-muted  float-right">
                                                    &nbsp;&nbsp;{{$row->getKabupaten->nama_kabupaten}}</medium>
                                                <medium class="text-muted  float-left"></medium>
                                            </p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
                <!--/.Slides-->
            </div>

            {{--            <div class="col-auto" style="margin-top: 190px">--}}
            {{--                <a class="btn-floating" href="#multi-item-example" data-slide="next"><i class="fa fa-chevron-right fa-2x"></i></a>--}}
            {{--            </div>--}}

        </div>


    </div>
    <br>
    <!--/.Carousel Wrapper-->

    <div class="row mt-5 mb-5 justify-content-center text-center">
        @foreach($kabupaten as $row)
            @if($row->nama_kabupaten=='Toba')
                <div class="col-3 mt-1 mb-1">
                    <a href="{{route('paket.filter.kabupaten',$row->id_kabupaten)}}">
                        <img src="{{asset('/images/filter-paket/toba.png')}}" class="mb-3" alt="Foto Danau Toba">
                        <h6>Toba</h6>

                    </a>
                </div>
            @elseif($row->nama_kabupaten == 'Samosir')
                <div class="col-3 mt-1 mb-1">
                    <a href="{{route('paket.filter.kabupaten',$row->id_kabupaten)}}">
                        <img src="{{asset('/images/filter-paket/samosir.png')}}" class="mb-3" alt="Foto Danau Toba">
                        <h6>Tapanuli Utara</h6>

                    </a>
                </div>
            @elseif($row->nama_kabupaten == 'Tapanuli Utara')
                <div class="col-3 mt-1 mb-1">
                    <a href="{{route('paket.filter.kabupaten',$row->id_kabupaten)}}">
                        <img src="{{asset('/images/filter-paket/taput.png')}}" class="mb-3" alt="Foto Danau Toba">
                        <h6>Karo</h6>

                    </a>
                </div>
            @elseif($row->nama_kabupaten == 'Karo')
                <div class="col-3 mt-1 mb-1">
                    <a href="{{route('paket.filter.kabupaten',$row->id_kabupaten)}}">
                        <img src="{{asset('/images/filter-paket/karo.png')}}" class="mb-3" alt="Foto Danau Toba">

                        <h6>Samosir</h6>

                    </a>
                </div>
            @elseif($row->nama_kabupaten == 'Simalungun')
                <div class="col-3 mt-1 mb-1">
                    <a href="{{route('paket.filter.kabupaten',$row->id_kabupaten)}}">
                        <img src="{{asset('/images/filter-paket/simalungun.png')}}" class="mb-3" alt="Foto Danau Toba">
                        <h6>Simalungun</h6>

                    </a>
                </div>
            @elseif($row->nama_kabupaten == 'Humbang Hasundutan')
                <div class="col-3 mt-1 mb-1">
                    <a href="{{route('paket.filter.kabupaten',$row->id_kabupaten)}}">
                        <img src="{{asset('/images/filter-paket/humbahas.png')}}" class="mb-3" alt="Foto Danau Toba">
                        <h6>Humbang Hasundutan</h6>

                    </a>
                </div>
            @elseif($row->nama_kabupaten == 'Dairi')
                <div class="col-3 mt-1 mb-1">
                    <a href="{{route('paket.filter.kabupaten',$row->id_kabupaten)}}">
                        <img src="{{asset('/images/filter-paket/dairi.png')}}" class="mb-3" alt="Foto Danau Toba">
                        <h6>Dairi</h6>

                    </a>
                </div>
            @endif
        @endforeach
    </div>

@endsection
