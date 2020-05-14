@extends('users.layouts.app')
@section('content')
<div class="row">
    <div class="col-md-3 col-lg-3">
      <div class="merchant-sidebar">
        <div class="card globalcard">
          <div class="card-body p-1">
            <div class="mercant-sidebar-menu">
              <div class="col-md-12 text-center">
                @if($profiles->photo != null)
                  <div class="imgwrapper mb-3" style="padding: 0px;">
                    <img src="{{ url("/images/user_profiles/".$profiles->photo )}}" alt="Card image cap test" style="object-fit: scale-down">
                  </div>
                @else
                <div class="imgwrapper mb-1" style="padding: 0px; margin : auto">
                  <img src="#" alt="Belum ada foto" style="object-fit: scale-down">
                </div>
                @endif
                <h6> {{ $profiles->name }} </h6>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-9 col-lg-9">
        <div class="row">
            <p>Nama Alamat</p> <br>
            {{ $data->name}}
        </div>
        <div class="row">
            <p>Provinsi</p> :  {{ $data->province_name}} <br>
            <p>Kabupaten/kota </p> :  {{ $data->city_name}} <br>            
            <p>Kecamatan </p> :  {{ $data->subdistrict_name}} <br>
            <p>Kode Pos </p> :  {{ $data->postal_code}} <br>
            <p>Alamat detail </p> :  {{ $data->detail}} <br>            
        </div>
        <div class="row">
            <p>nomor hp</p> <br>
            {{ $profiles->phone }}
        </div>

        <div class="row">
            <p>Jenis Kelamin</p> <br>
            {{ $profiles->gender }}
        </div>      

        <div class="row">
            <a href="{{ url('/customer/'.$profiles->user_id.'/editProfil') }}" class="btn btn-success">ubah profil</a>
        </div>         
    </div>
  </div>
@endsection