@extends('users.layouts.app')
@section('title') {{ "Objek Wisata" }}
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
                    <img class="d-block" style="height: 500px; width: 100%" src="https://images.unsplash.com/photo-1585371979158-0e577cf0204e?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MXwxfDB8MXxhbGx8fHx8fHx8fA&ixlib=rb-1.2.1&q=80&w=1080" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block" style="height: 500px; width: 100%" src="https://images.unsplash.com/photo-1567119729447-780f712f3b1b?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MXwxfDB8MXxhbGx8fHx8fHx8fA&ixlib=rb-1.2.1&q=80&w=1080" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block" style="height: 500px; width: 100%" src="https://images.unsplash.com/photo-1545886290-dc80d8908b9e?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max&ixid=eyJhcHBfaWQiOjF9" alt="Third slide">
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
    <div class="container" style="margin-left: 80px">
        <div class="row ">
            @foreach($objekWisatas as $objekWisata)
                <a href="/Kab/Information/ObjekWisata/{{$objekWisata->id}}" class="mb-100">
                    <div class="col-md-2">
                        <div class="shadow card-informasi card products" style="width: 15rem;height: auto;border-top-right-radius: 15px;border-top-left-radius: 15px;border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;">
                            <img class="card-img-top-a" src="Kab/information/ObjekWisata/{{$objekWisata->foto}}" style="width: 15rem;height: 13rem;border-top-right-radius: 15px ;border-top-left-radius: 15px;" alt="Card image cap">
                            <div class="card-body">
                                <h5><span class="badge badge-warning">Objek Wisata</span></h5>
                                <h5 class="card-title" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{$objekWisata->nama_objek_wisata}}</h5>
                                <p class="card-text" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><i class="fa fa-map-marker"></i> {{$objekWisata->lokasi}}</p>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>




@endsection