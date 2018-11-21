<template>
  <div class="container">
    <div class="col-md-12 payment globalcard">
      <div class="row justify-content-md-center">
        <div class="card col-md-12">
          <div class="text-center mt-2">
            <h4>Terima Kasih, {{ transaction.customer.profile.name }}</h4>
          </div>
          <div class="row justify-content-md-center">
            <div class="card my-3 col-6 time">
              <div class="card-body">
                <p
                  class="text-center"
                  style="font-size: small"
                >Segera selesaikan pembayaran Anda sebelum stok habis.</p>
                <h2
                  class="text-center"
                >{{ duration._data.hours }} Jam {{ duration._data.minutes}} Menit {{ duration._data.seconds }} Detik</h2>
                <p class="text-center" style="font-size: small ">
                  <i>(Sebelum {{ getDeatline() }})</i>
                </p>
              </div>
            </div>
          </div>
          <div class="row justify-content-md-center">
            <div class="card col-6 my-3">
              <div class="">
                <div class="card-body">
                  <div class="text-muted">Transfer pembayaran ke nomor Virtual Account :</div>
                  <img src="/images/assets/BNI.png" style="height: 30px; display: inline" alt="">
                  <h4 style="display: inline">8277-082274162987</h4>
                  <div class="mt-3 text-muted">Jumlah yang harus dibayar :</div>
                  <h5 style="color: #ff5205">Rp {{ getTotalPayment(transaction.payment) }}</h5>
                </div>
              </div>
            </div>
          </div>
          <div class="row justify-content-md-center">
            <div class="card col-6 my-3">
              <div class="">
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
                                <small id="" class="form-text text-muted"></small>
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
import moment from "moment";

export default {
  props: ["userId", "transactionId"],
  data() {
    return {
      transaction: {},
      deadline: "",
      duration: {
        _data: {
          hours: 0,
          minutes: 0,
          seconds: 0
        }
      },
      selectedFile: null,
      senderName: '',
      selectedBank: ''
    };
  },
  methods: {
    getTransaction() {
      window.axios
        .get(
          "/api/customer/" + this.userId + "/transaction/" + this.transactionId
        )
        .then(res => {
          this.transaction = res.data;
          this.deadline = moment(this.transaction.created_at).add(1, "days");
        })
        .catch(err => {
          console.log(err);
        });
    },
    getTotalPayment(payment) {
      return (
        payment.product_cost +
        payment.shipping_cost -
        payment.product_discount -
        payment.shipping_discount
      );
    },
    updateDuration() {
      this.duration = moment.duration(this.deadline.diff(moment()));
    },
    getDeatline() {
      moment.locale("id");
      return moment(this.transaction.created_at)
        .add(1, "days")
        .format("dddd, MMMM Do YYYY, h:mm:ss a");
    },
    uploadProofOfPayment() {
      const formData = new FormData()
      formData.append('image', this.selectedFile)
      formData.append('bank', this.selectedBank)
      formData.append('name', this.senderName)

      window.axios.post('/api/transaction/'+ this.transactionId +'/proof-of-payment', formData)
    },
    onFileChanged(event) {
      this.selectedFile = event.target.files[0];
      console.log(this.selectedFile)
    }
  },
  mounted() {
    this.getTransaction();

    setInterval(() => {
      this.updateDuration();
    }, 1000);
  }
};
</script>

<style>
</style>
