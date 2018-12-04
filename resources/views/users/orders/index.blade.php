@extends('users.layouts.app') 
@section('title') {{ "Order" }}
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
                <div class="imgwrapper mb-3" style="padding: 0px;">
                  <img src="{{ url("/images", $user->profile->photo )}}" alt="Card image cap" style="object-fit: scale-down">
                </div>
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
</div>
@endsection