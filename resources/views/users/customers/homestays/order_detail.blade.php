@extends('users.layouts.app')
@section('title') {{ "Homestay Order" }}
@endsection

@section('content')
<section class="shop_grid_area section-padding-80">
    <h2>Detail Pesanan Anda, {{ Auth::user()->username }}</h2>
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td><p class="h6">Penginapan Tujuan</p></td>
                                    <td><p class="h6">:</p></td>
                                    <td><p class="h6">{{ $orderDetail->homestay->name }}</p></td>
                                </tr>
                              </div>
                                <tr>
                                    <td><p class="h6">Lokasi Penginapan</p></td>
                                    <td><p class="h6">:</p></td>
                                    <td><p class="h6">{{ $orderDetail->homestay->address }}</p></td>
                                </tr>
                                <tr>
                                    <td><p class="h6">Lama Menginap</p></td>
                                    <td><p class="h6">:</p></td>
                                    <td><p class="h6">{{ $orderDetail->duration }} Hari</p></td>
                                </tr>
                                <tr>
                                    <td><p class="h6">Metode Pembayaran</p></td>
                                    <td><p class="h6">:</p></td>
                                    <td><p class="h6">{{ $orderDetail->payment_method }}</p></td>
                                </tr>
                                <tr>
                                    <td><p class="h6">Total Harga</p></td>
                                    <td><p class="h6">:</p></td>
                                    <td><p class="h6">Rp {{ number_format($orderDetail->total_price, 2, ',', '.') }}</p></td>
                                </tr>
                                <tr>
                                    <td><p class="h6">Total Check-in</p></td>
                                    <td><p class="h6">:</p></td>
                                    <td><p class="h6">{{ date('d-m-Y', strtotime($orderDetail->check_in)) }}</p></td>
                                </tr>
                                </div>
                            </tbody>
                        </table>

                        <table class="table table-borderless">
                            <tbody>
                                
                                <tr>
                                    {{-- TODO: add link for Hapus button --}}
                                    <td><center><p class="h6 text-right"><a href="#" class="btn btn-outline-warning">Hapus</a></p></td></center>
                                    {{-- add link for Bayar button --}}
                                    <td> <center>
                                        <button
                                          type="button"
                                          class="btn essence-btn"
                                          data-toggle="modal"
                                          data-target="#exampleModal"
                                        >Bayar
                                      </button> </center>
                                    </td>
                                </tr>
                            </tbody>
                            
                        </table>

                        <!-- Modal -->
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
                          <spinner></spinner>
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Unggah Bukti Bayar</h5>
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
                                <label for="namapengirim" class="small">Nama Pengirim</label>
                                <input
                                  type="text"
                                  class="form-control form-control-sm"
                                  id="namapengirim"
                                  aria-describedby="emailHelp"
                                  placeholder="Nama Pengirim"
                                >
                                <div class="valid-feedback">sudah valid</div>
                              </div>
                              <div class="form-group">
                                <label for="utkbank" class="small">Bank Tujuan</label>
                                <br>
                                <select id="utkbank" class="form-control">
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
                                <label class="col-form-label">Bukti Pembayaran ( jpg/jpeg/png )</label>
                                <div class="col-sm-9">
                                  <div class="upload-btn-wrapper">
                                    <button class="btn-upcus" style="margin: auto">
                                      <img src="/images/assets/addimage.png" style="height: 100px">
                                      <input type="file" name="myfile">
                                    </button>
                                  </div>
                                </div>
                              </div>
                            <!-- </form> -->
                          </div>
                          <div class="modal-footer">
                            <button
                              type="button"
                              class="btn essence-btn"
                            >Unggah</button>
                          </div>
                        </div>
                      </div>
                    </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Shop Grid Area End ##### -->
@endsection

