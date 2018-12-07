<template>
  <div class="container">
    <div class="col-md-12 payment globalcard">
      <div class="row justify-content-md-center">
        <div class="card col-md-12">
            <div class="row justify-content-md-center">
              <div class="card col-6 my-3">
                <div>
                  <div class="card-body">
                    <div class="text-muted mb-2">Upload Bukti Pembayaran</div>
                    <button
                      type="button"
                      class="btn btn-block btn-primary"
                      data-toggle="modal"
                      data-target="#exampleModal"
                    >Upload Bukti Pembayaran</button>
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
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Upload Bukti Bayar</h5>
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
                            <form>
                              <div class="form-group">
                                <label for="namapengirim" class="small">Nama Pengirim</label>
                                <input
                                  type="text"
                                  class="form-control form-control-sm"
                                  id="namapengirim"
                                  aria-describedby="emailHelp"
                                  placeholder="Nama Pengirim"
                                  v-model="senderName"
                                >
                              </div>
                              <div class="form-group">
                                <label for="utkbank" class="small">Bank Tujuan</label>
                                <br>
                                <select id="utkbank" class="form-control" v-model="selectedBank">
                                  <option value="BNI">BNI</option>
                                </select>
                              </div>
                              <br>
                              <div class="form-group">
                                <label class="col-form-label">Bukti Pembayaran</label>
                                <div class="col-sm-9">
                                  <div class="upload-btn-wrapper">
                                    <button class="btn-upcus" style="margin: auto">
                                      <img src="/images/assets/addimage.png" style="height: 100px">
                                    </button>
                                    <input type="file" name="myfile" v-on:change="onFileChanged">
                                  </div>
                                  <small id class="form-text text-muted"></small>
                                </div>
                              </div>
                            </form>
                          </div>
                          <div class="modal-footer">
                            <button
                              type="button"
                              class="btn btn-primary"
                              v-on:click="uploadProofOfPayment"
                            >Upload</button>
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
</template>

<script>
export default {
  methods: {
    login() {}
  },
  mounted() {
    console.log("wjasdfa");
  }
};
</script>

<style>
</style>
