@extends('users.layouts.app')
@section('title')
@endsection

@section('style')
    <style>
        @media (min-width:219px) and (max-width: 449px){
            .ybutton-category{
                margin-top: 15px;
            }
            .yjudul{
                margin-top: 10px;
                font-size: 28px;
            }
            .product-desc{
                text-align: justify;
            }
            #message{
                height: 100px;
            }
        }
        @media (min-width:450px) and (max-width: 767px){
            .ybutton-category{
                margin-top: 15px;
            }
            .yjudul{
                margin-top: 10px;
                font-size: 28px;
            }
            .product-desc{
                text-align: justify;
            }
            #message{
                height: 100px;
            }
        }
        @media (min-width:768px) and (max-width: 990px){
            #message{
                width: 300px;
                height: 100px;
            }

        }
        @media (min-width:991px) and (max-width: 1199px){
            #message{
                width: 400px;
                height: 100px;
            }
        }
        @media (min-width:1200px){
            #message{
                width: 400px;
                height: 100px;
            }
        }
    </style>
@endsection

@section('content')
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div class="card globalcard">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-5">
                                <div class="detailproduct">
                                    <div class="row">

                                        <div class="imagesliderholder col-md-10 col-lg-8 col-auto  ml-5 ">
                                            <div id="myCarousel" class="carousel slide" data-ride="carousel">

                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img class="align-self-center" src="{{ 'storage/img/paket/' . $paket->gambar }}" alt="">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                                <div class="col-md-6">
{{--                                    <button type="button" class="badge custom-badge font-weight-light ybutton-category" data-toggle="test" data-rigger="focus" data-content="Produk ini dibuat dengan metode {{ $product->category }}"--}}
{{--                                            data-html="true">--}}
{{--                                        {{$product->category}}--}}
{{--                                    </button>--}}

                                    <h2 class="yjudul">{{ $paket->nama_paket }} </h2>
                                    <h6><i class="fa fa-map-marker" aria-hidden="true"></i> <span>{{ $paket->getKabupaten->nama_kabupaten }}</span></h6>
                                    <h6><i class="fa fa-user" aria-hidden="true"></i> <span>Maximal {{ $paket->availability }} Orang</span></h6>
                                    <div class="row">
                                        <div class="col-6">
                                            <h4 class="product-price" style="color: orange">Rp {{ number_format($paket->harga_paket ,0) }}</h4>
                                        </div>
                                        <div class="col-auto">
                                            <h4><i class="fa fa-clock-o" aria-hidden="true"></i> <span>{{ $paket->durasi }}</span></h4>
                                        </div>
                                    </div>

                                    <form class="mt-5" method="post" action="/pesan/paket/{{$paket->id_paket}}">
                                        @csrf
                                        <div class="form-row align-items-center">
                                            <div class="col-sm-6 my-1">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></div>
                                                    </div>
                                                    <input type="number" min="1" name="jumlah_orang" class="form-control" id="inlineFormInputGroupUsername" placeholder="Jumlah Orang">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 my-1">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></div>
                                                    </div>
                                                    <input type="date" name="sesi" class="form-control" id="inlineFormInputGroupUsername" name="date" placeholder="Tanggal">
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="form-row align-items-center">
                                            <div class="col-sm-12 my-1">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></div>
                                                    </div>
                                                    <textarea name="pesan" id="" cols="30" rows="10" class="form-control"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row align-items-center">
                                        <div class="col-12 my-1">
                                                <button type="submit" class="btn essence-btn ml4">Booking Pemesanan</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                        </div>

                        <div class="row text-center">

                        </div>

                        <div class="row">
                            <div class="mt-5 detailreview">

                                <div class="col-md-12">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
                                                <i class="fa fa-file-text-o mr-2"></i>
                                                <span>Itinerary</span>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" id="desc-tab" data-toggle="tab" href="#desc" role="tab" aria-controls="desc" aria-selected="false">
                                                <i class="fa fa-info mr-2" aria-hidden="true"></i>
                                                <span>Description</span>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
                                                <i class="fa fa-thumbs-o-up mr-2"></i>
                                                <span>Included not Included</span>
                                            </a>
                                        </li>

                                    </ul>
                                    <div class="tab-content mt-3" id="myTabContent">

                                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                            <div class="col-9 px-1">
                                                <?php echo $paket->rencana_perjalanan ?>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade show" id="desc" role="tabpanel" aria-labelledby="desc-tab">
                                            <div class="col-9 px-1">
                                                <?php echo $paket->deskripsi_paket ?>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade ulasan" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                            <div class="row ml-3">
                                                <div class="col-md-5">
                                                    <h4>Included</h4>
                                                    <ul>
                                                        @foreach($includeds as $included)
                                                            <li><p>{{ $included->keterangan }}</p></li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                <div class="col-md-5">
                                                    <h4>Not Included</h4>
                                                    <ul>
                                                        @foreach($not_includeds as $not_included)
                                                            <li><p>{{ $not_included->keterangan }}</p></li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection
