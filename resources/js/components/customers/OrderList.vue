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
      <div class="card globalcard" style="min-height: 400px">
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
                <div class="row" v-if="transaction.status === 'pending' || transaction.status === 'acceptedByAdmin' || transaction.status === 'acceptedByMerchant' || transaction.status === 'acceptedBySystem' || transaction.status === 'readyForProcess'">
                  <div class="col-12">
                    <div class="card">
                      <div class="card-header" style="background-color: #f1f1f1">
                        <div class="row text-muted">
                          <div class="col-sm-3 small">Tanggal Pemesanan</div>
                          <div class="col-sm-3 small">Total pembayaran</div>
                          <div class="col-sm-3 small">Status</div>
                        </div>
                        <div class="row detail">
                          <div class="col-sm-3">{{ transaction.created_at }}</div>
                          <div
                            class="col-sm-3 bold"
                            style="color: orangered"
                          >Rp {{ getTotalPayment(transaction.payment)}}</div>
                          <div class="col-sm-6">
                            <div class="alert alert-warning p-1" role="alert" style="font-size: x-small" v-if="transaction.status === 'pending' || transaction.status === 'acceptedByMerchant' || transaction.status === 'acceptedByAdmin'">
                              Menunggu Pembayaran
                              <a :href="'/customer/transactions/' + transaction.id" class="alert-link">
                                Upload bukti pembayaran
                              </a>
                            </div>

                            <div class="alert alert-warning p-1" role="alert" style="font-size: x-small" v-else-if="transaction.status === 'readyForProcess' && transaction.shipping_number !== null">
                              Barang dalam pengirima
                              <a :href="'/customer/' + userId + '/transactions/' + transaction.id + '/tracking'" class="alert-link">
                                Lacak Pengiriman
                              </a>
                            </div>

                            <div class="alert alert-warning p-1" role="alert" style="font-size: x-small" v-else-if="transaction.status === 'acceptedByMerchant'">
                              Sudah diterima penjual
                            </div>

                            <div class="alert alert-warning p-1" role="alert" style="font-size: x-small" v-else-if="transaction.status === 'acceptedBySystem' || transaction.shipping_number === null">
                              Sudah dibayar, menunggu diproses penjual
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
                                  <img
                                    :src="'/images/' + JSON.parse(order.product.images)[0]"
                                    alt="Card image cap"
                                  >
                                </div>
                              </div>
                              <div class="col-sm-6 col-xs-12">
                                <div class="keranjang-desc-prod">
                                  <h6>{{ order.product.name }}</h6>
                                  <h6
                                    style="color: #FF5205; display: inline;"
                                  >Rp {{ order.product.price }}</h6>
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

            <div
              class="tab-pane fade"
              id="konfirmasi"
              role="tabpanel"
              aria-labelledby="Konfirmasi-tab"
            >
              <div class="detailorder mt-2" v-for="transaction in transactions">
                <div class="row" v-if="transaction.status === 'rejectedByAdmin' || transaction.status === 'rejectedByMerchant' || transaction.status === 'canceledBySistem' || transaction.status === 'invalidProofOfPayment'">
                  <div class="col-12">
                    <div class="card">
                      <div class="card-header" style="background-color: #f1f1f1">
                        <div class="row text-muted">
                          <div class="col-sm-3 small">Tanggal Transaksi</div>
                          <div class="col-sm-3 small">Total pembayaran</div>
                          <div class="col-sm-3 small">Status</div>
                        </div>
                        <div class="row detail">
                          <div class="col-sm-3">{{ transaction.created_at }}</div>
                          <div
                            class="col-sm-3 bold"
                            style="color: orangered"
                          >Rp {{ getTotalPayment(transaction.payment)}}</div>
                          <div class="col-sm-6">
                            <div class="alert alert-warning p-1" role="alert" style="font-size: x-small" v-if="transaction.status === 'rejectedByAdmin'">
                              Ditolak oleh Admin
                            </div>

                            <div class="alert alert-warning p-1" role="alert" style="font-size: x-small" v-else-if="transaction.status === 'rejectedByMerchant'">
                              Ditolak oleh Penjual
                            </div>

                            <div class="alert alert-warning p-1" role="alert" style="font-size: x-small" v-else-if="transaction.status === 'invalidProofOfPayment'">
                              Ditolak oleh Admin karena bukti pembayaran tidak valid
                            </div>

                            <div class="alert alert-warning p-1" role="alert" style="font-size: x-small" v-else-if="transaction.status === 'canceledBySistem'">
                              Tidak melakukan pembayaran melewati batas waktu pembayaran
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
                                  <img
                                    :src="'/images/' + JSON.parse(order.product.images)[0]"
                                    alt="Card image cap"
                                  >
                                </div>
                              </div>
                              <div class="col-sm-6 col-xs-12">
                                <div class="keranjang-desc-prod">
                                  <h6>{{ order.product.name }}</h6>
                                  <h6
                                    style="color: #FF5205; display: inline;"
                                  >Rp {{formatPrice(order.product.price)}}</h6>
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
      formatPrice(value) {
          let val = (value/1).toFixed().replace('.', ',')
          return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
      },
    getTransactions() {
      window.axios
        .get("/api/customer/" + this.userId + "/transactions")
        .then(res => {
          this.transactions = res.data;
          console.log(this.transactions);
        })
        .catch(err => {
          console.log(err);
        });
    },
    getTotalPayment(payment) {
      let total = 0
      total += parseInt(payment.product_cost, 10)
      total += parseInt(payment.shipping_cost, 10)
      total -= parseInt(payment.product_discount, 10)
      total -= parseInt(payment.shipping_discount, 10)

      return total;
    }
  },
  mounted() {
    this.getTransactions();
  }
};
</script>

<style>
</style>
