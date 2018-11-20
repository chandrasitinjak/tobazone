<template>
  <div class="card globalcard">
    <div class="card-header">
      <div class="row"> 
        <div class="col-7">
          <button
            class="btn btn-sm btn-outline-primary float-right"
            @click="showModalCustomer = !showModalCustomer"
          >Customer</button>
        </div>
      </div>
    </div>   
    <modal-customer v-if="showModalCustomer" />
  </div>
</template>

<script>
import ModalCustomer from "./AddCustomerModal";
import EventBus from "../../eventBus";

export default {
  data() {
    return {
      showModalCustomer: false
    };
  },  
  components: {
    ModalCustomer
  }
};
</script>

<style>
</style>
