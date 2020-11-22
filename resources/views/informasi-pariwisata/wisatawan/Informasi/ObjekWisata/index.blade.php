@extends('informasi-pariwisata.layouts.wisatawan.master')

@section('title')
    <title>Objek Wisata</title>
    <link rel="stylesheet" href="{{asset('css_wisatawan/informasi.css')}}">
    <link rel="stylesheet" href="{{asset('css_wisatawan/button_css.css')}}">
@endsection

@section('content')
  <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('https://images.unsplash.com/photo-1575806643255-54c5a050dce6?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max&ixid=eyJhcHBfaWQiOjF9');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate pb-5 text-center">
            <h1 class="mb-3 bread">Objek Wisata</h1>
          </div>
        </div>
      </div>
    </section>


    <br>

    <section class="ftco-section ftco-no-pt">
        <div class="container">
            <div class="row justify-content-center pb-4">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <h2 class="mb-4">Objek Wisata</h2>
          </div>
          <hr>
        </div>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">


        <section class="hero-section">
          @foreach($categoryWisatas as $categoryWisata)
            <a href="{{url('displayBasedCategory',['id' => $categoryWisata->id])}}"><button class="btn-hover color-1">{{$categoryWisata->nama_category}}</button></a>
          @endforeach
        </section>
        <section class="hero-section">
          <div class="card-grid">
            @foreach($objekWisatas as $objekWisata)
                <a class="card" href="{{url('Kab/Information/ObjekWisata',['id' => $objekWisata->id])}}">
                  <div class="card__background" style="background-image: url(Kab/information/ObjekWisata/{{$objekWisata->foto}})"></div>
                  <div class="card__content">
                    <p class="card__category">Objek Wisata</p>
                    <h3 class="card__heading">{{$objekWisata->nama_objek_wisata}}</h3>
                  </div>
                </a>
            @endforeach
          <div>
        </section>
        </div>
    </section>
   

@endsection