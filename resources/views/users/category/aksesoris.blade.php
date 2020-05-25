@extends('users.layouts.app') 
@section('content')
@if(Auth::check())
    <products-aksesoris :user-id="{{Auth::user()->id}}"/>
    @else
    <products-aksesoris />
    @endif
@endsection