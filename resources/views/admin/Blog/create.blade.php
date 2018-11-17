@extends('admin.layouts.app')
@section('title') {{ "Blog" }}
@endsection

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Add Blog
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
            <form method="post" action="{{ route('blog.store') }}">
                <div class="form-group">
                    @csrf
                    <label for="name">Title Blog:</label>
                    <input type="text" class="form-control" name="title"/>
                </div>
                {{--<div class="form-group">--}}
                    {{--<label for="price">Share Price :</label>--}}
                    {{--<input type="text" class="form-control" name="body"/>--}}
                {{--</div>--}}
                <div class="form-group">
                    <label for="price">content</label>
                    <textarea id="summernote" name="body"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Add</button>
            </form>


            <script>
                $(document).ready(function () {
                    $('#summernote').summernote({});
                });
            </script>
        </div>
    </div>
@endsection

{{--{{ route('shares.store') }}--}}