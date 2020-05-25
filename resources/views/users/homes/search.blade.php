@extends('users.layouts.app') 
@section('content')
<div id="search-product">
@if(Auth::check())
<search-product :keyword="'{{ Request::get('search') }}'" :user-id="{{Auth::user()->id}}" />
@else
<search-product :keyword="'{{ Request::get('search') }}'" />
@endif
</div>
@endsection