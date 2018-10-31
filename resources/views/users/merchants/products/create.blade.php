@extends('users.layouts.app') 
@section('title') {{ "Products" }}
@endsection
 
@section('content')
<div class="breadcumb_area bg-img" style="background-image: url(/user-assets/img/bg-img/breadcumb.jpg);">
  <div class="container h-100">
    <div class="row h-100 align-items-center">
      <div class="col-12">
        <div class="page-title text-center">
          <h2>Add New Product</h2>
        </div>
      </div>
    </div>
  </div>
</div>

<section class="shop_grid_area section-padding-80">
  <div class="container">
    <div class="row">
  @include('users.merchants.sidebar')

      <div class="col-12 col-md-8 col-lg-9">
        <form class="form-group" method="POST" action="{{ url('merchant/products/store') }}">
          <div>
            <label class="label"> Name </label>
            <input class="form-control" type="text" name="name" />
          </div>
          <div class="mt-4">
            <label class="label"> Price </label>
            <input class="form-control" type="number" min="1" name="price" />
          </div>
          <div class="mt-4">
            <label class="label"> Stock </label>
            <input class="form-control" type="number" min="1" name="stock" />
          </div>
          <div class="mt-4">
            <label class="label"> Description </label>
            <textarea class="form-control" type="text" name="description" rows="5"> </textarea>
          </div>
          <div class="mt-4">
            <label class="label"> Color </label>
            <input class="form-control" type="text" name="color" />
          </div>
          <div class="mt-4">
            <label class="label"> Specification </label>
            <textarea class="form-control" type="text" name="specification" rows="5"> </textarea>
          </div>
          <div class="mt-4">
            <button class="btn btn-block btn-info"> Add </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<!-- ##### Shop Grid Area End ##### -->
@endsection