@extends('users.layouts.app')
@section('title') {{ "Order" }}
@endsection

@section('content')

<div class="container">
@include('users.merchants.profile')

  <!--menu-store-->
  <div class="row">
    <!--sidebar-->
  @include('users.merchants.sidebar')
    <!--//sidebar-->

    <!--content-->

    <!-- <div id="order-list-merchant" class="col-12 col-md-9 col-lg-9">
      <order-list-merchant-page :user-id="{{ Auth::user()->id }}" />
    </div> -->

  </div>
</div>
@endsection
