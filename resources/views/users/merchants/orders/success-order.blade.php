@extends('users.layouts.app')
@section('title') {{ "Success Orders" }}
@endsection

@section('content')

<div class="container">
    @include('users.merchants.profile')

  <div class="row">

  @include('users.merchants.sidebar')
    <div id="on-process-order-list" class="col-12 col-md-9 col-lg-9">
      <succes-orders-list :user-id="{{ Auth::user()->id}} "/>
    </div>

  </div>
</div>
@endsection
