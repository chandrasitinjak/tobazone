@extends('admin.layouts.app')
@section('title') {{ "edit" }}
@endsection

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Edit blog
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <form method="post" action="{{ route('blog.update', $blog->id) }}">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="name">Share Name:</label>
                    <input type="text" class="form-control" name="title" value={{ $blog->title}} />
                </div>
                <div class="form-group">
                    <label for="price">content</label>
                    <textarea id="summernote"   class="form-control summernote"  name="body" value={{ $blog->body}}></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#summernote').summernote({});
            var body = {!! json_encode( $blog->body) !!};
            $('.summernote').summernote('code', body);
        });
    </script>
@endsection

{{--{{ route('shares.store') }}--}}