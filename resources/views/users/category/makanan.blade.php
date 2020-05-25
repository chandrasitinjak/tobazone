@extends('users.layouts.app') 
@section('content')
@if(Auth::check())
    <products-makanan :user-id="{{Auth::user()->id}}"/>
    @else
    <products-makanan />
    @endif    
@endsection