@extends('users.informasi.app')
@section('title') {{ "Detail Budaya" }}
@endsection

@section('content')
    <div class="jumbutron mt-50">
        <div class="jumbotron text-white jumbotron-image shadow"  style="height:500px;background-image: url(<?= $budaya->foto ?>);background-size:2000px 1000px ;background-repeat: no-repeat">
            <h1 class="mb-4 text-white">
                <span class="badge badge-light">{{$budaya->nama_budaya}}</span>
            </h1>
            <p class="mb-4">
            <h4><span class="badge badge-warning">Budaya</span></h4>
            </p>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h3>Deskripsi</h3>
                <?php echo $budaya->deskripsi ?>
            </div>
            <div class="col-md-4">

            </div>
        </div>
    </div>

@endsection