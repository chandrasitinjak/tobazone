<template>
  <div class="col-md-10 crudproduk">
    <spinner></spinner>
    <div class="card globalcard breadcrumbcard card-body">
      <div class="row">
        <div class="col-md-4">
          <h5>Detail Pemesanan</h5>
        </div>
      </div>
    </div>

    <div class="card globalcard" v-if="transaction !== null">
      <div class="card-body detailorder">
        <div class="row text-muted">
          <div class="col-md-3 small">Tanggal Transaksi</div>
          <div class="col-md-3 small">Total pembayaran</div>
          <div class="col-md-3 small">Status Pembayaran</div>
        </div>

        <div class="row detail mb-2">
          <div class="col-md-3 col-sm-1">{{ transaction.created_at }}</div>
          <div
            class="col-sm-3 col-sm-1 bold"
            style="color: orangered"
          >Rp {{ parseInt(transaction.payment.product_cost) + parseInt(transaction.payment.shipping_cost) }}</div>
          <div class="col-sm-2">Pembayaran diterima
            <br>
            <small>{{ JSON.parse(transaction.payment.proof)['bank'] }}</small>
          </div>
        </div>
        <div class="mt-4">
          <div class="row text-muted">
            <div class="col-md-6 small">Alamat Pengiriman</div>
            <div class="col-md-3 small">Ringkasan Pembayaran</div>
          </div>

          <div class="row detail">
            <div class="col-md-6 small">{{ transaction.address }}</div>
            <div class="col-sm-3 small">
              <table class="table table-striped table-responsive-sm table-sm">
                <tbody>
                  <tr>
                    <th scope="row" class="light">Total belanja</th>
                    <td>Rp {{ transaction.payment.product_cost }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Biaya Pengiriman</th>
                    <td>Rp {{ transaction.payment.shipping_cost }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Total Pembayaran</th>
                    <td>
                      <b>Rp {{ parseInt(transaction.payment.product_cost) + parseInt(transaction.payment.shipping_cost) }}</b>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <div class="detailorder mt-2">
          <div class="card">
            <div class="card-body">
              <div class="row singleorderprod mb-3" style="border-bottom: 1px #00000020 solid">
                <div class="col-md-12 mb-3">
                  <div class="row" v-for="order in transaction.orders">
                    <div class="col-sm-3 col-xs-12">
                      <div class="imgwrapper detailpesanan" style="padding: 0px; height: auto">
                        <img
                          :src="'/images/' + JSON.parse(order.product.images)[0]"
                          alt="Card image cap"
                        >
                      </div>
                    </div>
                    <div class="col-sm-5 col-xs-12">
                      <div class="keranjang-desc-prod">
                        <h6>{{ order.product.name }}</h6>
                        <h6 style="color: #FF5205; display: inline;">Rp {{order.product.price}}</h6>
                        <small>/ unit</small>
                        <br>
                        <small>Jumlah {{ order.quantity }}</small>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <button
                        class="btn small smallbtn"
                        data-toggle="modal"
                        data-target="#tulisulasan"
                        style="width: 150px"
                        role="button"
                        v-if="transaction.status === 'orderSuccessed' && order.product.review === null"
                        v-on:click="selectedProduct = order.product"
                      >Tulis Ulasan</button>
                      <button
                        class="btn small smallbtn"
                        data-toggle="modal"
                        data-target="#tulisulasan"
                        style="width: 150px"
                        role="button"
                        v-if="transaction.status === 'orderSuccessed' && order.product.review !== null"
                        v-on:click="selectedProduct = order.product"
                      >Lihat Ulasan</button>
                    </div>
                    <div
                      class="modal fade"
                      id="tulisulasan"
                      tabindex="-1"
                      role="dialog"
                      aria-labelledby="exampleModalCenterTitle"
                      aria-hidden="true"
                    >
                      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5
                              class="modal-title"
                              id="exampleModalCenterTitle"
                              v-if="order.product.review === null"
                            >Tulis Ulasan</h5>
                            <h5 class="modal-title" id="exampleModalCenterTitle" v-else>Ulasan Anda</h5>
                              <button
                                type="button"
                                class="close"
                                data-dismiss="modal"
                                aria-label="Close"
                              >
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body row justify-content-md-center">
                            <div
                              v-if="order.product.review === null"
                            >Kami ingin melayani anda dengan lebih baik, silahkan beri penilaian pengalaman berbelanja Anda</div>
                            <div v-else>Anda sudah memberikan review untuk produk dibawah ini</div>
                            <div class="col-md-10">
                              <div class="detailorder mt-2">
                                <div class="card">
                                  <div class="card-body">
                                    <div class="row singleorderprod" style=" padding-bottom: 10px">
                                      <div class="col-md-12">
                                        <div class="row">
                                          <div class="col-md-2">
                                            <div
                                              class="imgwrapper detailpesanan"
                                              style="padding: 0px; height: auto"
                                            >
                                              <img
                                                :src="'/images/' + JSON.parse(order.product.images)[0]"
                                                alt="Card image cap"
                                                style="height: auto"
                                              >
                                            </div>
                                          </div>
                                          <div class="col-md-10">
                                            <div class="keranjang-desc-prod">
                                              <h6>{{ selectedProduct.name }}</h6>
                                              <h6
                                                style="color: #FF5205; display: inline;"
                                              >Rp {{ selectedProduct.price }}</h6>
                                              <small>/unit</small>
                                              <br>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="col-md-12 mt-2">Komentar Anda:
                              <div class="form-group mt-2">
                                <textarea class="form-control" v-model="feedback" rows="3" v-if="order.product.review === null"></textarea>
                                <textarea class="form-control" rows="3" v-else readonly>{{ order.product.review.body }}</textarea>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button
                              type="button"
                              v-if="order.product.review === null"
                              v-on:click ="updateReview(selectedProduct.id)"
                              class="btn btn-primary btn-sm"
                            >Kirim Ulasan</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row text-muted">
                <div class="col-md-3 small">Status Pengiriman</div>
                <div class="col-md-3 small">Jasa Pengiriman</div>
              </div>

              <div class="row detail mb-2">
                <div class="col-md-3">
                  <b>Terkirim</b>
                  <br>
                  <small>Disediakan dan dikirim oleh {{ transaction.orders[0].product.merchant.profile.name }}</small>
                </div>
                <div class="col-sm-3 bold">
                  <b>JNE Reguler</b>
                  <br>
                  <small>Nomor Resi</small>
                  {{ transaction.shipping_number }}
                </div>
              </div>
              <div class="row text-center">
                <div class="col-md-12">
                  <a
                    class="down"
                    data-toggle="collapse"
                    href="#posisipengiriman"
                    role="button"
                    aria-expanded="false"
                    aria-controls="collapseExample"
                  >
                    LACAK POSISI PENGIRIMAN
                    <i class="fa fa-chevron-down"></i>
                  </a>
                </div>
              </div>
              <div class="collapse row justify-content-center" id="posisipengiriman">
                <div class="card card-body col-md-8 mt-3">
                  <table class="table table-striped table-responsive-sm table-sm">
                    <thead>
                      <tr>
                        <th>Status</th>
                        <th>Waktu</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="tracking in trackings" class="light">
                        <td>{{ tracking.desc}}</td>
                        <td>{{ tracking.date}}</td>
                      </tr>
                    </tbody>
                  </table>
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
import EventBus from "../../eventBus";
import spinner from "../Spinner";

export default {
  components: {
    spinner
  },
  props: ["transactionId", "customerId"],
  data() {
    return {
      transaction: null,
      trackings: {},
      selectedProduct: {},
      feedback: ""
    };
  },
  methods: {
    getTransaction() {
      EventBus.$emit("SPINNER", true);
      window.axios
        .get("/api/transaction/" + this.transactionId + "/tracking")
        .then(res => {
          this.transaction = res.data.transaction;
          // this.trackings = res.data.tracking.rajaongkir.result.manifest;          
          // this.updateStatus(res.data.tracking.rajaongkir.result.delivered);

          this.trackings = res.data.tracking.data.history;

          if(res.data.tracking.data.summary.status === "DELIVERED") {
            let delivered = true;
            this.updateStatus(delivered);
          }
          
          EventBus.$emit("SPINNER", false);
        })
        .catch(err => {
          if(err.response.status === 500) {             
            Vue.swal.fire({
              icon: 'warning',
              title: 'Oops...',
              text: 'Something went wrong!',              
            }).then(function() {                
                window.history.back();                
            })
          }
          EventBus.$emit("SPINNER", false);
        });
    },
    updateStatus(delivered) {
      let payload = {
        status: "orderSuccessed"
      };

      if (delivered && this.transaction.status !== "orderSuccessed") {
        window.axios
          .post("/api/merchant/orders/" + this.transactionId, payload)
          .then(() => {
            window.location =
              "/customer/" +
              this.customerId +
              "/transactions/" +
              this.transactionId +
              "/tracking";
          });
      }
    },
    updateReview(productId) {
      let payload = {
        transactionId: this.transactionId,
        userId: this.transaction.customer_id,
        feedback: this.feedback
      };

      window.axios
        .post("/api/product/" + productId + "/review", payload)
        .then(() => {
          window.location.reload(true);
        })
        .catch(err => {
          console.log(err);
          window.location.reload(true);
        });
    }
  },
  mounted() {
    this.getTransaction();
  }
};
</script>

<style>
</style>
