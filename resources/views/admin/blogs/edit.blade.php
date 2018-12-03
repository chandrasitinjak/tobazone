@extends('admin.layouts.app') 
@section('title') {{ "edit" }}
@endsection
 
@section('content')
<style>
    .uper {
        margin-top: 40px;
    }
</style>
<div class="col-md-12">
    <div class="card uper">
        <div class="card-header">
            Edit blog
        </div>
        <div class="card-body">
            <form method="POST" action="{{ url('/blogs/update', $blog->id) }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Title</label>
                    <input type="text" class="form-control" name="title" value={{ $blog->title}} />
                </div>
                <div class="form-group">
                    <label for="summernote">Content</label>
                    <textarea id="summernote" class="form-control summernote" name="body"> {{ $blog->body}} </textarea>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
            // $('#summernote').summernote({});
            // var body = {!! json_encode( $blog->body) !!};
            // $('.summernote').summernote('code', body);
        });
</script>
@endsection