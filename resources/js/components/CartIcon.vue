<template>
  <div class="cart-area">
    <a href="/carts" id="essenceCartBtn"><img src="/user-assets/img/core-img/bag.svg" alt=""> <span> {{total}}</span></a>
  </div>
</template>

<script>
export default {
  props: ['userId'],
  data() {
    return {
      total: 0,
    };
  },
  methods: {
    getTotalProductInCart() {
      window.axios.get('/api/carts/user/' + this.userId).then(res => {
        this.total = res.data.total
      })
    }
  },
  mounted() {
    this.getTotalProductInCart()
  }
};
</script>
