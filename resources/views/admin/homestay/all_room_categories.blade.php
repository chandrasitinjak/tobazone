@extends('admin.layouts.app')
@section('title') {{ "New Orders" }}
@endsection

@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">New Order</strong>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="row">#</th>
                                <th>Nama Kategori</th>
                                <th>Deskripsi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($transactions as $idx => $order)
                            <tr>
                                <th scope="row"> {{ $idx+1 }}</th>
                                <td>{{ $order->category_name}}</td>
                                <td><span class="address"> {{ $order->category_deskripsi }}</span>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div align="right">
                            <button class="btn btn-primary" data-toggle="modal"
                                    data-target="#exampleModal"><i class="fa fa-plus"></i> Tambah
                            </button>
                        </div>
                        <div
                            class="modal fade"
                            id="exampleModal"
                            tabindex="-1"
                            role="dialog"
                            aria-labelledby="exampleModalLabel"
                            aria-hidden="true"
                        >
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <form class="form-group" method="POST"
                                          action="{{ url('/homestays/order/upload-resi') }}"
                                          enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <spinner></spinner>
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Unggah
                                                Bukti
                                                Bayar</h5>
                                            <button
                                                type="button"
                                                class="close"
                                                data-dismiss="modal"
                                                aria-label="Close"
                                            >
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- <form> -->
                                            <div class="form-group">
                                                <label for="namapengirim" class="small">Nama
                                                    Pengirim</label>
                                                <input
                                                    type="text"
                                                    class="form-control form-control-sm"
                                                    id="namapengirim"
                                                    aria-describedby="emailHelp"
                                                    placeholder="Nama Pengirim"
                                                    required
                                                >
                                                <div class="valid-feedback">sudah valid</div>
                                            </div>
                                            <div class="form-group">
                                                <label for="utkbank" class="small">Bank
                                                    Tujuan</label>
                                                <br>
                                                <select id="utkbank" class="form-control" required>
                                                    <!-- <option value="BRI">BRI</option> -->
                                                    <option value="MANDIRI">MANDIRI</option>
                                                    <option value="OVO">OVO</option>
                                                    <option value="DANA">DANA</option>
                                                    <option value="GOPAY">GOPAY</option>
                                                    <!-- <option value="BNI">BNI</option>
                                                    <option value="BCA">BCA</option> -->
                                                </select>
                                                <div class="valid-feedback">sudah valid</div>
                                                <div class="invalid-feedback">
                                                    <span>tidak boleh kosong</span>
                                                    <!-- <span v-if="!$v.senderName.required">tidak boleh kosong</span> -->
                                                </div>
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label class="col-form-label">Bukti Pembayaran (
                                                    jpg/jpeg/png )</label>
                                                <div class="col-sm-9">
                                                    <div class="upload-btn-wrapper">
                                                        <button class="btn-upcus"
                                                                style="margin: auto">
                                                            <img src="/images/assets/addimage.png"
                                                                 style="height: 100px">
                                                            <input type="file" name="images">
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- </form> -->
                                        </div>
                                        <div class="modal-footer">
                                            <button
                                                type="submit"
                                                class="btn essence-btn"
                                            >Unggah
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
