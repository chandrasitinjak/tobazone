@extends('users.layouts.app')
@section('title') {{ "Products" }}
@endsection

@section('content')
<div class="container">
    <div class="row">
    @include('users.merchants.sidebar')

        <div class="col-md-9 crudproduk mt-3" style="display: grid">
            <div class="pull-right">
                <div class="card globalcard mt-0">
                    <div class="card-header">
                        <h6>Tambah Obat Baru </h6>
                    </div>
                    <div class="card-body">
                        <form class="form-group" method="POST" action="{{ url('/products/store', 5) }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <div class="input-group mb-3">
                                    <label class="col-sm-3 col-form-label">
                                            Gambar Produk
                                            <span class="formbadge badge badge-secondary font-weight-light text-muted">Wajib</span>
                                        </label>
                                    <div class="col-sm-9">
                                        <div class="upload-btn-wrapper">
                                            <button class="btn-upcus">
                                                    <img src="{{ '/images/assets/addimage.png'}}">
                                                </button>
                                            <input id="files" name="images[]" multiple type="file" required/>
                                        </div>
                                        <div id="result" class="row mt-4">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nama Produk
                                        <span class="formbadge text-muted badge badge-secondary font-weight-light">Wajib</span>
                                    </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" aria-describedby="namaprodukhelp" name="name" required>
                                    <small id="namaprodukhelp" class="form-text text-muted">
                                        Tulis nama produk sesuai jenis, merek, dan rincian produk.
                                    </small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Harga Produk
                                        <span class="formbadge text-muted badge badge-secondary font-weight-light">Wajib</span>
                                    </label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" aria-describedby="namaprodukhelp" min="1" name="price" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Stok Produk
                                        <span class="formbadge text-muted badge badge-secondary font-weight-light">Wajib</span>
                                    </label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" aria-describedby="namaprodukhelp" min="1" name="stock" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Deskripsi Produk
                                    <span class="formbadge text-muted badge badge-secondary font-weight-light">Wajib</span>
                                </label>
                                <div class="col-sm-9">
                                    <textarea type="text" rows="5" class="form-control" aria-describedby="namaprodukhelp" name="description" required></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Asal Produk
                                        <span class="formbadge text-muted badge badge-secondary font-weight-light">Wajib</span>
                                    </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" aria-describedby="namaprodukhelp" min="1" name="product_origin" required>
                                </div>
                            </div>
                            <div class="mt-4">
                                <label class="label"> Spesifikasi </label>
                                <div class="row">
                                    <div class="col-12 col-md-4 col-lg-4">
                                        <label class="label"> Jenis </label>
                                        <!-- <input class="form-control" type="text" name="dimention" placeholder="Cth: Cair, Padat" /> -->
                                        <select onchange="cek_jenis()" id="jeniss"class="form-control" name="dimention" aria-describedby="warnadasar" required>
                                                <option value="Padat"> Padat</option>
                                                <option value="Cair"> Cair</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-md-4 col-lg-4">
                                        <label class="label"> Berat </label>
                                        <input class="form-control" type="number" min="1" name="weight" aria-describedby="warnadasar" placeholder="/g" required/>
                                        <small id="warnadasar" class="form-text text-muted">
                                            Berat dalam satuan gram
                                        </small>
                                    </div>
                                    <div class="col-12 col-md-4 col-lg-4" style="display:none" id="uk_kemasan">
                                        <label class="label"> Ukuran Kemasan </label>
                                        <input class="form-control" type="text" name="color_1" placeholder="cth 2cmx8cm" required/>
                                    </div>
                                    <div class="col-12 col-md-4 col-lg-4" style="display:none" id="vol">
                                        <label class="label"> Volume </label>
                                        <input class="form-control" type="text" name="color" placeholder="/ml" />
                                    </div>
                                    <!-- <div class="col-12 col-md-4 col-lg-4">
                                        <label class="label"> Warna Obat</label>
                                        <select class="form-control" name="color" aria-describedby="warnadasar">
                                                <option value="black"> Hitam</option>
                                                <option value="red"> Merah</option>
                                                <option value="blue"> Biru</option>
                                                <option value="white"> Putih</option>
                                                <option value="purple"> Ungu</option>
                                                <option value="green"> Hijau</option>
                                                <option value="brown"> Cokelat</option>
                                            </select> -->
                                        <!-- <small id="warnadasar" class="form-text text-muted">
                                            Pilih warna yang paling dominan
                                        </small> -->
                                    <!-- </div> -->
                                    <!-- <div class="col-12 col-md-4 col-lg-4">
                                        <label class="label"> Kategori </label>
                                        <select class="form-control" name="category">
                                                <option value="Herbal"> Herbal</option>
                                                <option value="Tradisional"> Tradisional</option>
                                            </select>
                                    </div> -->
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12 mt-4">
                                    <button type="submit" class="btn btn-primary float-right">Tambah Obat</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

<script>
    window.onload = function () {
        if (window.File && window.FileList && window.FileReader) {
            var filesInput = document.getElementById("files");

            filesInput.addEventListener("change", function (event) {
                var files = event.target.files;
                var output = document.getElementById("result");

                for (var i = 0; i < files.length; i++) {
                    var file = files[i];

                    if (!file.type.match('image')) continue;

                    var picReader = new FileReader();
                    picReader.addEventListener("load", function (event) {
                        var picFile = event.target;
                        var div = document.createElement("div");
                        div.className = "col-4 col-md-3 col-lg-3"
                        div.innerHTML = "<div class='single-product-wrapper'> <div class='product-img'> <img src='"
                            + picFile.result + "'> </div> </div>";

                        output.insertBefore(div, null);
                    });

                    picReader.readAsDataURL(file);
                }

            });
        } else {
            console.log("Your browser does not support File API");
        }

        if(document.getElementById("jeniss").value == "Padat") {
            document.getElementById("uk_kemasan").style.display="block"
        }

    }

    function cek_jenis() {
        if(document.getElementById("jeniss").value == "Cair") {
            document.getElementById("vol").style.display="block"
            document.getElementById("uk_kemasan").style.display="none"
        } else {
            document.getElementById("vol").style.display="none"
            document.getElementById("uk_kemasan").style.display="block"
        }
    }
</script>
