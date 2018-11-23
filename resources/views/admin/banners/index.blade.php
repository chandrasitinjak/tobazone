@extends('admin.layouts.app')
@section('title') {{ "Banner" }}
@endsection

@section('content')
    @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div><br/>
    @endif
    @foreach($banners as $banner)

        <style>
            .card-body .card-text{

            }
        </style>
    <div class="col-md-4">
    <a href="{{ url('/banner/show', $banner->id)}}">
        <div class="card">
        @if($banner->image)
            <img src="{{ '/images/' . $banner->image}}", alt="">
        @else
            <img src="{{ '/images/no-image.jpg'}}" alt="">
        @endif
            <div class="banner-description">
                <h2><strong class="card-title">{{$banner->title}} </strong></h2>
                <p class="banner-desc">{{$banner->description}}a</p>
                <a href="#">
                <button type="button" class="btn btn-link btn-sm"><i class="fa fa-link"></i>&nbsp;{{$banner->link}}</button></a>
                <a href="{{ url('/banner/show', $banner->id)}}"><span class="badge badge-primary pull-right">Detail</span></a>
                <div class="float-right">

                </div>
            </div>

        </div>
    </div>
    @endforeach


@endsection