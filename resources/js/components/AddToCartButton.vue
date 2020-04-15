<template>
  <div>
    <!-- <div> -->
      <!-- <input class="col-2 form-control form-control-sm" v-model="total" type="number" min="1" value="1" :max="maxUnit" /> -->
    <!-- </div> -->
    <div class="cart-fav-box d-flex align-items-center mt-4">
      <button v-on:click="addToCart()" class="btn essence-btn">Tambah ke keranjang</button>
    </div>
  </div>
</template>

<script>
import EventBus from "../eventBus";

export default {
  props: ["userId", "productId", "maxUnit"],
  data() {
    return {
      total: 1,
    };
  },
  methods: {
    // async addToCart() {
    addToCart() {
      let payload = {
        productId: this.productId,
        total: 1,
        userId: this.userId
      };

      // await window.axios.post("/api/carts", payload).then(res => {
      window.axios.post("/api/carts", payload).then(res => {
        this.emitEvent(res.data);
      });
      
      //pindah ke halaman keranjang
      window.location = "/carts"
    },
    emitEvent(data) {
      EventBus.$emit("CART_UPDATED", data);
    }
  },
  mounted() {}
};
</script>