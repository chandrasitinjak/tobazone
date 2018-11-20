<template>
  <div>
    <div class="card globalcard breadcrumbcard card-body">
      <div class="row">
        <div class="col-md-4">
          <h5>Pesanan</h5>
        </div>
      </div>
    </div>
    <div>
      <div class="card globalcard">
        <div class="card-header">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a
                class="nav-link active"
                id="pesananbaru-tab"
                data-toggle="tab"
                href="#pesanansaatini"
                role="tab"
                aria-controls="home"
                aria-selected="true"
              >Pesanan Saat Ini</a>
            </li>
            <li class="nav-item">
              <a
                class="nav-link"
                id="Konfirmasi-tab"
                data-toggle="tab"
                href="#konfirmasi"
                role="tab"
                aria-controls="profile"
                aria-selected="false"
              >Pesanan Selesai</a>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div
              class="tab-pane fade show active"
              id="pesanansaatini"
              role="tabpanel"
              aria-labelledby="pesananbaru-tab"
            >
              <div class="detailorder mt-2" v-for="transaction in transactions">
                <div class="row">
                  <div class="col-12">
                    <div class="card">
                      <div class="card-header" style="background-color: #f1f1f1">
                        <div class="row text-muted">
                          <div class="col-sm-3 small">Tanggal Transaksi</div>
                          <div class="col-sm-3 small">Total pembayaran</div>
                          <div class="col-sm-3 small">Status</div>
                        </div>
                        <div class="row detail">
                          <div class="col-sm-3"> {{ transaction.created_at }}</div>
                          <div class="col-sm-3 bold" style="color: orangered">Rp {{ getTotalPayment(transaction.payment)}}</div>
                          <div class="col-sm-6">
                            <div
                              class="alert alert-warning p-1"
                              role="alert"
                              style="font-size: x-small"
                              v-if="transaction.status === 'pending'"
                            >Menunggu Pembayaran
                              <br>
                              <a :href="'/customer/transactions/' + transaction.id" class="alert-link">
                                Upload bukti
                                pembayaran
                              </a>
                            </div>

                            <div
                              class="alert alert-warning p-1"
                              role="alert"
                              style="font-size: x-small"
                              v-if="transaction.status === 'acceptedByMerchant'"
                            >Sudah diterima penjual
                              <br>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="card-body" v-for="order in transaction.orders">
                        <div class="row singleorderprod" style=" padding-bottom: 10px">
                          <div class="col-md-12 col-sm-12 col-xs-6">
                            <div class="row">
                              <div class="col-sm-2 col-xs-12">
                                <div class="imgwrapper pesanan" style="padding: 0px; height: auto">
                                  <img :src="'/images/' + JSON.parse(order.product.images)[0]" alt="Card image cap">
                                </div>
                              </div>
                              <div class="col-sm-6 col-xs-12">
                                <div class="keranjang-desc-prod">
                                  <h6> {{ order.product.name }} </h6>
                                  <h6 style="color: #FF5205; display: inline;">Rp {{ order.product.price }}</h6>
                                  <br>
                                  <small>Jumlah {{ order.quantity }}</small>
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

            <!-- <div
              class="tab-pane fade"
              id="konfirmasi"
              role="tabpanel"
              aria-labelledby="Konfirmasi-tab"
            >
              
              <div class="detailorder mt-2">
                <div class="row">
                  <div class="col-12">
                    <div class="card">
                      <div class="card-header" style="background-color: #f1f1f1">
                        <div class="row text-muted">
                          <div class="col-sm-3 small">Tanggal Transaksi</div>
                          <div class="col-sm-3 small">Total pembayaran</div>
                          <div class="col-sm-3 small">Status Pembayaran</div>
                        </div>
                        <div class="row detail">
                          <div class="col-sm-3">28 Desember 2018</div>
                          <div class="col-sm-3 bold" style="color: orangered">Rp 201823</div>
                          <div class="col-sm-6">Pembayaran Diterima
                            <br>
                            <small>ATM BNI</small>
                          </div>
                        </div>
                      </div>
                      <div class="card-body">
                        <div class="row singleorderprod" style=" padding-bottom: 10px">
                          <div class="col-md-12 col-sm-12 col-xs-6">
                            <div class="row">
                              <div class="col-sm-2 col-xs-12">
                                <div class="imgwrapper pesanan" style="padding: 0px; height: auto">
                                  <img src="img/product-img/product-2.jpg" alt="Card image cap">
                                </div>
                              </div>
                              <div class="col-sm-5 col-xs-12">
                                <div class="keranjang-desc-prod">
                                  <h6>Ulos Ragihotang</h6>
                                  <h6 style="color: #FF5205; display: inline;">Rp 12321</h6>
                                  <small>/unit</small>
                                  <br>
                                  <small>Jumlah 1</small>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <small>Terkirim</small>
                              </div>
                              <div class="col-md-2">
                                <a href="#" class="small smallbtn">detail</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
          </div>
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
      transactions: []
    };
  },
  methods: {
    getTransactions() {
      window.axios
        .get("/api/customer/" + this.userId + "/transactions")
        .then(res => {
          this.transactions = res.data;
          console.log(this.transactions)
        }).catch(err => {
          console.log(err)
        })
    },
    getTotalPayment(payment) {
      return payment.product_cost + payment.shipping_cost - payment.product_discount - payment.shipping_discount
    }
  },
  mounted() {
    this.getTransactions();
  }
};
</script>

<style>
</style>
