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
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Stok
                                    <span class="formbadge text-muted badge badge-secondary font-weight-light">Wajib</span>
                                </label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" value="{{ $product->stock }}" aria-describedby="namaprodukhelp" min="1" name="stock" required>
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
                            @if($product['cat_product'] == "ulos")
                            <div class="row">                                
                                <div class="col-4">
                                    <label class="label"> Ukuran </label>
                                    <input class="form-control" type="text" name="dimention" placeholder="Cth: 2m x 90cm" value="{{ json_decode($product->specification)->dimention }}" />
                                </div>                                                                
                                
                                <div class="col-4">
                                    <label class="label"> Berat </label>
                                    <input class="form-control" type="number" min="1" name="weight" value="{{ json_decode($product->specification)->weight }}"/>
                                    <small id="warnadasar" class="form-text text-muted">
                                        Berat dalam satuan gram
                                    </small>
                                </div>
                                <div class="col-4">
                                    <label class="label"> Warna Dasar</label>
                                    <select class="form-control" name="color">
                                    <option value="{{ $product->color }}"> {{ $product->color }} </option>
                                    <option value="Hitam"> Hitam</option>
                                                <option value="Merah"> Merah</option>
                                                <option value="Biru"> Biru</option>
                                                <option value="Putih"> Putih</option>
                                                <option value="Ungu"> Ungu</option>
                                                <option value="Hijau"> Hijau</option>
                                                <option value="Cokelat"> Cokelat</option>
                                        </select>
                                </div>
                                <div class="col-4 mt-4">
                                     <label class="label"> Metode Pembuatan </label>
                                        <select class="form-control" name="category">
                                                <option value="{{ $product->category }}">{{ $product->category }}</option>
                                                <option value="ATBM"> Alat Tenun Bukan Mesin</option>
                                                <option value="Tradisional"> Tradisional</option>
                                                <option value="Mesin"> Mesin</option>
                                            </select>
                                </div>
                            </div>                            
                            @elseif($product['cat_product'] == "pakaian")
                            <div class="row">                                                               
                                <div class="col-4">
                                    <label class="label"> Ukuran </label>
                                    <input class="form-control" type="text" name="dimention" placeholder="Cth: 2m x 90cm" value="{{ json_decode($product->specification)->size }}" />
                                </div>
                                
                                <div class="col-4">
                                    <label class="label"> Berat </label>
                                    <input class="form-control" type="number" min="1" name="weight" value="{{ json_decode($product->specification)->weight }}"/>
                                    <small id="warnadasar" class="form-text text-muted">
                                        Berat dalam satuan gram
                                    </small>
                                </div>
                                <div class="col-4">
                                    <label class="label"> Warna </label>
                                    <select class="form-control" name="color" aria-describedby="warnadasar">
                                                <option value="{{ $product->color }}"> {{ $product->color }}</option>
                                                <option value="Hitam"> Hitam</option>
                                                <option value="Merah"> Merah</option>
                                                <option value="Biru"> Biru</option>
                                                <option value="Putih"> Putih</option>
                                                <option value="Ungu"> Ungu</option>
                                                <option value="Hijau"> Hijau</option>
                                                <option value="Cokelat"> Cokelat</option>
                                            </select>
                                </div>
                                <div class="col-4 mt-4">
                                    <label class="label"> Pakaian Untuk </label>
                                    <select class="form-control" name="category">
                                            <option value="{{ $product->category }}"> {{ $product->category }} </option>
                                            <option value="Pria"> Pria</option>
                                            <option value="Wanita"> Wanita</option>                                                
                                        </select>
                                </div>
                            </div> 
                            @elseif($product['cat_product'] == "makanan")
                            <div class="row">
                                    <div class="col-12 col-md-4 col-lg-4">
                                        <label class="label"> Ukuran Pembungkus</label>
                                        <input class="form-control" type="text" name="dimention" placeholder="Cth: 2m x 90cm" value="{{ json_decode($product->specification)->size_pack}}" />
                                    </div>
                                    <div class="col-12 col-md-4 col-lg-4">
                                        <label class="label"> Berat </label>
                                        <input class="form-control" type="number" min="1" name="weight" aria-describedby="warnadasar" placeholder="/g" value="{{ json_decode($product->specification)->weight }}" />
                                        <small id="warnadasar" class="form-text text-muted">
                                            Berat dalam satuan gram
                                        </small>
                                    </div>

                                    <div class="col-12 col-md-4 col-lg-4">
                                        <label class="label"> Umur Simpan </label>
                                        <select class="form-control" name="color" aria-describedby="warnadasar">
                                                <option value="{{ json_decode($product->specification)->umur_simpan}}"> {{ json_decode($product->specification)->umur_simpan}}</option>
                                                <option value="1 minggu"> 1 minggu</option>
                                                <option value="2 minggu"> 2 minggu</option>
                                                <option value="3 minggu"> 3 minggu</option>
                                                <option value="1 bulan"> 1 bulan</option>
                                                <option value="2 bulan"> 2 bulan</option>
                                                <option value="3 bulan"> 3 bulan</option>
                                                <option value="4 bulan"> 4 bulan</option>
                                                <option value="5 bulan"> 5 bulang</option>
                                                <option value="6 bulan"> 6 bulan</option>
                                            </select>
                                        <!-- <small id="warnadasar" class="form-text text-muted">
                                            Pilih warna yang paling dominan
                                        </small> -->
                                    </div>
                                    <div class="col-12 col-md-4 col-lg-4 mt-4">
                                        <label class="label"> Jenis Makanan </label>
                                        <select class="form-control" name="category">
                                                <option value="{{ $product->category }}"> {{ $product->category }}</option>
                                                <option value="Kering"> Kering</option>
                                                <option value="Basah"> Basah</option>                                                
                                            </select>
                                    </div>
                                </div>
                            @elseif($product['cat_product'] == "aksesoris")
                            <div class="row">
                                    <div class="col-12 col-md-4 col-lg-4">
                                        <label class="label"> Ukuran </label>                                                                                
                                        <select class="form-control" name="dimention" aria-describedby="warnadasar">
                                                <option value="{{ json_decode($product->specification)->size}}">{{ json_decode($product->specification)->size}}</option>
                                                <option value="Kecil"> Kecil</option>
                                                <option value="Sedang"> Sedang</option>
                                                <option value="Besar"> Besar</option>                                                
                                            </select>
                                    </div>
                                    <div class="col-12 col-md-4 col-lg-4">
                                        <label class="label"> Berat </label>
                                        <input class="form-control" type="number" min="1" name="weight" aria-describedby="warnadasar" placeholder="/g" value="{{ json_decode($product->specification)->weight}}" />
                                        <small id="warnadasar" class="form-text text-muted">
                                            Berat dalam satuan gram
                                        </small>
                                    </div>
                                    <div class="col-12 col-md-4 col-lg-4">
                                        <label class="label"> Warna</label>
                                        <select class="form-control" name="color" aria-describedby="warnadasar">
                                                <option value="{{ $product->color }}"> {{ $product->color }}</option>
                                                <option value="Hitam"> Hitam</option>
                                                <option value="Merah"> Merah</option>
                                                <option value="Biru"> Biru</option>
                                                <option value="Putih"> Putih</option>
                                                <option value="Ungu"> Ungu</option>
                                                <option value="Hijau"> Hijau</option>
                                                <option value="Cokelat"> Cokelat</option>
                                            </select>
                                        <small id="warnadasar" class="form-text text-muted">
                                            Pilih warna yang paling dominan
                                        </small>
                                    </div>
                                    <div class="col-12 col-md-4 col-lg-4 mt-4">
                                    <label class="label"> Jenis </label>
                                        <select class="form-control" name="category">                                                
                                                <option value="{{ $product->category }}"> {{ $product->category }} </option>    
                                                <option value="Buatan Tangan"> Buatan Tangan</option>
                                                <option value="Buatan Mesin"> Buatan Mesin </option>                                                
                                            </select>
                                    </div>
                                </div>

                            @elseif($product['cat_product'] == "obat")
                            <div class="row">
                                    <div class="col-12 col-md-4 col-lg-4">
                                        <label class="label"> Jenis </label>
                                        <!-- <input class="form-control" type="text" name="dimention" placeholder="Cth: Cair, Padat" /> -->
                                        <select onchange="cek_jenis()" id="jeniss" class="form-control" name="dimention" aria-describedby="warnadasar">
                                                <option value="{{ json_decode($product->specification)->jenis}}"> {{ json_decode($product->specification)->jenis}} </option>
                                                <option value="Padat"> Padat</option>
                                                <option value="Cair"> Cair</option>                                                
                                        </select>
                                    </div>
                                    <div class="col-12 col-md-4 col-lg-4">
                                        <label class="label"> Berat </label>
                                        <input class="form-control" type="number" min="1" name="weight" aria-describedby="warnadasar" placeholder="/g" value="{{ json_decode($product->specification)->weight}}"/>
                                        <small id="warnadasar" class="form-text text-muted">
                                            Berat dalam satuan gram
                                        </small>
                                    </div>
                                    <div class="col-12 col-md-4 col-lg-4">
                                        <label class="label" style="color : white">  asdhkjashdkjsha </label>
                                        <input class="form-control" type="text" name="color" placeholder="/ml" value="{{ $product->color }}" />
                                        <small id="warnadasar11" style="display:none" class="form-text text-muted">
                                            Volume dalam satuan mililiter()
                                        </small>

                                        <small id="warnadasar12" style="display:none" class="form-text text-muted">
                                            cth : 20cmx90cm
                                        </small>
                                    </div>
                                    <!-- <div class="col-12 col-md-4 col-lg-4" style="display:none" id="vol">
                                        <label class="label"> Volume </label>
                                        <input class="form-control" type="text" name="color" placeholder="/ml" />
                                    </div>                                     -->
                                    
                                </div>
                            @endif
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 mt-4">
                                <button type="submit" class="btn btn-primary float-right">Perbaharui Produk</button>
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

  function cek_jenis() {
        if(document.getElementById("jeniss").value == "Cair") {
            document.getElementById("warnadasar11").style.display="block";
            document.getElementById("warnadasar12").style.display="none";
        } else {
            document.getElementById("warnadasar12").style.display="block"
            document.getElementById("warnadasar11").style.display="none";
        } 
    }

</script>