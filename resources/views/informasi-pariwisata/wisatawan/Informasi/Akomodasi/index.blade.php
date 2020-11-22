@extends('informasi-pariwisata.layouts.wisatawan.master')

@section('title')
    <title>Akomodasi</title>
    <link rel="stylesheet" href="{{asset('css_wisatawan/informasi.css')}}">
@endsection

@section('content')
  <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('https://images.unsplash.com/photo-1495365200479-c4ed1d35e1aa?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max&ixid=eyJhcHBfaWQiOjF9');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate pb-5 text-center">
            <h1 class="mb-3 bread">Akomodasi</h1>
          </div>
        </div>
      </div>
    </section>


    <br>

    <section class="ftco-section ftco-no-pt">
        <div class="container">
            <div class="row justify-content-center pb-4">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <h2 class="mb-4">Akomodasi</h2>
          </div>
        </div>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">

        <section class="hero-section">
          <div class="card-grid">
            @foreach($akomodasis as $akomodasi)
                <a class="card" href="{{url('Kab/Information/Akomodasi',['id' => $akomodasi->id])}}">
                  <div class="card__background" style="background-image: url(Kab/information/Akomodasi/{{$akomodasi->foto}})"></div>
                  <div class="card__content">
                    <p class="card__category">Akomodasi</p>
                    <h3 class="card__heading">{{$akomodasi->nama_akomodasi}}</h3>
                  </div>
                </a>
            @endforeach
          <div>
        </section>
        </div>
    </section>
   

@endsection