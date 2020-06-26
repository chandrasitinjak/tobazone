@extends('users.layouts.app')
@section('content')
<div class="row" style="padding: 2rem 0 2rem">
    <div class="col-md-3 col-lg-3">
      <div class="merchant-sidebar">
        <div class="card globalcard">
          <div class="card-body p-1">
            <div class="mercant-sidebar-menu">
              <div class="col-md-12 text-center">
                @if($profiles->photo != "profile.png")
                  <div class="imgwrapper imgwrapper-a mb-3 img-circle" style="padding: 0px;">
                    <img src="{{ url("/images/user_profiles/".$profiles->photo )}}" alt="Card image cap test" style="object-fit: scale-down">
                  </div>
                @else
                <div class="imgwrapper imgwrapper-a mb-1 img-circle" style="padding: 0px; margin : auto">
                  <img src="/images/profile.png" style="object-fit: scale-down">
                </div>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-9 col-lg-9">
        <h6 style="margin-left:-15px; margin-bottom:15px"> {{ $profiles->name }} </h6>
        <div class="row">
            <p style="width: 350px">
              <b>Nomor HP &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:</b> &nbsp&nbsp&nbsp&nbsp {{ $profiles->phone }}
            </p>
        </div>
        <div class="row">
            <p style="width: 350px">
              <b>Jenis Kelamin &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:</b> &nbsp&nbsp&nbsp&nbsp {{$profiles->gender }}
            </p>
        </div>

        <div class="row">
            <p>Alamat</p>
            <!-- {{ $data->name}} -->
        </div>


        <div class="row">
            <p style="width: 350px">
              <b>Provinsi &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:</b> &nbsp&nbsp&nbsp&nbsp {{ $data->province_name}}
            </p>
        </div>
        <div class="row">
            <p style="width: 350px">
              <b>Kabupaten/kota &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:</b> &nbsp&nbsp&nbsp&nbsp {{ $data->city_name}}
            </p>
        </div>
        <div class="row">
            <p style="width: 350px">
              <b>Kecamatan &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:</b> &nbsp&nbsp&nbsp&nbsp {{ $data->subdistrict_name}}
            </p>
        </div>
        <div class="row">
            <p style="width: 350px">
              <b>Kode Pos &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:</b> &nbsp&nbsp&nbsp&nbsp {{ $data->postal_code}}
            </p>
        </div>
        <div class="row">
            <p style="width: 350px">
              <b>Alamat Rinci &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:</b> &nbsp&nbsp&nbsp&nbsp {{ $data->detail}}
            </p>
        </div>
        <div class="row" style="padding-top:15px">
            <a href="{{ url('/customer/'.$profiles->user_id.'/editProfil') }}" class="btn essence-btn">ubah profil</a>
        </div>
    </div>
  </div>
@endsection