<template>
  <div class="card globalcard">
    <div class="card-header">
      <div class="row">
        <div class="col-7">
          <button
            class="btn btn-sm btn-outline-primary float-right"
            @click="showModalMerchant = !showModalMerchant"
          >Merchant</button>
        </div>
      </div>
    </div>   
    <modal v-if="showModalMerchant" />
  </div>
</template>

<script>
import ModalMerchant from "./AddMerchantModal";
import EventBus from "../../eventBus";

export default {
  data() {
    return {
      showModalMerchant: false
    };
  },  
  components: {
    ModalMerchant
  },
  mounted() {
    EventBus.$on("ADD_MERCHANT_MODAL_CLOSED", () => {
      this.showModalMerchant = false;
    });
  }
};
</script>

<style>
</style>
