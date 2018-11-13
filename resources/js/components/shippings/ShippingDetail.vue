<template>
  <div class="order-details-confirmation">
    <div class="cart-page-heading">
      <h5>Pesanan Anda</h5>
    </div>
    
    <ul class="order-details-form mb-4">
      <li><span>Produk</span> <span>Total</span></li>
      <li v-for="cart in carts">
        <span> {{ cart.product.name }} {{ cart.total }} unit</span> 
        <span> RP {{ cart.product.price * cart.total}}</span>
      </li>  
      <li><span>Subtotal</span> <span> Rp. {{ subtotal }}</span></li>
      <li><span>Ongkos Kirim</span> <span> {{ shippingCost}}</span></li>
      <li><span>Total</span> <span>Rp. {{ subtotal + shippingCost }}</span></li>
    </ul> 

    <a href="#" class="btn essence-btn">Bayar Sekarang</a>
  </div>
</template>

<script>
import EventBus from '../../eventBus'

export default {
  props: ['userId'],
  data() {
    return {
      carts: [],
      subtotal: 0,
      shippingCost: 0,
      merchantAddress: {}
    }
  },
  methods: {
    getProducts() {
      window.axios.get('/api/carts/user/' + this.userId).then(res => {
        this.carts = res.data
        this.merchantAddress = JSON.parse(JSON.parse(res.data[0].product.merchant.profile.address)[0])
        console.log(this.merchantAddress)
        this.countSubtotal()
      }).catch(err => {
        console.log(err)
      })
    },
    countSubtotal() {
      this.carts.forEach(cart => {
        this.subtotal += cart.total * cart.product.price
      })
    },
    countShippingPrice(address) {
      const payload = {
        origin: this.merchantAddress.subdistrict_id,
        originType: 'subdistrict',
        destination: address.subdistrict_id,
        destinationType: 'subdistrict',
        weight: 1,
        courier: 'jne'
      }

      console.log(payload)

      window.axios.post('/api/shippingcost', payload).then(res => {
        this.shippingCost = res.data.rajaongkir.results[0].costs[0].cost[0].value
        console.log(this.shippingCost)
      })
    }
  },
  mounted() {
    this.getProducts()
    EventBus.$on('ADDRESS_CHOOSEN', address => {
      this.countShippingPrice(address)
    })
  }
};
</script>

<style>
</style>
