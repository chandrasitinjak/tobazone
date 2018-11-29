@extends('admin.layouts.app') 
@section('title') {{ "Carousel" }}
@endsection
 
@section('content')
<div class="col-lg-12">
  <div class="card">
    <div class="card-header">
      <strong>Add Carousel</strong>
    </div>
    <div class="card-body card-block">
      <form action="{{ url('/carousels/store')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
        {{ csrf_field() }}

        <div class="row form-group">
          <div class="col col-md-3"><label for="textarea-input" class=" form-control-label"> Description </label></div>
          <div class="col-12 col-md-9"><textarea name="description" id="textarea-input" rows="9" class="form-control"></textarea></div>
        </div>

        <div class="row form-group">
            <div class="col col-md-3"><label for="text-input" class=" form-control-label"> Link </label></div>
            <div class="col-12 col-md-9"><input type="text" id="text-input" name="link" class="form-control"></div>
          </div>

        <div class="row form-group">
          <div class="col col-md-3"><label for="file-input" class=" form-control-label"> Image </label></div>
          <div class="col-12 col-md-9"><input type="file" id="file-input" name="image" class="form-control-file"></div>
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
@endsection