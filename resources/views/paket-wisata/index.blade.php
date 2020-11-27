@extends('users.layouts.app')
@section('content')



                <div class="container">

                    <div class="row">
                        <div class="col-3">
                            <div class="class-body">
                                <div class="card-body">
                                    <center><h4>Filter </h4></center>
                                    <br>
                                                <div class="form-group">
                                                    <select class="form-control form-control-lg" name="kabupaten">
                                                        <option data-display="Kabupaten">Kabupaten</option>
                                                        @foreach($kabupaten as $row)
                                                            <option
                                                                value="{{$row->id_kabupaten}}"
                                                                data-display="{{$row->nama_kabupaten}}" {{(isset($id_kab)&&($id_kab==$row->id_kabupaten))?'selected':null}}>{{$row->nama_kabupaten}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <select class="form-control form-control-lg" name="jenis">
                                                        <option data-display="Tipe/Jenis Perjalanan">Tipe/Jenis Perjalanan
                                                        </option>
                                                        @foreach($jenis as $row)
                                                            <option value="{{$row->jenis_paket}}"
                                                                    data-display="{{$row->jenis_paket}}" {{(isset($jeniss)&&(strcmp($jeniss,$row->jenis_paket)==0)?'selected':null)}}>{{$row->jenis_paket}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                    <br>
                                                <button type="submit" class="btn essence-btn btn-block">Filter</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-9">
                            <div class="card-body">
                                <center><h4>Paket Wisata</h4></center>
                                <br>
                                <div class="row">
                                    @forelse($paket as $row)
                                    <div class="col-4 px-1">
                                        <div class="card products"  style="border-radius: 10px;">
                                            <a href="">
                                                <p class="btn btn-info btn-sm" style="border-radius: 30px;padding-top:5px;position:relative;left:4px;top:5px;">Rp.{{number_format($row->harga_paket)}}</p>
                                                <div class="imgwrapper">
                                                    <img src="{{asset('storage/img/paket/'.$row->gambar)}}"
                                                         alt="Card image cap" style="width: 1200px">
                                                </div>
                                                <div class="card-body">
                                                    <h5 class="card-title">{{$row->nama_paket}}</h5>
                                                    <p>{{$row->getKabupaten->nama_kabupaten}}</p>
                                                    <p class="card-text">
                                                        <medium class="text-muted  float-right"> <i class="fa fa-clock-o"></i> &nbsp;{{$row->durasi}}</medium>
                                                        <medium class="text-muted  float-left"></medium>
                                                    </p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <br><br><br><br><br><br><br><br><br><br><br>

@endsection

