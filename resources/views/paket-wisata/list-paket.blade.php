@extends('users.layouts.app')
@section('content')

    <div class="row mt-5 mb-5">
        <div class="col-lg-3 text-sm-center text-md-center text-lg-left">
            <h4>Ragam Paket Wisata</h4>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 ">
            <form action="{{route('paket.filter')}}" method="post">
                @csrf
                <div class="row" >
                    <select name="kabupaten" class="col-lg-4 mb-1 mr-1 p-2 col-md-6 col-sm-5" style="
                                                border: none;
                                                border-radius: 5px;
                                                color: black;
                                                background-color: #d9d9d9;">
                        <option data-display="Kabupaten">Kabupaten</option>
                        @foreach($kabupaten as $row)
                            <option value="{{$row->id_kabupaten}}"
                                    data-display="{{$row->nama_kabupaten}}"
                                {{(isset($id_kab)&&($id_kab==$row->id_kabupaten))?'selected':null}}> {{$row->nama_kabupaten}} </option>
                        @endforeach
                    </select>
                    <select name="jenis" class="col-lg-4 mb-1 mr-1 p-2 col-md col-sm" style="
                                            border: none;
                                            border-radius: 5px;
                                            color: black;
                                            background-color: #d9d9d9;">
                        <option data-display="Tipe/Jenis Perjalanan"> Tipe/Jenis Perjalanan
                        </option>
                        @foreach($jenis as $row)
                            <option value="{{$row->jenis_paket}}"
                                    data-display="{{$row->jenis_paket}}"
                                {{(isset($jeniss)&&(strcmp($jeniss,$row->jenis_paket)==0)?'selected':null)}}>
                                {{$row->jenis_paket}}</option>

                        @endforeach
                    </select>
                    <button type="submit" class="col-lg-2 mb-1 p-2 col-md-12 col-sm-12" style="
                                            border: none;
                                            border-radius: 5px;
                                            color: black;
                                            background-color: #d9d9d9;"><i class="fa fa-filter" aria-hidden="true"></i>
                        Filter
                    </button>

                </div>
            </form>
        </div>
        <div class="col">

        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="row mb-5">
                @forelse($paket as $row)
                    <div class="col-lg-3 col-sm-12 col-md-6">
                        <div class="card products" style="border-radius: 10px;">
                            <a href="{{route('paket.detail',$row->id_paket)}}">
                                <div class="imgwrapper">
                                    <img class="card-img-top"
                                         src="{{asset('/storage/img/paket/'.$row->gambar)}}"
                                         alt="Card image cap" style="height: 100%; width: 100%; object-fit: cover">
                                </div>

                                <div class="card-body">
                                    <h7 class="card-title"
                                        style="font-weight: bold">{{$row->nama_paket}} (
                                        <i
                                            class="fa fa-clock-o"></i> &nbsp;{{$row->durasi}} )
                                    </h7>
                                    <h5 style="color: #FF8311;">
                                        Rp.{{number_format($row->harga_paket)}}</h5>
                                    <p></p>
                                    <p class="card-text">
                                        <medium class="text-muted  float-right">
                                            &nbsp;{{$row->getKabupaten->nama_kabupaten}}</medium>
                                        <medium class="text-muted  float-left"></medium>
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-12 center center-block align-center text-center">
                        <img src="/images/assets/search_result_empty.png"
                             style="height: 120px; border: none; opacity: 0.5"/>
                        <p class="text font-bold">
                            <br>
                            Paket Wisata Belum Ada
                        </p>
                    </div>
                @endforelse
            </div>
            <div class="row float-right mb-5">
                <div class="col ">
                    {!! $paket->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
