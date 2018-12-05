<template>
  <div class="col-md-10 crudproduk">
    <div class="card globalcard breadcrumbcard card-body">
      <div class="row">
        <div class="col-md-4">
          <h5>Detail Pemesanan</h5>
        </div>
      </div>
    </div>

    <div class="card globalcard">
      <div class="card-body detailorder">
        <div class="row text-muted">
          <div class="col-md-3 small">Tanggal Transaksi</div>
          <div class="col-md-3 small">Total pembayaran</div>
          <div class="col-md-3 small">Status Pembayaran</div>
        </div>

        <div class="row detail mb-2">
          <div class="col-md-3 col-sm-1"> {{ transaction.created_at }}</div>
          <div class="col-sm-3 col-sm-1 bold" style="color: orangered">Rp {{ transaction.payment.product_cost + transaction.payment.shipping_cost }}</div>
          <div class="col-sm-2">Pembayaran diterima
            <br>
            <small> {{ JSON.parse(transaction.payment.proof)['bank'] }} </small>
          </div>
        </div>
        <div class="mt-4">
          <div class="row text-muted">
            <div class="col-md-6 small">Alamat Pengiriman</div>
            <div class="col-md-3 small">Ringkasan Pembayaran</div>
          </div>

          <div class="row detail">
            <div class="col-md-6 small"> 
              {{ transaction.address }}
            </div>
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
                      <b>Rp {{ transaction.payment.product_cost + transaction.payment.shipping_cost }}</b>
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
                        <img :src="'/images/' + JSON.parse(order.product.images)[0]" alt="Card image cap">
                      </div>
                    </div>
                    <div class="col-sm-5 col-xs-12">
                      <div class="keranjang-desc-prod">
                        <h6>Ulos Ragihotang</h6>
                        <h6 style="color: #FF5205; display: inline;">Rp {{order.product.price}} </h6>
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
                      >Tulis Ulasan</button>
                      <br>
                      <a
                        href="single-product-details.html"
                        class="btn small smallbtn mt-3"
                        style="width: 150px"
                        role="button"
                      >Lihat Ulasan</a>
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
                        <td> {{ tracking.manifest_description}} </td>
                        <td> {{ tracking.manifest_date }}  {{ tracking.manifest_time }} </td>
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
export default {
  props: ['transactionId'],
  data() {
    return {
      transaction: {},
      trackings: {}
    };
  },
  methods: {
    getTransaction() {
      window.axios
        .get("/api/transaction/" + this.transactionId + "/tracking")
        .then(res => {
          console.log(res.data)
          this.transaction = res.data.transaction
          this.trackings = res.data.tracking.rajaongkir.result.manifest
        })
        .catch(err => {
          console.log(err);
        });
    }
  },
  mounted() {
    this.getTransaction();
    console.log(this.transactionId)
  }
};
</script>

<style>
</style>
