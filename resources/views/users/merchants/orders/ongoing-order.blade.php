@extends('users.layouts.app')
@section('title') {{ "Order" }}
@endsection

@section('content')

<div class="container">
    @include('users.merchants.profile')

  <div class="row">

  @include('users.merchants.sidebar')
    <div id="on-process-order-list" class="col-12 col-md-9 col-lg-9">
      <on-process-order-list-merchant-page :user-id="{{ Auth::user()->id }}" />
    </div>
  </div>
</div>
@endsection
