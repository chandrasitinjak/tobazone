<template>
  <div>
    <div
      class="card shopsummary globalcard"
      style="position: -webkit-sticky; position: sticky; top: 6rem;"
    >
      <div class="card-header">
        <h5>Ringkasan Belanja</h5>
      </div>
      <div class="card-body">
        <div v-for="merchant in merchants">
          <div>
            <span>Total Harga Produk</span>
            <span class="float-right font-weight-bold">Rp. {{ merchant.totalProductCost }}</span>
          </div>
          <div>
            <span>Total Ongkos Kirim</span>
            <span class="float-right font-weight-bold">Rp. {{ merchant.totalShippingCost }}</span>
          </div>
          <div style="border-bottom: 1px #b4b4b4 solid; margin: 10px 0px 10px 0px"></div>Total Pembayaran
          <div
            class="float-right h5"
            style="color: #ff8415"
          >Rp {{ merchant.totalProductCost + merchant.totalShippingCost }}</div>
        </div>
        <div class="mt-5">
          <button class="btn essence-btn btn-block" @click="createOrder">Bayar</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import EventBus from "../../eventBus";

export default {
  props: ["userId"],
  data() {
    return {
      merchants: [],
      finalPaymentDetail: null
    };
  },
  methods: {
    registerListener() {
      EventBus.$on("MERCHANT_LIST", merchants => {
        this.merchants = merchants;
        console.log(this.merchants);
      });

      EventBus.$on("FINAL_TRANSACTION_DETAIL", finalPaymentDetail => {
        this.finalPaymentDetail = finalPaymentDetail;
      });
    },
    createOrder() {
      window.axios
        .post("/api/transactions", this.finalPaymentDetail)
        .then(res => {
          console.log(res.data)
        })
        .catch(err => {
          console.log(err);
        });
    }
  },
  mounted() {
    this.registerListener();
  }
};
</script>

<style>
</style>
