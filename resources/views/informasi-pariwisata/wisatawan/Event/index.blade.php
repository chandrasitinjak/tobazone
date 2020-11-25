@extends('informasi-pariwisata.layouts.wisatawan.master')


<head>
    <title>Event</title>
</head>
    

@section('content')
    <div class="jumbotron" style="background-image: url(<?= $event->foto ?>);
background-size: cover;
height: 70%;">
    </div>

    <div class="container">
      <div class="row justify-content-center pb-4">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <h2 class="mb-4">{{ $event->nama_event}}</h2>
          </div>
      </div>
       <br>
      <button type="button" class="btn btn-primary">
        Dilaksanakan : <span class="badge badge-light">{{$event->tgl_awal}} - {{$event->tgl_akhir}}</span>
        <span class="sr-only">unread messages</span>
      </button>
      <br>
      <br>
      <p>
        <?= $event->deskripsi ?>
      </p>
     
    </div>

    
     <br>
   

  
    <style type="text/css">
        .kabupaten{
            margin-bottom: 20px;
        }
    </style>
@endsection