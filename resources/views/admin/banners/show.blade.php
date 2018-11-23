@extends('admin.layouts.app')
@section('title') {{ "Banner" }}
@endsection

@section('content')
    @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div><br/>
    @endif
    


@endsection