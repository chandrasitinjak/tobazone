@extends('users.informasi.app')
@section('title') {{ "Budaya" }}
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
                    <img class="d-block" style="height: 500px; width: 100%" src="https://images.unsplash.com/photo-1593642634524-b40b5baae6bb?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max&ixid=eyJhcHBfaWQiOjF9" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block" style="height: 500px; width: 100%" src="https://images.unsplash.com/photo-1593642634524-b40b5baae6bb?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max&ixid=eyJhcHBfaWQiOjF9" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block" style="height: 500px; width: 100%" src="https://images.unsplash.com/photo-1593642634524-b40b5baae6bb?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max&ixid=eyJhcHBfaWQiOjF9" alt="Third slide">
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
            @foreach($budayas as $budaya)
                <a href="/Kab/Information/Budaya/{{$budaya->id}}" class="mb-100">
                    <div class="col-md-2">
                        <div class="shadow card-informasi card products" style="width: 15rem;height: 20rem;">
                            <img class="card-img-top" src="Kab/information/Budaya/{{$budaya->foto}}" style="width: 15rem;height: 20rem;" alt="Card image cap">
                            <div class="card-body">
                                <h5><span class="badge badge-warning">Budaya</span></h5>
                                <h5 class="card-title">{{$budaya->nama_budaya}}</h5>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>



    <style>
        .card-informasi {
            border-radius: 15px;
        }
        .card-img-top {
            border-top-right-radius: 15px;
            border-top-left-radius: 15px;
            border-bottom-left-radius: 15px;
            border-bottom-right-radius: 15px;
        }
    </style>
@endsection