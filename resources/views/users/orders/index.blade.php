@extends('users.layouts.app') 
@section('title') {{ "Order" }}
@endsection
 
@section('content')

  <div class="row">
    <div class="col-md-3 col-lg-3">
      <div class="merchant-sidebar">
        <div class="card globalcard">
          <div class="card-body p-1">
            <div class="mercant-sidebar-menu">
              <div class="col-md-12 text-center">
                @if($user->profile->photo != null)
                <div class="imgwrapper mb-3" style="padding: 0px;">
                  <img src="{{ url("/images/user_profiles/".$user->profile->photo )}}" alt="Card image cap" style="object-fit: scale-down">
                </div>
                @else               
                <div class="imgwrapper imgwrapper-a mb-1 img-circle" style="padding: 0px; margin : auto">
                  <img src="/images/profile.png" style="object-fit: scale-down">
                </div>
                @endif
                <h6>{{ $user->profile->name }}</h6>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="order-list-customer" class="col-md-9 crudproduk">
      <order-list-customer-page :user-id="{{ Auth::user()->id }}" />
    </div>
  </div>

@endsection