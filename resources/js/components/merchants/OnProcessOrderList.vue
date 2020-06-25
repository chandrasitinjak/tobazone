<template>
  <div class="card globalcard">
    <div class="card-body">
      <div class="row">
        <div class="pull-right">
          <div class="card globalcard mt-0">
            <div class="card-header">
              <h6>Order yang Sedang Diproses</h6>
            </div>

            <div v-if="transactions.length == 0" class="col-12 center center-block align-center text-center mt-15">              
              <img src="/images/assets/search_result_empty.png" style="height: 120px; border: none; opacity: 0.5"/>
              <p class="text font-bold">
                <br>
                belum ada order saat ini
              </p>          
            </div>

            </div>

            <div v-if="transactions.length != 0">
            <div v-for="transaction in transactions">
              <div class="card-body" style="border-bottom: 1px #c5c5c5 solid; padding-bottom: 10px">
                <div class="row mt-2">
                  <div class="col-md-10 col-sm-12 col-xs-6">
                    <div class="row" v-for="(order, idx) in transaction.orders">
                      <div class="col-lg-3 col-xs-12">
                        <div class="vimagewrapper">
                          <img
                            class="vimg"
                            :src="'/images/' + JSON.parse(order.product.images)[0]"
                            alt="Card image cap"
                          >
                        </div>
                      </div>
                      <div class="col-md-8">
                        <div class="keranjang-desc-prod">
                          <h6>{{ order.product.name }}</h6>
                          <h6
                            style="color: green;"
                            v-if="transaction.payment.status === 'paid'"
                          >Sudah dibayar <span class="badge badge-info">{{ transaction.courier }}</span> </h6> 
                          <h6 style="color: red;" v-else>Belum dibayar</h6>
                          <small>
                            <b>Jumlah :</b>
                            {{ order.quantity }}
                            <br>
                            <b>Stok Anda :</b>
                            {{ order.product.stock }}
                          </small>
                        </div>
                        <div
                          v-if="idx === transaction.orders.length - 1"
                          class="keranjang-desc-prod"
                        >
                          <small>Dikirim ke:
                            <br>
                            {{ transaction.address }}
                          </small>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div>
                    <div>
                      <div>
                        <!-- <span class="badge badge-info">kurir</span> -->
                        <!-- <div class="row">
                              <h5><span class="badge badge-info">{{ transaction.courier }}</span></h5>
                          </div>             -->
                        <div class="quantity col-md-5" v-if="transaction.shipping_number === null">
                                        
                          <div class="row">
                          <button
                            class="btn btn-success btn-sm mb-2"
                            style="display: block; width: 90px"
                            data-toggle="modal"
                            data-target="#resiModal"
                            v-on:click="updateSelectedId(transaction.id)"
                          >Input Resi</button>
                            </div>
                          <div class="row">
                          <button
                            class="btn btn-danger btn-sm"
                            style="width: 90px"
                            v-on:click="updateOrderStatus(transaction.id, 'rejectedByMerchant')"
                          >Tolak</button>
                            </div>
                        </div>
                        <div
                          class="modal fade"
                          id="resiModal"
                          tabindex="-1"
                          role="dialog"
                          aria-labelledby="exampleModalLabel"
                          aria-hidden="true"
                        >
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Masukkan Nomor Resi</h5>
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
                                    <label for="namapengirim" class="small">Nomor Resi</label>
                                    <input
                                      type="text"
                                      class="form-control form-control-sm"
                                      placeholder="Nomor Resi"
                                      v-model="shippingNumber"
                                    >
                                  </div>
                                </form>
                              </div>
                              <div class="modal-footer">
                                <button
                                  type="button"
                                  class="btn btn-primary"
                                  v-on:click="updateResi"
                                >Submit</button>
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
          <!-- Pagination -->
          <!-- <nav aria-label="navigation">
            <ul class="pagination mt-50 mb-50">
              <li class="page-item">
                <a class="page-link" href="#">
                  <i class="fa fa-angle-left"></i>
                </a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">1</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">2</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">3</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">...</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">21</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">
                  <i class="fa fa-angle-right"></i>
                </a>
              </li>
            </ul>
          </nav> -->
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["userId"],
  data() {
    return {
      transactions: [],
      orginalProductsData: [],
      searchName: "",
      shippingNumber: "",
      selectedId: ""
    };
  },
  methods: {
    getProducts() {
      window.axios
        .get("/api/merchant/" + this.userId + "/onprocess-orders")
        .then(res => {
          this.transactions = res.data;
          console.log(this.transactions);
        })
        .catch(err => {
          console.log(err);
        });
    },
    updateResi() {
      let payload = {
        shippingNumber: this.shippingNumber
      }

      window.axios
        .post("/api/orders/" + this.selectedId + "/update-shipping-number", payload)
        .then(() => {
          window.location = "/merchant/" + this.userId + "/ongoing-orders"
        })
        .catch(err => {
          console.log(err);
        });
    },
    updateSelectedId(id) {
      this.selectedId = id;
      console.log(this.selectedId);
    },
    updateOrderStatus(id, status) {
      const payload = {
        status: status
      };
      window.axios
        .post("/api/merchant/orders/" + id, payload)
        .then(res => {
          this.getProducts();
        })
        .catch(err => {
          console.log(err);
        });
    }
  },
  mounted() {
    this.getProducts();
  }
};
</script>

<style>
</style>
