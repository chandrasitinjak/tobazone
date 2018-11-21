@extends('users.layouts.app') 
@section('title') {{ "Konfirmasi Pembayaran" }}
@endsection
 
@section('content')
<div id="payment-confirmation">
<payment-confirmation :user-id="{{ Auth::user()->id }}" :transaction-id="{{ Request::segment('3') }}" />
</div>
@endsection