@extends('users.layouts.app') 
@section('content')
@if(Auth::check())
    <products-obat :user-id="{{Auth::user()->id}}"/>
    @else
    <products-obat />
    @endif    
@endsection