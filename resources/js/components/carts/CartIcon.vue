<template>
  <div class="cart-area">
    <a href="/carts">
      <transition name="cart">
        <img src="/user-assets/img/core-img/bag.svg" v-if="show">
      </transition>
      <span>{{total}}</span>
    </a>
  </div>
</template>

<script>
import EventBus from "../../eventBus";

export default {
  props: ["userId"],
  data() {
    return {
      total: null,
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
        
        if (res.data.total !== 0) {
          this.total = res.data.carts.length;
        }
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
