@extends('users.layouts.app')
@section('content')
    <list-login/>
    @include('users.auth.login_modal')
    <input type="hidden" id="hidden-value" value="cbt">

@endsection