@extends('admin.layouts.app')
@section('title') {{ "Blog" }}
@endsection

@section('content')
    <style>
        .note-editable{
            min-height: 200px;
        }
    </style>
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Add Blog</strong>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br/>
            @endif
            <form method="POST" action="{{ url('/blog/store') }}">
                {{ csrf_field() }}
                <div class="form-group">

                    <label for="name">Blog Title</label>
                    <input type="text" class="form-control" name="title"/>
                </div>
                <div class="form-group">
                    <label for="price">Blog Content</label>
                    <textarea id="summernote" style="min-height: 200px" name="body"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Add</button>
            </form>


            <script>
                $(document).ready(function () {
                    $('#summernote').summernote({

                    });
                });
            </script>
        </div>
    </div>
@endsection
