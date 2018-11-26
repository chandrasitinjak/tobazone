@extends('admin.layouts.app')
@section('title') {{ "Banner" }}
@endsection

@section('content')
    <style>
        .note-editable{
            min-height: 200px;
        }
    </style>
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Create Banner</strong>
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
            <form method="POST" action="{{ url('/banner/store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}                
                <div class="row form-group">
                    <div class="col col-md-3">
                    <label for="name">Title</label>
                    </div>
                        <div class="col-12 col-md-9"><input type="text" class="form-control" name="title"/>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                    <label for="price">Description</label>
                    </div>
                        <div class="col-12 col-md-9"><textarea id="summernote" style="min-height: 200px" name="description"></textarea>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                    <label for="name">Link</label>
                    </div>
                        <div class="col-12 col-md-9"><input type="text" class="form-control" name="link"/>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="file-input" class=" form-control-label">Upload Foto</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="file" name="image" class="form-control">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </div>
                
                
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
