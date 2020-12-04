@extends('users.layouts.app')
@section('content')



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
                            <a href=""><img src="{{ asset("/images/carousels/Paket Wisata.png" )}}" class="d-block w-100" alt="..."
                                            style="height: 400px; width: 250px;"></a>
                            <br><br>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-1"></div>
        </div>
    </div>

    <div class="travel_variation_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single_travel text-center">
                        <div class="icon">
                            <!-- <img src="images/tour.png" alt=""> -->
                            <a href=""><img src="{{ asset("/images/tour.png" )}}"  alt="..."
                                            ></a>
                        </div>
                            <h3>Paket Wisata</h3>
                            <p>Perjalanan wisata yang dirancang agar perjalanan lebih menyenangkan.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_travel text-center">
                        <div class="icon">
                            <!-- <img src="images/tour.png" alt=""> -->
                            <a href=""><img src="{{ asset("/images/riwayatpemesanan.png" )}}" alt="..."
                                            ></a>
                        </div>
                            <h3>Riwayat Pemesanan</h3>
                            <p>Komunitas yang dibangun untuk meningkatkan produktivitas penyaji wisata.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_travel text-center">
                        <div class="icon">
                            <!-- <img src="images/komunitas.png" alt=""> -->
                            <a href=""><img src="{{ asset("/images/komunitas.png" )}}" alt="..."
                                            ></a>
                        </div>
                            <h3>Comunity Based Tourism</h3>
                            <p>Komunitas yang dibangun untuk meningkatkan produktivitas penyaji wisata.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>
    <br>

    <div class="container">

        <div class="row">
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
        </div>

        <div class="card-body">
            <div class="col-12">



                <div class="row">
                    @forelse($paket as $row)
                        <div class="col-3">
                            <div class="card products"  style="border-radius: 10px;">
                                <a href="{{route('paket.detail',$row->id_paket)}}">

                                    <img class="card-img-top"
                                         src="{{asset('storage/img/paket/'.$row->gambar)}}" alt="Card image cap" style="height: 185px">

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

            </div>
        </div>
    </div>

@endsection

