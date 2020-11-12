<template>

    <div class="cart-fav-box d-flex align-items-center mt-4">
      <button v-on:click="addToCart()" class="btn essence-btn w-100">Tambah ke keranjang</button>
    </div>

</template>

<style scoped>
button{
    font-size: 13px;
}
@media (min-width:219px) and (max-width: 449px){

}
@media (min-width:450px) and (max-width: 767px){

}
@media (min-width:768px) and (max-width: 990px){
    button{
        font-size: 10px;
    }
}
@media (min-width:991px) and (max-width: 1230px){
    button{
        font-size: 10px;
    }
}
</style>

<script>
import EventBus from "../eventBus";

export default {
  props: ["userId", "productId", "maxUnit", "message"],
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
        userId: this.userId,
        message: this.message
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
