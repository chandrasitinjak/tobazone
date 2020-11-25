@extends('informasi-pariwisata.layouts.wisatawan.master')

@section('title')
    <title>Home Kepariwisataan</title>
    <!-- Font Awesome -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">


@endsection

@section('content')
	<div class="hero-wrap js-fullheight" style="background-image: url({{URL::asset('https://images.unsplash.com/photo-1545886290-dc80d8908b9e?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max&ixid=eyJhcHBfaWQiOjF9')}});" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-9 text text-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
            <p class="caps" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Travel to the any corner of the world, without going around in circles</p>
            <h1 data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Danau Toba, Negeri Indah Kepingan Surga</h1>
          </div>
        </div>
      </div>
    </div>


	<section class="ftco-section ftco-no-pb ftco-no-pt">
    <div class="container">
	  	<div class="row">
				<div class="col-md-12">
					<div class="search-wrap-1 ftco-animate p-4">
						<form action="/Search" method="POST" class="search-property-1">
              {{ csrf_field() }}
           		<div class="row">
          			<div class="col-lg-10 align-items-end">
          				<div class="form-group">
          					<label for="#">Cari Objek Wisata, Kuliner, Event, Akomodasi, Budaya</label>
          				  <div class="form-field">
             					<div class="icon"><span class="ion-ios-search"></span></div>
        				        <select id="search" name="input" class="form-control">
                          @foreach($objekWisatas as $objekWisata)
                            <option value="{{ $objekWisata->nama_objek_wisata}}" type="1">{{ $objekWisata->nama_objek_wisata}}</option>
                          @endforeach
                          @foreach($kuliners as $kuliner)
                            <option value="{{ $kuliner->nama_kuliner}}" type="2">{{ $kuliner->nama_kuliner}}</option>
                          @endforeach
                          @foreach($events2 as $event2)
                            <option value="{{ $event2->nama_event}}" type="3">{{ $event2->nama_event}}</option>
                          @endforeach
                          @foreach($akomodasis as $akomodasi)
                            <option value="{{ $akomodasi->nama_akomodasi}}" type="1">{{ $akomodasi->nama_akomodasi}}</option>
                          @endforeach
                          @foreach($budayas as $budaya)
                            <option value="{{ $budaya->nama_budaya}}" type="1">{{ $budaya->nama_budaya}}</option>
                          @endforeach
                      </select>
        				      </div>
        			    </div>
        		    </div>
        		    <div class="col-lg-2 align-self-end">
        		    	<div class="form-group">
        		        <div class="form-field">
        				      <input type="submit" value="Search" class="form-control btn btn-primary">
        				    </div>
        			    </div>
        		    </div>
        		  </div>
		        	</form>
		        </div>
					</div>
	    	</div>
	    </div>
    </section>



		<section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center pb-4">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <h2 class="mb-4">Pilih tempat tujuan</h2>
            <hr>
          </div>
        </div>
        <div class="row">
          @foreach ($kabupatens as $kabupaten)
            <div class="col-md-3 ftco-animate" >
              <div class="project-destination"  style="margin-bottom: 20px;" id="kab">
                <a href="{{url('Kab',['id' => $kabupaten->id_kabupaten])}}" class="img" style="background-image: url(<?= $kabupaten->gambar_kabupaten?>);" >
                  <div class="text">
                    <h3><?= $kabupaten->nama_kabupaten?></h3>
                    <span>Cek </span>
                  </div>
                </a>
              </div>
            </div> 
          @endforeach 
        </div>
    	</div>
    </section>

   

    <section class="ftco-section ftco-no-pt" id="sec">
    	<div class="container">
    		<div class="row justify-content-center pb-4">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <h2 class="mb-4">Objek Wisata</h2>
            <hr>
          </div>
        </div>

          <div class="row">
            <div class="col-md-12 col-center m-auto">
              <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="0">
                <!-- Carousel indicators -->
                 
                <!-- Wrapper for carousel items -->
                <div class="carousel-inner">
                  <div class="item carousel-item active">
                    <div class="row">
                      @foreach($objekWisatas1 as $objekWisata1)
                        <div class="col-sm-4">
                          <div class="project-wrap" id="card1">
                            <a href="{{url('Kab/Information/ObjekWisata',['id' => $objekWisata1->id])}}" class="img" style="background-image: url(Kab/information/ObjekWisata/{{$objekWisata1->foto}});"></a>
                            <div class="text p-4">
                              <span class="price">Explore</span>
                              <span class="days"><span class="badge badge-warning">Objek Wisata</span></span>
{{--                              <span class="days"> {{ $objekWisata1->kabupaten->nama_kabupaten}} </span>--}}
                              <h3><a href="#">{{ $objekWisata1->nama_objek_wisata}}</a></h3>
                              <p class="location"><span class="ion-ios-map"></span> {{ $objekWisata1->lokasi}}</p>
                            </div>
                          </div>
                        </div>
                      @endforeach
                    </div>
                  </div>

                  <div class="item carousel-item">
                    <div class="row">
                      @foreach($objekWisatas2 as $objekWisata2)
                       <div class="col-sm-4">
                          <div class="project-wrap" id="card1">
                            <a href="{{url('Kab/Information/ObjekWisata',['id' => $objekWisata2->id])}}" class="img" style="background-image: url(Kab/information/ObjekWisata/{{$objekWisata2->foto}});"></a>
                            <div class="text p-4">
                              <span class="price">Explore</span>
                              <span class="days"><span class="badge badge-warning">Objek Wisata</span></span>
{{--                              <span class="days"> {{ $objekWisata2->kabupaten->nama_kabupaten}} </span>--}}
                              <h3><a href="#">{{ $objekWisata2->nama_objek_wisata}}</a></h3>
                              <p class="location"><span class="ion-ios-map"></span> {{ $objekWisata2->lokasi}}</p>
                            </div>
                          </div>
                        </div>
                      @endforeach
                    </div>
                  </div>
                  
                </div>
                <!-- Carousel controls -->
                <a class="carousel-control left carousel-control-prev" href="#myCarousel" data-slide="prev">
                  <i class="fa fa-chevron-left"></i>
                </a>
                <a class="carousel-control right carousel-control-next" href="#myCarousel" data-slide="next">
                  <i class="fa fa-chevron-right"></i>
                </a>
              </div>
            </div>
          </div>

          <div>
            <center>
              <a href="{{url('informasi1')}}"><div id="btn"><span class="noselect">Load more..</span><div id="circle"></div></div></a>
            </center>
          </div>
    	</div>
    </section>


    <section class="ftco-section ftco-no-pt">
      <div class="container">
        <div class="row justify-content-center pb-4">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <h2 class="mb-4">Akomodasi</h2>
            <hr>
          </div>
        </div>
        <div class="row">
          @foreach($akomodasis as $akomodasi)
            <div class="col-md-4 ftco-animate">
              <div class="project-wrap">
                <a href="{{url('Kab/Information/Akomodasi',['id' => $akomodasi->id])}}" class="img" style="background-image: url(Kab/information/Akomodasi/{{$akomodasi->foto}});"></a>
                <div class="text p-4">
                  <span class="price">Explore</span>
                  <span class="days"><span class="badge badge-warning">Akomodasi</span></span>
{{--                  <span class="days">{{ $akomodasi->kabupaten->nama_kabupaten}}</span>--}}
                  <h3><a href="#">{{$akomodasi->nama_akomodasi}}</a></h3>
                  <p class="location"><span class="ion-ios-map"></span> {{$akomodasi->lokasi}}/p>
                </div>
              </div>
            </div>
          @endforeach
        </div>
         <div>
            <center>
              <a href="{{url('informasi2')}}"><div id="btn"><span class="noselect">Load more..</span><div id="circle"></div></div></a>
            </center>
          </div>
      </div>
    </section>

  
      <div class="main-container">
        <div class="grid-container">
          <div class="card card--2x">
            <div class="card__content big-script padding-large">
              <p>Nikmati Keindahan Danau Toba</p>
            </div>
          </div>
          <div class="card">
            <div class="card__image">
              <img src="https://images.unsplash.com/photo-1570066709052-24943d5c0717?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max&ixid=eyJhcHBfaWQiOjF9" />
            </div>
          </div>
          <div class="card">
            <div class="card__image">
              <img src="https://images.unsplash.com/photo-1553513377-9c685bc148e0?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max&ixid=eyJhcHBfaWQiOjF9" />
            </div>
          </div>
          <div class="card">
            <div class="card__content">
              <p><em></em></p>
              <p></p>
            </div>
          </div>
          <div class="card card--horizontal">
            <div class="card__image">
              <img src="https://images.unsplash.com/photo-1560675599-f0432d4ffc2d?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max&ixid=eyJhcHBfaWQiOjF9" />
            </div>
          </div>
          <div class="card card--featured">
            <div class="card__side-by-side--m">
              <div class="card__image">
                <img src="https://images.pexels.com/photos/1125278/pexels-photo-1125278.jpeg?auto=compress&amp;cs=tinysrgb&amp;h=750&amp;w=1260" />
              </div>
              <div class="card__content padding-large--l">
              </div>
            </div>
          </div>
          <div class="card card--vertical">
            <div class="card__image">
              <img src="https://images.unsplash.com/photo-1545884085-7adec6c688c4?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max&ixid=eyJhcHBfaWQiOjF9" />
            </div>
          </div>
          <div class="card">
            <div class="card__image">
              <img src="https://images.unsplash.com/photo-1545884085-7adec6c688c4?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max&ixid=eyJhcHBfaWQiOjF9" />
            </div>
          </div>
          <div class="card card--horizontal">
            <div class="card__side-by-side">
              <div class="card__image">
                <img src="https://images.pexels.com/photos/885880/pexels-photo-885880.jpeg?auto=compress&amp;cs=tinysrgb&amp;h=750&amp;w=1260" />
              </div>
              <div class="card__content">
                <h3></h3>
                <p></p>
              </div>
            </div>
          </div>
          <div class="card card--vertical">
            <div class="card__image">
              <img src="https://images.unsplash.com/photo-1553513377-9c685bc148e0?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max&ixid=eyJhcHBfaWQiOjF9" />
            </div>
          </div>
          <div class="card">
            <div class="card__image">
              <img src="https://images.pexels.com/photos/269923/pexels-photo-269923.jpeg?auto=compress&amp;cs=tinysrgb&amp;h=750&amp;w=1260" />
            </div>
          </div>
          <div class="card">
            <div class="card__content">
              <p><em></em></p>
              <p></p>
            </div>
          </div>
          <div class="card card--2x">
            <div class="card__image">
              <img src="https://images.unsplash.com/photo-1585371979158-0e577cf0204e?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max&ixid=eyJhcHBfaWQiOjF9" />
            </div>
          </div>
          <div class="card card--horizontal card--frameless">
            <div class="card__content big-script">
              <p></p>
            </div>
          </div>
          <div class="card">
            <div class="card__image">
              <img src="https://images.unsplash.com/photo-1570099891251-cb2fcb895de3?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max&ixid=eyJhcHBfaWQiOjF9" />
            </div>
          </div>
          <div class="card card--horizontal">
            <div class="card__image">
              <img src="https://images.unsplash.com/photo-1560675599-f0432d4ffc2d?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max&ixid=eyJhcHBfaWQiOjF9" />
            </div>
          </div>
          <div class="card">
            <div class="card__image">
              <img src="https://images.pexels.com/photos/373912/pexels-photo-373912.jpeg?auto=compress&amp;cs=tinysrgb&amp;h=750&amp;w=1260" />
            </div>
          </div>
          <div class="card">
            <div class="card__content">
              <p><em></em></p>
              <p></p>
            </div>
          </div>
          <div class="card">
            <div class="card__image">
              <img src="https://images.unsplash.com/photo-1553513377-9c685bc148e0?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max&ixid=eyJhcHBfaWQiOjF9" />
            </div>
          </div>
        </div>
      </div>

 

    


    <section class="ftco-section">
      <div class="container">
      	<div class="row justify-content-center pb-4">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <h2 class="mb-4">Event</h2>
            <hr>
          </div>
        </div>
        
        <div class="row d-flex">
        @foreach($events as $event)
          <div class="col-md-4 d-flex ftco-animate" id="card1">
            <div class="blog-entry justify-content-end">
              <a href="{{url('Kab/Information/Event',['id' => $event->id])}}" class="block-20" style="background-image: url(Kab/information/Event/{{ $event->foto }});">
              </a>
              <div class="text mt-3 float-right d-block">
                <div class="d-flex align-items-center mb-4 topp">
                  <div class="one">
                    <span class="day">21</span>
                  </div>
                  <div class="two">
                    <span class="yr">2019</span>
                    <span class="mos">August</span>
                  </div>
                </div>
                <h3 class="heading"><a href="#">{{ $event->nama_event }}</a></h3>
                <p class="location"><span class="ion-ios-map"></span> {{ $event->lokasi}}</p>
              </div>
            </div>
          </div>
        @endforeach

        </div>

        <div>
            <center>
              <div id="btn"><span class="noselect">Load more..</span><div id="circle"></div></div>
            </center>
          </div>
      </div>
    </section>

    <section class="ftco-section ftco-no-pt">
      <div class="container">
        <div class="row justify-content-center pb-4">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <h2 class="mb-4">Kuliner</h2>
            <hr>
          </div>
        </div>
        <div class="row">
          @foreach($kuliners as $kuliner)
            <div class="col-md-4 ftco-animate">
              <div class="project-wrap">
                <a href="{{url('Kab/Information/Kuliner',['id' => $kuliner->id])}}" class="img" style="background-image: url(Kab/information/Kuliner/{{$kuliner->foto}});"></a>
                <div class="text p-4">
                  <span class="price">Explore</span>
                  <span class="days"><span class="badge badge-warning">Kuliner</span></span>
{{--                  <span class="days">{{ $kuliner->kabupaten->nama_kabupaten}}</span>--}}
                  <h3><a href="#">{{$kuliner->nama_kuliner}}</a></h3>
                  <p class="location"><span class="ion-ios-map"></span> {{$kuliner->lokasi}}/p>
                </div>
              </div>
            </div>
          @endforeach
        </div>
         <div>
            <center>
              <a href="{{url('informasi4')}}"><div id="btn"><span class="noselect">Load more..</span><div id="circle"></div></div></a>
            </center>
          </div>
      </div>
    </section>


    <div class="parallax"></div>
   

    <style type="text/css">
        .kabupaten{
            margin-bottom: 20px;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script type="text/javascript">
            $('#search').select2();
    </script> 
    <link rel="stylesheet" href="{{ asset('css_wisatawan/home.css') }}">


@endsection