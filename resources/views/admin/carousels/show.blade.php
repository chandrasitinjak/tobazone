@extends('admin.layouts.app') 
@section('title') {{ "Carousel" }}
@endsection
 
@section('content')
<div class="content mt-3">
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <img class="card-img-top" src="{{ url('/images/carousels', $carousel->image)}}" alt="banner" height="300">

            <p class="card-text"> {{ $carousel->description }}</p>
            <a href="https://tobazone.com/{{ $carousel->link }}">
            <button type="button" class="btn btn-link btn-sm"><i class="fa fa-link"></i>&nbsp; https://tobazone.com/{{ $carousel->link }}</button></a>
            <br>

            <div class="pull-right">
              <div class="col-3 mr-3">
                <a href="{{ url('/carousels/edit', $carousel->id)}}" class="btn btn-primary"> Edit </a>
              </div>

              <div class="col-3">
                <form method="POST" action="{{ url('/carousels/delete', $carousel->id)}}">
                  {{ csrf_field() }}
                  <button class="btn btn-danger"> Delete </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection