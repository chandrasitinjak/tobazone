<template>
  <div class="checkout_area">
    <div class="container">
      <div class="row checkout">
        <div class="col-md-8">
          <address-chooser :user-id="userId"/>
          <cart-detail :user-id="userId"/>
        </div>
        <div class="col-md-4">
          <payment-detail :user-id="userId"/>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import AddressChooser from './AddressChooser'
import CartDetail from './CartDetail'
import PaymentDetail from './PaymentDetail'

export default {
  props: ['userId'],
  components: {
    AddressChooser,
    CartDetail,
    PaymentDetail
  },
  mounted() {
    
  },
};
</script>

<style>
</style>
