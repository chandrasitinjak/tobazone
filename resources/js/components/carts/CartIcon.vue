<template>
  <div class="cart-area" style="width:41px">
    <a href="/carts">
      <transition name="cart">
        <img src="/user-assets/img/core-img/bag.svg" style="width: 23px" v-if="show">
      </transition>
      <span style="display:inline-block;font-size: large;
    color: #4b1815;">{{total}}</span>
    </a>
  </div>
</template>

<script>
import EventBus from "../../eventBus";

export default {
  props: ["userId"],
  data() {
    return {
      total: 0,
      show: true
    };
  },
  methods: {
    getTotalProductInCart() {
      window.axios.get("/api/carts/user/" + this.userId).then(res => {
        this.show = false

        setTimeout(() => {
          this.show = true;
        }, 500);

        const carts = res.data.carts
        let total = 0

        carts.forEach(cart => {
          total += parseInt(cart.total)
        });

        this.total = total
      });
    }
  },
  mounted() {
    EventBus.$on("CART_UPDATED", this.getTotalProductInCart);
    this.getTotalProductInCart();
  }
};
</script>

<style scoped>
.cart-enter-active {
  animation: bounce-in 0.5s;
}

@keyframes bounce-in {
  0% {
    transform: scale(0);
  }
  50% {
    transform: scale(1.3);
  }
  100% {
    transform: scale(1);
  }
}
</style>
