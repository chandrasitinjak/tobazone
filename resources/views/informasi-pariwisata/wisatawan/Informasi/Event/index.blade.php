@extends('informasi-pariwisata.layouts.wisatawan.master')

@section('title')
    <title>Event</title>
    <link rel="stylesheet" href="{{asset('css_wisatawan/informasi.css')}}">
@endsection

@section('content')
  <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('https://www.wego.co.id/berita/wp-content/uploads/2013/09/Parade-Solu-Bolon-antara.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate pb-5 text-center">
            <h1 class="mb-3 bread">Event</h1>
          </div>
        </div>
      </div>
    </section>


    <br>

    <section class="ftco-section ftco-no-pt">
        <div class="container">
            <div class="row justify-content-center pb-4">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <h2 class="mb-4">Event</h2>
          </div>
        </div>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">

        <section class="hero-section">
          <div class="card-grid">
            @foreach($events as $event)
                <a class="card" href="{{url('Kab/Information/Event',['id' => $event->id])}}">
                  <div class="card__background" style="background-image: url(Kab/information/Event/{{$event->foto}})"></div>
                  <div class="card__content">
                    <p class="card__category">Event</p>
                    <h3 class="card__heading">{{$event->nama_event}}</h3>
                  </div>
                </a>
            @endforeach
          <div>
        </section>
        </div>
    </section>
   

@endsection