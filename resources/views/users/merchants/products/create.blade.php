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
        <form class="form-group" method="POST" action="{{ url('/products/store') }}" enctype="multipart/form-data">
          {{ csrf_field() }}

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
            <label class="label"> Color </label>
            <input class="form-control" type="text" name="color" />
          </div>
          <div class="mt-4">
            <label class="label"> Description </label>
            <textarea class="form-control" type="text" name="description" rows="5"> </textarea>
          </div>
          <div class="mt-4">
            <label class="label"> Specification </label>
            <textarea class="form-control" type="text" name="specification" rows="5"> </textarea>
          </div>
          <div class="col-12 mt-4">
            <div>
              <label class="label"> Images </label>
              <input class="form-control-file" id="files" type="file" name="images[]" multiple/>
            </div>
            <div id="result" class="row mt-4">
            </div>
          </div>
          <div class="mt-4">
            <button class="btn btn-block btn-info"> Add </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection

<script>
  window.onload = function(){
    if(window.File && window.FileList && window.FileReader) {
      var filesInput = document.getElementById("files");
      
      filesInput.addEventListener("change", function(event){
        var files = event.target.files; 
        var output = document.getElementById("result");
                
        for(var i = 0; i< files.length; i++) {
          var file = files[i];
          
          if(!file.type.match('image')) continue;
                    
          var picReader = new FileReader();
          picReader.addEventListener("load",function(event){
            var picFile = event.target;
            var div = document.createElement("div");
            div.className = "col-3"
            div.innerHTML =  "<div class='single-product-wrapper'> <div class='product-img'> <img src='" 
            + picFile.result + "'> </div> </div> ";

            output.insertBefore(div,null);            
          });

          picReader.readAsDataURL(file);
        }                               
               
      });
    } else {
      console.log("Your browser does not support File API");
    }
  }

</script>