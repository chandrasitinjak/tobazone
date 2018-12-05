@extends('users.layouts.app') 
@section('content')
<div id="search-product">
  <search-product :keyword="'{{ Request::get('search') }}'" />
</div>
@endsection