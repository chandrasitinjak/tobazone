@extends('users.layouts.app') 
@section('content')

<div id="shipping-page">
    <shipping-page :user-id="{{ Auth::user()->id }}"/>
</div>
@endsection