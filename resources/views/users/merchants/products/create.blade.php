@extends('users.layouts.app')
@section('title') {{ "Products" }}
@endsection

@section('content')
    <div class="container">

        <!--menu-store-->
        <div class="row">
            <!--sidebar-->
            <div class="col-md-3 col-lg-3">
                <div class="merchant-sidebar">
                    <div class="card globalcard">
                        <div class="card-body">
                            <div class="mercant-sidebar-menu">
                                <ul id="menu-content2" class="menu-content collapse show">
                                    <!-- Single Item -->
                                    <li data-toggle="collapse" data-target="#clothing">
                                        <a href="#">Produk</a>
                                        <ul class="sub-menu collapse show" id="clothing">
                                            <li><a href="#">All</a></li>
                                            <li><a href="#">Tambah produk</a></li>
                                            <li><a href="#">Produk terjual</a></li>
                                        </ul>
                                    </li>
                                    <!-- Single Item -->
                                    <li data-toggle="collapse" data-target="#shoes" class="collapsed">
                                        <a href="#">Pemesanan</a>
                                        <ul class="sub-menu collapse" id="shoes">
                                            <li><a href="#">Order Berhasil</a></li>
                                            <li><a href="#">Order Dibatalkan</a></li>
                                            <li><a href="#">Order Gagal</a></li>
                                        </ul>
                                    </li>
                                    <li data-toggle="collapse" data-target="#penjualan" class="collapsed">
                                        <a href="#">Penjualan</a>
                                    </li>
                                    <ul class="sub-menu collapse" id="penjualan">
                                        <li><a href="#">Order Berhasil</a></li>
                                        <li><a href="#">Order Dibatalkan</a></li>
                                        <li><a href="#">Order Gagal</a></li>
                                    </ul>
                                    <li data-toggle="collapse" data-target="#ulasan" class="collapsed">
                                        <a href="#">Informasi Toko</a>
                                    </li>
                                    <!-- Single Item -->

                                </ul>
                            </div>
                            <ul>
                                <li>Pengaturan Toko</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--//sidebar-->

            <!--content-->
            <div class="col-md-9 crudproduk" style="display: grid">
                <div class="card globalcard breadcrumbcard card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <h5>Produk</h5>
                        </div>
                    </div>
                </div>
                <div class="pull-right">

                    <!--List Produk-->
                    <div class="card globalcard mt-0">
                        <div class="card-header">
                            <h6>Tambah Produk Baru </h6>

                        </div>
                        <div class="card-body">
                            <form class="form-group" method="POST" action="{{ url('/products/store') }}"
                                  enctype="multipart/form-data">
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
                                                    <img src="{{ '/images/asset/addimage.png'}}">
                                                </button>
                                                <input id="files" name="images[]" multiple type="file"/>
                                            </div>
                                            <small id="passwordHelpBlock" class="form-text text-muted">
                                                Format gambar .jpg .jpeg .png dan ukuran minimum 300 x 300px
                                                (Untuk gambar optimal gunakan ukuran 700 x 700 px)
                                            </small>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Produk
                                        <span class="formbadge text-muted badge badge-secondary font-weight-light">Wajib</span>
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="" placeholder=""
                                               aria-describedby="namaprodukhelp" name="name">
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
                                        <input type="number" class="form-control" id="" placeholder=""
                                               aria-describedby="namaprodukhelp" min="1" name="price" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Stock Produk
                                        <span class="formbadge text-muted badge badge-secondary font-weight-light">Wajib</span>
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="" placeholder=""
                                               aria-describedby="namaprodukhelp" min="1" name="stock" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Deskripsi Produk
                                        <span class="formbadge text-muted badge badge-secondary font-weight-light">Wajib</span>
                                    </label>
                                    <div class="col-sm-9">
                    <textarea type="text" rows="5" class="form-control" id="" placeholder=""
                              aria-describedby="namaprodukhelp" name="description">
                    </textarea>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <label class="label"> Specification </label>
                                    <div class="row">
                                        <div class="col-4">
                                            <label class="label"> Ukuran </label>
                                            <input class="form-control" type="text" name="dimention"
                                                   placeholder="Cth: 2m x 90cm"/>
                                        </div>
                                        <div class="col-4">
                                            <label class="label"> Berat </label>
                                            <input class="form-control" type="number" min="1" max="3" name="weight"/>
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
                                        <button type="submit" class="btn btn-primary float-right">Tambah Barang</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <!--//List Produk-->
                <!--//content-->
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
                        div.className = "col-3"
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
</script>