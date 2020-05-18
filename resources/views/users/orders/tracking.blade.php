@extends('users.layouts.app') 
@section('title') {{ "Tracking Pengiriman" }}
@endsection
 
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-3 col-lg-3">
      <div class="merchant-sidebar">
        <div class="card globalcard">
          <div class="card-body p-1">
            <div class="mercant-sidebar-menu">
              <div class="col-md-12 text-center">
              @if($user->profiles->photo != null)
                  <div class="imgwrapper mb-3" style="padding: 0px;">
                    <img src="{{ url("/images/user_profiles/".$user->profiles->photo )}}" alt="Card image cap test" style="object-fit: scale-down">
                  </div>
                @else
                <div class="imgwrapper mb-1" style="padding: 0px; margin : auto">
                  <img src="#" alt="Belum ada foto" style="object-fit: scale-down">
                </div>
                @endif
                <!-- <div class="imgwrapper mb-3" style="padding: 0px;">
                  <img src="{{ url("/images/profiles", $user->profile->photo )}}" alt="Card image cap" style="object-fit: scale-down">
                </div> -->
                <h6>{{ $user->profile->name }}</h6>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="tracking-page" class="col-md-9 crudproduk">
      <tracking-page :transaction-id="{{ Request::segment(4) }}" :customer-id="{{ Request::segment(2) }}" />
    </div>
  </div>
</div>
@endsection