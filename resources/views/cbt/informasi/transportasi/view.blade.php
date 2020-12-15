@extends('users.anggotacbt.app')
@section('content')
    <div class="jumbutron mt-50 ml-2 mr-2">
        <div class="jumbotron text-white jumbotron-image shadow"
             style="height:500px;background-image: url({{'/Kab/information/Transportasi/'.$transportasi->foto}});background-size:2000px 1000px ;background-repeat: no-repeat">
            <h1 class="mb-4 text-white">
                <span class="badge badge-light">{{$transportasi->nama_transportasi}}</span>
            </h1>
            <p class="mb-4">
            <h4><span class="badge badge-warning">Transportasi</span></h4>
            </p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 ml-2 mr-2">
            <h3>Deskripsi</h3>
            <?php echo $transportasi->deskripsi ?>
        </div>
    </div>
@endsection