@extends('users.layouts.app')
@section('title') {{ "Transportasi" }}
@endsection

@section('content')

    <div>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block" style="height: 500px; width: 100%" src="https://cdn-2.tstatic.net/medan/foto/bank/images/tarik-magg.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block" style="height: 500px; width: 100%" src="https://cdn-2.tstatic.net/medan/foto/bank/images/tarik-magg.jpg" alt="Second slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <br><br><br><br>
    <div class="container">
        <div class="row ">
            @foreach($transportasis as $transportasi)
                <a href="/Kab/Information/Transportasi/{{$transportasi->id}}" class="mb-100">
                    <div class="col-md-2">
                        <div class="shadow card-informasi card products" style="width: 15rem;height: auto;border-top-right-radius: 15px;border-top-left-radius: 15px;border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;">
                            <img class="card-img-top-a" src="Kab/information/Transportasi/{{$transportasi->foto}}" style="width: 15rem;height: 13rem;border-top-right-radius: 15px ;border-top-left-radius: 15px;" alt="Card image cap">
                            <div class="card-body">
                                <h5><span class="badge badge-warning">Transportasi</span></h5>
                                <h5 class="card-title">{{$transportasi->nama_transportasi}}</h5>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

@endsection