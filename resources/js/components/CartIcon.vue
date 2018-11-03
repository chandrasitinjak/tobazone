<template>
  <div class="cart-area">
    <a href="/carts"><img src="/user-assets/img/core-img/bag.svg" alt=""> <span> {{total}}</span></a>
  </div>
</template>

<script>

import EventBus from '../eventBus';

export default {
  props: ['userId'],
  data() {
    return {
      total: null,
    };
  },
  methods: {
    getTotalProductInCart() {
      window.axios.get('/api/carts/user/' + this.userId).then(res => {
        if(res.data.total !== 0) {
          this.total = res.data.total
        }
      })
    }
  },
  mounted() {
    EventBus.$on('CART_ADDED', this.getTotalProductInCart);
    this.getTotalProductInCart()
  }
};
</script>
