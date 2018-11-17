@extends('users.layouts.app') 
@section('title') {{ "Products" }}
@endsection
 
@section('content')
<section class="shop_grid_area">
  <div class="container">
    <div class="row">
      @include('users.merchants.sidebar')

      <div class="col-md-9 crudproduk mt-3" style="display: grid">
        <div class="pull-right">
            <div class="card globalcard mt-0">
                <div class="card-header">
                    <h6>Ubah Product</h6>
                </div>
                <div class="card-body">
                    <form class="form-group" method="POST" action="{{ url('/products/update', $product->id) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <div class="input-group mb-3">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">
                                  Gambar Produk
                                  <span class="formbadge badge badge-secondary font-weight-light text-muted">Wajib</span>
                                </label>
                                <div class="col-sm-9">
                                    <div class="upload-btn-wrapper">
                                        <button class="btn-upcus">
                                          <img src="{{ '/images/assets/addimage.png'}}">
                                        </button>
                                        <input id="files" name="images[]" multiple type="file" />
                                    </div>
                                    <small id="passwordHelpBlock" class="form-text text-muted">
                                      Format gambar .jpg .jpeg .png dan ukuran minimum 300 x 300px
                                      (Untuk gambar optimal gunakan ukuran 700 x 700 px)
                                    </small>
                                    <div id="result" class="row mt-4"> </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Produk
                                    <span class="formbadge text-muted badge badge-secondary font-weight-light">Wajib</span>
                                </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{ $product->name }}" aria-describedby="namaprodukhelp" name="name">
                                <small id="namaprodukhelp" class="form-text text-muted">
                                    Tulis nama produk sesuai jenis, merek, dan rincian produk.
                                </small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Harga Produk
                                    <span class="formbadge text-muted badge badge-secondary font-weight-light">Wajib</span>
                                </label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" value="{{ $product->price }}" aria-describedby="namaprodukhelp" min="1" name="price" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Deskripsi Produk
                                <span class="formbadge text-muted badge badge-secondary font-weight-light">Wajib</span>
                            </label>
                            <div class="col-sm-9">
                                <textarea type="text" rows="5" class="form-control" aria-describedby="namaprodukhelp" name="description">{{ $product->description }}</textarea>
                            </div>
                        </div>
                        <div class="mt-4">
                            <label class="label"> Specification </label>
                            <div class="row">
                                <div class="col-4">
                                    <label class="label"> Ukuran </label>
                                    <input class="form-control" type="text" name="dimention" placeholder="Cth: 2m x 90cm" value="{{ json_decode($product->specification)->dimention }}" />
                                </div>
                                <div class="col-4">
                                    <label class="label"> Berat </label>
                                    <input class="form-control" type="number" min="1" max="3" name="weight" value="{{ json_decode($product->specification)->weight }}"/>
                                </div>
                                <div class="col-4">
                                    <label class="label"> Warna </label>
                                    <select class="form-control" name="color">
                                            <option value="black"> Hitam</option>
                                            <option value="red"> Merah</option>
                                            <option valie="blue"> Biru</option>
                                        </select>
                                </div>
                                <div class="col-4 mt-4">
                                    <label class="label"> Metode Pembuatan </label>
                                    <select class="form-control" name="category">
                                            <option value="-"> -</option>
                                            <option value="Alat Tenun Bukan Mesin"> Alat Tenun Bukan Mesin</option>
                                            <option value="Tradisional"> Tradisional</option>
                                            <option value="Mesin"> Mesin</option>
                                        </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 mt-4">
                                <button type="submit" class="btn btn-primary float-right">Perbaharui Barang</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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