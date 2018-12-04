@extends('admin.layouts.app') 
@section('title') {{ "Blog" }}
@endsection
 
@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-12">
                <a href="{{ url('/blogs/create')}}" class="btn btn-info text-white pull-right">
                        <span class="fa fa-plus"> </span> Add Blog
                    </a>
            </div>
        </div>

        <div class="row">
            @foreach($blogs as $blog)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">{{$blog->title}} </strong>
                            <div class="float-right">

                                <a href="{{ url('/blogs/edit',$blog->id)}}">
                                        <i class="fa fa-pencil mr-3" style="color: #4b4b4b"></i>
                                    </a>
                                <form action="{{ url('/blogs/delete', $blog->id)}}" method="post" style="display: inline">
                                    @csrf

                                    <button class="" type="submit" style="background-color: transparent; border: none">
                                            <i class="fa fa-trash" style="color: #4b4b4b"></i>
                                        </button>
                                </form>
                            </div>
                        </div>

                        <div class="card-body">
                            <p class="card-text" id="clampjs2">{!! $blog->body !!}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection