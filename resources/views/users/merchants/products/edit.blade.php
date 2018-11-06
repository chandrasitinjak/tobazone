@extends('users.layouts.app') 
@section('title') {{ "Products" }}
@endsection
 
@section('content')
<div class="breadcumb_area bg-img" style="background-image: url(/user-assets/img/bg-img/breadcumb.jpg);">
  <div class="container h-100">
    <div class="row h-100 align-items-center">
      <div class="col-12">
        <div class="page-title text-center">
          <h2>Edit Product</h2>
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
        <form class="form-group" method="POST" action="{{ url('/products/update', $product->id) }}" enctype="multipart/form-data">
          {{ csrf_field() }}

          <div>
            <label class="label"> Name </label>
            <input class="form-control" type="text" name="name" value="{{ $product->name }}" />
          </div>
          <div class="mt-4">
            <label class="label"> Price </label>
            <input class="form-control" type="number" min="1" name="price" value="{{ $product->price }}" />
          </div>
          <div class="mt-4">
            <label class="label"> Stock </label>
            <input class="form-control" type="number" min="1" name="stock" value="{{ $product->stock }}" />
          </div>
          <div class="mt-4">
            <label class="label"> Description </label>
            <textarea class="form-control" type="text" name="description" rows="5">{{ $product->description }}</textarea>
          </div>
          <div class="mt-4">
            <label class="label"> Specification </label>
            <div class="row">
              <div class="col-4">
                <label class="label"> Ukuran </label>
                <input class="form-control" type="text" name="dimention" placeholder="Cth: 2m x 90cm" value="{{ json_decode($product->specification)->dimention}}" />
              </div>
              <div class="col-4">
                <label class="label"> Berat </label>
                <input class="form-control" type="number" min="1" max="3" name="weight" value="{{ json_decode($product->specification)->weight}}" />
              </div>
              <div class="col-4">
                <label class="label"> Warna </label>
                <select class="form-control" name="color" value="{{ $product->color }}">
                    <option value="black"> Hitam </option>
                    <option value="red"> Merah </option>
                    <option valie="blue"> Biru </option>
                  </select>
              </div>
            </div>
          </div>
          <div class="col-12 mt-4">
            <div>
              <label class="label"> Images </label>
              <input class="form-control-file" id="files" type="file" name="images[]" multiple/>
            </div>
            <div id="result" class="row mt-4">
            </div>

            <input type="hidden" id="deleted-images" name="deletedImages" />
          </div>
          <div class="mt-4">
            <button class="btn btn-block btn-info"> Update </button>
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
            var elementId = 'product-image-' + i
            var div = document.createElement("div");
            div.className = "col-3"
            div.setAttribute('id', elementId)
            div.innerHTML =  "<div class='single-product-wrapper'> <div class='product-img'> <img src='"
            + picFile.result + "'> </div> <div class='product-description'> <div class='hover-content'> <div class='add-to-cart-btn'> <button onclick='deleteImage(" +i+ ")' type='button' class='btn essence-btn'>Delete</button> </div> </div> </div> </div>";

            output.insertBefore(div,null);            
          });

          picReader.readAsDataURL(file);
        }                               
               
      });
    } else {
      console.log("Your browser does not support File API");
    }

    let productImages = ('{{ json_encode($product->images) }}').replace(/&quot;/g, '"')
    productImages = productImages.substr(1, productImages.length-2);
    
    var output = document.getElementById("result");

    JSON.parse(productImages).forEach((image, idx) => {
      var elementId = 'product-image-' + idx
      var div = document.createElement("div");
      div.className = "col-3"
      div.setAttribute('id', elementId)
    
      const data = {
        id: idx,
        name: image
      }  

      div.innerHTML =  "<div class='single-product-wrapper'> <div class='product-img'> <img src='/images/"
      + image + "'> </div> <div class='product-description'> <div class='hover-content'> <div class='add-to-cart-btn'> <button onclick='deleteImage(" + JSON.stringify(data)+ ")' type='button' class='btn essence-btn'>Delete</button> </div> </div> </div> </div>";

      output.insertBefore(div,null);     
    });
  }

  function deleteImage(image) {
    document.getElementById("product-image-" + image.id).remove()
    addDeletedImage(image.name)
  }

  let deletedImages = []

  function addDeletedImage(name) {
    deletedImages.push(name)
    document.getElementById('deleted-images').value = deletedImages
  }

</script>