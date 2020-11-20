@extends('users.layouts.app')
@section('title') {{ "Homestays" }}
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 crudproduk mt-3" style="display: grid">
            <div class="pull-right">
                <div>
                    <Create-Homestay/>
                </div>
                <div class="card globalcard mt-0">
                    <div class="card-header">
                        <h6>Tambah Homestay Baru </h6>
                    </div>
                    <div class="card-body">
                        <form class="form-group" method="POST" action="{{ url('/homestays/save') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <div class="input-group mb-3">
                                    <label class="col-sm-3 col-form-label">
                                        Gambar Homestay
                                        <span class="formbadge badge badge-secondary font-weight-light text-muted">Wajib</span>
                                    </label>
                                    <div class="col-sm-9">
                                        <div >
                                            <input type='file' alt="Input" onchange="readURL(this);" />
                                        </div>
                                        <br>
                                        <div id="result">
                                            <img id="blah" width="100%" src="{{ '/images/assets/addimage.png'}}" alt="your image" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nama Homestay
                                    <span class="formbadge text-muted badge badge-secondary font-weight-light">Wajib</span>
                                </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" aria-describedby="namaprodukhelp" name="name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Jumlah Kamar
                                    <span class="formbadge text-muted badge badge-secondary font-weight-light">Wajib</span>
                                </label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" aria-describedby="namaprodukhelp" min="1" name="stock" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Jumlah Kamar Tersedia
                                    <span class="formbadge text-muted badge badge-secondary font-weight-light">Wajib</span>
                                </label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" aria-describedby="namaprodukhelp" min="0" name="stock" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Harga Kamar/malam
                                    <span class="formbadge text-muted badge badge-secondary font-weight-light">Wajib</span>
                                </label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" aria-describedby="namaprodukhelp" min="1" name="price" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Deskripsi Homestay
                                    <span class="formbadge text-muted badge badge-secondary font-weight-light">Wajib</span>
                                </label>
                                <div class="col-sm-9">
                                    <textarea  rows="10" class="form-control" aria-describedby="namaprodukhelp" name="description"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Alamat Homestay
                                    <span class="formbadge text-muted badge badge-secondary font-weight-light">Wajib</span>
                                </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" aria-describedby="namaprodukhelp" min="1" name="product_origin" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12 mt-4">
                                    <button type="submit" class="btn btn-primary float-right">Tambah Homestay</button>
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
    import CreateHomestay from "../../../../js/components/homestay/merchant/CreateHomestay";

    export default {
        components : {CreateHomestay}
    }
</script>
