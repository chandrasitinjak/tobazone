@extends('informasi-pariwisata.layouts.wisatawan.master')


<head>
    <title>Budaya</title>
</head>
    

@section('content')
    <div class="jumbotron" style="background-image: url(<?= $budaya->foto ?>);
background-size: cover;
height: 70%;">
    </div>

    <div class="container">
      <div class="row justify-content-center pb-4">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <h2 class="mb-4">{{ $budaya->nama_budaya}}</h2>
          </div>
      </div>
      <p>
        <?= $budaya->deskripsi ?>
      </p>
    </div>

    
     <br>
   

  
    <style type="text/css">
        .kabupaten{
            margin-bottom: 20px;
        }
    </style>
@endsection