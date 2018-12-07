<template>
  <div class="card globalcard">
    <div class="card-body">
      <div class="row">
        <div class="pull-right">
          <div class="card globalcard mt-0">
            <div class="card-header">
              <h6>Order Baru</h6>
            </div>
            <div v-for="transaction in transactions">
              <div class="card-body" style="border-bottom: 1px #c5c5c5 solid; padding-bottom: 10px">
                <div class="row mt-2">
                  <div class="col-md-10 col-sm-12 col-xs-6">
                    <div class="row" v-for="(order, idx) in transaction.orders">
                      <div class="col-lg-3 col-xs-12">
                        <div class="vimagewrapper" style="padding: 0px">
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
                          >Sudah dibayar</h6>
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
                        <div class="quantity col-md-2">
                          <button
                            class="btn btn-success btn-sm mb-2"
                            style="display: block; width: 90px"
                            v-on:click="updateOrderStatus(transaction.id, 'acceptedByMerchant')"
                            v-if="transaction.payment.status !== 'paid'"
                          >Terima</button>
                          <button
                            class="btn btn-success btn-sm mb-2"
                            style="display: block; width: 90px"
                            v-on:click="updateOrderStatus(transaction.id, 'readyForProcess')"
                            v-else >"
                          >Terima</button>
                          <button
                            class="btn btn-danger btn-sm"
                            style="width: 90px"
                            v-on:click="updateOrderStatus(transaction.id, 'rejectedByMerchant')"
                          >Tolak</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Pagination -->
          <nav aria-label="navigation">
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
          </nav>
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
      searchName: ""
    };
  },
  methods: {
    getProducts() {
      window.axios
        .get("/api/merchant/" + this.userId + "/new-orders")
        .then(res => {
          this.transactions = res.data;
          console.log(this.transactions);
        })
        .catch(err => {
          console.log(err);
        });
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
