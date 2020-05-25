@extends('users.layouts.app') 
@section('content')
    @if(Auth::check())
    <products-pakaian :user-id="{{Auth::user()->id}}"/>
    @else
    <products-pakaian />
    @endif
    
@endsection