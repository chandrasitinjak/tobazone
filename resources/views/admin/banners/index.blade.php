@extends('admin.layouts.app') 
@section('title') {{ "Banner" }}
@endsection
 
@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-12">
                <a href="{{ url('/banners/create')}}" class="btn btn-info text-white pull-right"> 
                        <span class="fa fa-plus"> </span> Add Banner 
                    </a>
            </div>
        </div>

        <div class="row">
            @foreach ($banners as $banner)
            <div class="col-md-4 mt-3">
                <div class="card">
                    <img class="card-img-top" src="{{ url('/images/banners/' . $banner->image)}}" alt="Banner image">
                    <div class="card-body">
                        <p class="card-text"> {{ $banner->description }}</p>
                        <a href="#"> 
                            <span class="btn btn-link btn-sm"><i class="fa fa-link"></i>&nbsp; Link</span>
                        </a>

                        <label class="switch switch-3d switch-primary mr-3">
                            <input type="checkbox" class="switch-input" checked="" /> 
                            <span class="switch-label"></span> <span class="switch-handle"></span>
                        </label>

                        <a href="{{ url('/banners/show', $banner->id)}}"><span class="badge badge-primary pull-right">Detail</span></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection