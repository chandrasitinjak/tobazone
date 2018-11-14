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
        <div class="">
          <span> Total Harga Produk </span>
          <span class="float-right font-weight-bold"> Rp. {{ totalProductCost }} </span>
        </div>
        <div class="">
          <span> Total Ongkos Kirim </span>
          <span class="float-right font-weight-bold"> Rp. {{ totalShippingCost }} </span>
        </div>
         <div style="border-bottom: 1px #b4b4b4 solid; margin: 10px 0px 10px 0px"></div>
          Total Pembayaran
          <div class="float-right  h5" style="color: #ff8415">
            Rp {{ totalProductCost + totalShippingCost }}
          </div>
        <div class="mt-5">
          <button class="btn essence-btn btn-block">Bayar</button>
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
      carts: [],
      totalProductCost: 0,
      totalShippingCost: 0,
    };
  },
  methods: {
    getProducts() {
      window.axios
        .get("/api/carts/user/" + this.userId)
        .then(res => {
          this.carts = res.data.products;
        })
        .catch(err => {
          console.log(err);
        });
    }
  },
  mounted() {
    this.getProducts();
    EventBus.$on('TOTAL_PRODUCT_COST', totalProductCost => {
      this.totalProductCost = totalProductCost
    })

    EventBus.$on('TOTAL_SHIPPING_COST', totalShippingCost => {
      this.totalShippingCost = totalShippingCost
    })
  }
};
</script>

<style>
</style>
