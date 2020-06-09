<template>
  <div class="cart-area" style="width:61px">
    <a href="/carts">
      <transition name="cart">
        <img src="/user-assets/img/core-img/bag.svg" style="width: 30px;heigh:30px" v-if="show">
      </transition>
      <span  class="badge badge-light" style="background-color :black;; display:inline-block;font-size: 0.8rem; color: #4b1815; 
      -webkit-border-radius: 9px;
      margin-top : 14px;
    -moz-border-radius: 20px;
    border-radius: 20px;  
    vertical-align: top;
    margin-left: -15px; color :  #FFFAF3">{{total}}</span>
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
        // console.log(carts);
        
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
