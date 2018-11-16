@extends('users.layouts.app') 
@section('content')

<div class="container">
  <div class="col-md-12 payment globalcard">
    <div class="row justify-content-md-center">

      <div class="card col-md-12">
        <div class="text-center mt-2">
          <h4>Terima Kasih, Palti</h4>
        </div>
        <div class="row justify-content-md-center">

          <div class="card my-3 col-6 time">

            <div class="card-body ">
              <p class="text-center" style="font-size: small">Segera selesaikan pembayaran Anda sebelum stok habis.</p>
              <h2 class="text-center">
                46Jam 21Menit 15Detik
              </h2>
              <p class="text-center" style="font-size: small "><i>(Sebelum Jumat 16 November 2018 pukul 17:13).</i></p>
            </div>
          </div>
        </div>

        <div class="row justify-content-md-center">
          <div class="card col-6  my-3">
            <div class=" ">
              <div class="card-body">
                <div class="text-muted"> Transfer pembayaran ke nomor Virtual Account :</div>

                <img src="{{ url('/images/assets/BNI.png')}}" style="height: 30px; display: inline" alt="">

                <h4 style="display: inline"> 8277-082274162987</h4>

                <div class="mt-3 text-muted"> Jumlah yang harus dibayar :</div>
                <h5 style="color: #ff5205">Rp 1923809</h5>
              </div>
            </div>
          </div>
        </div>

        <div class="row justify-content-md-center">
          <div class="card col-6  my-3">
            <div class=" ">
              <div class="card-body">
                <div class="text-muted mb-2"> Upload Bukti Pembayaran</div>
                <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#exampleModal">
                  Upload Bukti Pembayaran
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form>
                          <div class="form-group">
                            <label for="namapengirim" class="small">Nama Pengirim</label>
                            <input type="text" class="form-control form-control-sm" id="namapengirim" aria-describedby="emailHelp" placeholder="Nama Pengirim">
                          </div>
                          <div class="form-group">
                            <label for="utkbank" class="small">Bank Tujuan</label> <br>
                            <select id="utkbank" class="form-control ">
                              <option>BNI</option>
                              <option>BRI</option>
                              <option>BCA</option>
                            </select>
                          </div>
                          <br><br>
                          <div class="form-group">
                            <label class="col-form-label">Bukti Pembayaran</label>
                            <div class="col-sm-9 ">
                              <div class="upload-btn-wrapper ">
                                <button class="btn-upcus" style="margin: auto">
                                  <img src="img/asset-img/addimage.png" style="height: 100px">
                                </button>
                                <input type="file" name="myfile" />
                              </div>
                              <small id="" class="form-text text-muted">

                              </small>
                            </div>
                          </div>

                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                      </div>
                    </div>
                  </div>
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