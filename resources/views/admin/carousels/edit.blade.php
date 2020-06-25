@extends('admin.layouts.app') 
@section('title') {{ "Carousel" }}
@endsection
 
@section('content')

<div class="col-lg-12">              
<a href="{{ url('/carousels/show/3') }}">
             <button type="reset" class="btn btn-info btn-sm">
                Kembali
              </button>
              </a>
  <div class="card mt-2">
    <div class="card-header">
      <strong>Edit Carousel</strong>
    </div>
    <div class="card-body card-block">
      <form action="{{ url('/carousels/update', $carousel->id)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
        {{ csrf_field() }}

        <div class="row form-group">
          <div class="col col-md-3"><label for="textarea-input" class=" form-control-label"> Description </label></div>
          <div class="col-12 col-md-9"><textarea name="description" id="textarea-input" rows="9" class="form-control">{{ $carousel->description}}</textarea></div>
        </div>

        <div class="row form-group">
          <div class="col col-md-3"><label for="text-input" class=" form-control-label"> Link </label></div>
          <div class="col-12 col-md-9"><input type="text" id="text-input" name="link" class="form-control" value="{{ $carousel->link }}"></div>
        </div>

        <div class="row form-group">
          <div class="imgwrapper imgwrapper-a mb-3 mr-3 ml-3" style="padding: 0px;">
            <img src="/images/carousels/{{ $carousel->image }}" alt="" >
          </div>
        </div>

        <div class="row form-group">
          <div class="col col-md-3"><label for="file-input" class=" form-control-label"> Change Image </label></div>
          <div class="col-12 col-md-9">
            <input type="file" name="image">
          </div>
        </div>

        <div class="card-footer">
          <div class="pull-right">
            <button type="submit" class="btn btn-primary btn-sm">
                <i class="fa fa-dot-circle-o"></i> Submit
              </button>              
          </div>
        </div>
      </form>            
    </div>
  </div>
</div>
@endsection