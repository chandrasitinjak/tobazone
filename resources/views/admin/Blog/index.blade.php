@extends('admin.layouts.app')
@section('title') {{ "Blog" }}
@endsection

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="uper">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br/>
        @endif
        <table class="table table-striped">
            <thead>
            <tr>
                {{--<td>ID</td>--}}
                <td>Stock Name</td>
                <td>Stock Price</td>
                {{--<td>Stock Quantity</td>--}}
                {{--<td colspan="2">Action</td>--}}
            </tr>
            </thead>
            <tbody>
            @foreach($blogs as $blog)
                <tr>
                    {{--<td>{{$blog->id}}</td>--}}
                    <td>{{$blog->title}}</td>
                    <td>
                        {!! $blog->body !!}
                        {{--{{$blog->body}}--}}

                    </td>
                    <td><a href="{{ route('blog.edit',$blog->id)}}" class="btn btn-primary">Edit</a></td>
                    <td>
                        <form action="{{ route('blog.destroy', $blog->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
            </div>

@endsection