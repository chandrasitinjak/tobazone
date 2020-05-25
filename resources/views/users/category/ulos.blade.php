@extends('users.layouts.app') 
@section('content')
@if(Auth::check())
    <products-ulos :user-id="{{Auth::user()->id}}"/>
    @else
    <products-ulos />
    @endif    
@endsection