@extends('admin.layouts.app') 
@section('title') {{ "Carousel" }}
@endsection
 
@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-12">
                <a href="{{ url('/carousels/create')}}" class="btn btn-info text-white pull-right"> 
                    <span class="fa fa-plus"> </span> Add Carousel 
                </a>
            </div>
        </div>
        <div class="row">
            @foreach ($carousels as $carousel)
            <div class="col-md-4">
                <div class="card">
                    <img class="card-img-top" src="{{ url('/images/carousels/' . $carousel->image)}}" alt="Carousel image">
                    <div class="card-body">
                        <p class="card-text"> {{ $carousel->description }}</p>
                        <a href="#"> 
                            <span class="btn btn-link btn-sm"><i class="fa fa-link"></i>&nbsp; Link</span>
                        </a>

                        <label class="switch switch-3d switch-primary mr-3">
                            <input type="checkbox" class="switch-input" checked="" /> 
                            <span class="switch-label"></span> <span class="switch-handle"></span>
                        </label>

                        <a href="{{ url('/carousels/show', $carousel->id)}}"><span class="badge badge-primary pull-right">Detail</span></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection