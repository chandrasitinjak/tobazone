@extends('admin.layouts.app')
@section('title') {{ "Blog" }}
@endsection

@section('content')
    @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div><br/>
    @endif
    @foreach($blogs as $blog)

        <style>
            .card-body .card-text{

            }
        </style>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">{{$blog->title}} </strong>
                <div class="float-right">

                    <a href="{{ route('blog.edit',$blog->id)}}">
                        <i class="fa fa-pencil mr-3" style="color: #4b4b4b"></i>
                    </a>
                    <form action="{{ route('blog.destroy', $blog->id)}}" method="post" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button class="" type="submit" style="background-color: transparent; border: none">
                            <i class="fa fa-trash" style="color: #4b4b4b"></i>
                        </button>
                    </form>

                </div>
            </div>
            <div class="card-body">
                <p class="card-text" style="
                        display: block; /* or inline-block */
                        text-overflow: ellipsis;
                        word-wrap: break-word;
                        overflow: hidden;
                        max-height: 3.6em;
                        line-height: 1.8em;">{!! $blog->body !!}</p>

            </div>
        </div>
    </div>
    @endforeach


@endsection