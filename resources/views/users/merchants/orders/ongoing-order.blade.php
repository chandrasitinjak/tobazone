@extends('users.layouts.app') 
@section('title') {{ "Order" }}
@endsection
 
@section('content')

<div class="container">
  <div class="row">
    <div class="col-12">
      <div class="card globalcard store">
        <div class="card-body">
          <div class="row">
            <div class="col-lg-3 col-sm-3 d-none d-sm-block store-image">
              <div class="imgwrapper">
                <img src="{{ url('/images/assets/no-image.jpg') }}" alt="">
              </div>
            </div>
            <div class="col-md-9 col-sm-12 store-name">
              <div class="row">
                <div class="col-10 col-sm-8 col-md-10">
                  <h5 class="mb-0"> {{ $merchant->profile->name }}</h5>
                </div>
                
                <div class="col-2 ">
                  <a href="{{ url('/merchant/'.$merchant->id.'/editProfile') }}">
                  <button type="submit" class="btn btn-primary btn-sm float-right">
                      <i class="fa fa-gear"></i> Edit
                    </button>
                    </a>
                </div>

              </div>

              <p> Horas Mamangke Mangomo Partiga-tiga </p>

              <div class="store-desc">
                <i class="fa fa-map mr-1"></i> {{$merchant->profile->address->subdistrict_name}} {{", " . $merchant->profile->address->city_name}}
                {{", " . $merchant->profile->address->province_name}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="row">

  @include('users.merchants.sidebar')
    <div id="on-process-order-list" class="col-12 col-md-9 col-lg-9">
      <on-process-order-list-merchant-page :user-id="{{ Auth::user()->id }}" />
    </div>

  </div>
</div>
@endsection