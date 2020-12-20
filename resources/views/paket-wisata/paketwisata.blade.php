@extends('users.layouts.app')
@section('content')


        <div class="row mb-5">
            <div class="col"></div>
            <div class="col-lg-10 col-md-12 col-sm-12">
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <center>
                                <br>
                                <h2>Paket Wisata</h2>
                            </center>
                            <br>
                            <a href=""><img src="{{ asset("/images/carousels/Paket Wisata.png" )}}"
                                            class="d-block w-100" alt="..."
                                            style=" width: 120%;"></a>
                            <br><br>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col"></div>
        </div>

        <div class="row mb-5">
            @if(Auth::check())
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="single_travel text-center">
                        <div class="icon">
                            <!-- <img src="images/tour.png" alt=""> -->
                            <a href=""><img src="{{ asset("/images/tour.png" )}}" alt="..."
                                ></a>
                        </div>
                        <h3>Paket Wisata</h3>
                        <p>Perjalanan wisata yang dirancang agar perjalanan lebih menyenangkan.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
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
                <div class="col-lg-4 col-md-6 col-sm-12">
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
                            <a href=""><img src="{{ asset("/images/tour.png" )}}" alt="..."
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

            <div class="row mb-5 ml-1">
                <div class="col-lg-6 col-md-12 col-sm-12 ">
                                <form action="{{route('paket.filter')}}" method="post">
                                    @csrf
                                        <div class="row">
                                                <select name="kabupaten" class="col-lg-4 mb-1 mr-1 p-3 col-md-6 col-sm-5" style="
                                                border: none;
                                                border-radius: 5px;
                                                color: black;
                                                background-color: #d9d9d9;">
                                                    <option data-display="Kabupaten">Kabupaten</option>
                                                    @foreach($kabupaten as $row)
                                                        <option value="{{$row->id_kabupaten}}"
                                                                data-display="{{$row->nama_kabupaten}}"
                                                            {{(isset($id_kab)&&($id_kab==$row->id_kabupaten))?'selected':null}}> {{$row->nama_kabupaten}} </option>
                                                    @endforeach
                                                </select>
                                                <select name="jenis" class="col-lg-4 mb-1 mr-1 p-3 col-md col-sm" style="
                                            border: none;
                                            border-radius: 5px;
                                            color: black;
                                            background-color: #d9d9d9;">
                                                    <option data-display="Tipe/Jenis Perjalanan"> Tipe/Jenis Perjalanan
                                                    </option>
                                                    @foreach($jenis as $row)
                                                        <option value="{{$row->jenis_paket}}"
                                                                data-display="{{$row->jenis_paket}}"
                                                            {{(isset($jeniss)&&(strcmp($jeniss,$row->jenis_paket)==0)?'selected':null)}}>
                                                            {{$row->jenis_paket}}</option>

                                                    @endforeach
                                                </select>
                                                <button type="submit" class="col-lg-2 mb-1 p-3 col-md-12 col-sm-12" style="
                                            border: none;
                                            border-radius: 5px;
                                            color: black;
                                            background-color: #d9d9d9;"><i class="fa fa-filter" aria-hidden="true"></i>
                                                    Filter
                                                </button>

                                        </div>
                                </form>
                </div>
                <div class="col">

                </div>
            </div>
            <div class="row">
                        @forelse($paket as $row)
                            <div class="col-lg-4 col-sm-12 col-md-6">
                                <div class="card products" style="border-radius: 10px;">
                                    <a href="{{route('paket.detail',$row->id_paket)}}">
                                        <div class="imgwrapper">
                                            <img class="card-img"
                                                 src="{{ asset("/storage/img/paket/".$row->gambar )}}"
                                                 alt="Card image cap" style="height: 100%; width: 100%; object-fit: cover">
                                        </div>

                                        <div class="card-body">
                                            <h7 class="card-title"
                                                style="font-weight: bold">{{$row->nama_paket}} (
                                                <i
                                                    class="fa fa-clock-o"></i> &nbsp;{{$row->durasi}} )
                                            </h7>
                                            <h5 style="color: #FF8311;">
                                                Rp.{{number_format($row->harga_paket)}}</h5>
                                            <p></p>
                                            <p class="card-text">
                                                <medium class="text-muted  float-right">
                                                    &nbsp;{{$row->getKabupaten->nama_kabupaten}}</medium>
                                                <medium class="text-muted  float-left"></medium>
                                            </p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @empty
                            <div class="col-12 center center-block align-center text-center">
                                <img src="/images/assets/search_result_empty.png"
                                     style="height: 120px; border: none; opacity: 0.5"/>
                                <p class="text font-bold">
                                    <br>
                                    Paket Wisata Belum Ada
                                </p>
                            </div>
                        @endforelse
            </div>
    </div>

@endsection

