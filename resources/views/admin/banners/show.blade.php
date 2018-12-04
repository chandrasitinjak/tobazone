@extends('admin.layouts.app') 
@section('title') {{ "Banner" }}
@endsection
 
@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-body">
                        <img class="card-img-top" src="{{ url('/images/banners', $banner->image)}}" alt="banner" height="300">
                        <div class="card-title">
                            <h2 class="card-text" style="text-align: center"> {{ $banner->title}}</h2>
                        </div>
                        <p class="card-text"> {{ $banner->description }}</p>
                        <a href="#">
                            <button type="button" class="btn btn-link btn-sm"><i class="fa fa-link"></i>&nbsp; https://uloszone.com</button></a>
                        <br>

                        <div class="pull-right">
                            <div class="col-3 mr-3">
                                <a href="{{ url('/banners/edit', $banner->id)}}" class="btn btn-primary"> Edit </a>
                            </div>

                            <div class="col-3">
                                <form method="POST" action="{{ url('/banners/delete', $banner->id)}}">
                                    {{ csrf_field() }}
                                    <button class="btn btn-danger"> Delete </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection