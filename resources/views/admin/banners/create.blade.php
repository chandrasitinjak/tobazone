@extends('admin.layouts.app') 
@section('title') {{ "Banner" }}
@endsection
 
@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Create Banner</strong>
                    </div>
                    <form method="POST" action="{{ url('/banners/store') }}" enctype="multipart/form-data">
                        <div class="card-body">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif {{ csrf_field() }}
                            <div class="row form-group">
                                <div class=" col-md-3">
                                    <label for="name">Title</label>
                                </div>
                                <div class="col-12 col-md-9"><input type="text" class="form-control" name="title" />
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="price">Description</label>
                                </div>
                                <div class="col-12 col-md-9"><textarea class="form-control" rows="8" name="description"></textarea>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="name">Link</label>
                                </div>
                                <div class="col-12 col-md-9"><input type="text" class="form-control" name="link" />
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="file-input" class=" form-control-label">Image</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="file" name="image" class="form-control">
                                </div>
                            </div>
                        </div>
                        
                        <div class="card-footer">
                            <div class="pull-right">
                                <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-dot-circle-o"></i> Submit
                            </button>
                                <button type="reset" class="btn btn-danger btn-sm">
                                <i class="fa fa-ban"></i> Reset
                            </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection