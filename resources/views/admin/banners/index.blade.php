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

        <div class="card">
        @if($banner->image)
            <img src="{{ '/images/' . $banner->image}}", alt="">
        @else
            <img src="{{ '/images/no-image.jpg'}}" alt="">
        @endif
            <div class="banner-description">
                <h2><strong class="card-title">{{$banner->title}} </strong></h2>
                <p class="banner-desc">{{$banner->description}}</p>
                <a href="#">
                <button type="button" class="btn btn-link btn-sm"><i class="fa fa-link"></i>&nbsp;{{$banner->link}}</button></a>
                <div class="float-right">
                <a href="{{ url('/banner/edit', $banner->id)}}">
                        <i class="fa fa-pencil mr-3" style="color: #4b4b4b"></i>
                </a>
                
                <form action="{{ url('/banner/delete', $banner->id)}}" method="post" style="display: inline">
                        @csrf
                    <button class="" type="submit" style="background-color: transparent; border: none">
                            <i class="fa fa-trash" style="color: #4b4b4b"></i>
                    </button>
                </form>
                </div>
            </div>

        </div>
    </div>
    @endforeach


@endsection