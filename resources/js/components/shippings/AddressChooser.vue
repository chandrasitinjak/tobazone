<template>
  <div class="card globalcard">
    <div class="card-header">
      <div class="row">
        <div class="col-12 col-md-4">
          <h5>Alamat Pengiriman</h5>
        </div>
        <div class="col-md-4 col-12">
          <select v-model="address" class="form-control form-control-sm" @change="publishAddressChoosenEvent">            
            <option v-for="address in addresses" :value="JSON.parse(address)"> {{ JSON.parse(address).name }}</option>
          </select>
        </div>
        <div class="col-md-4 col-12">
          <button
            class="btn btn-sm btn-outline-primary float-right mt-1"
            @click="showModal = !showModal"
          >Tambah Alamat</button>
        </div>
      </div>
    </div>
    <div class="card-body">
      <div class="row">
      <div class="col-md-12">
      <div class="font-weight-bold">{{ buyer.name }}
        <br>
        <i class="fa fa-phone mr-2"></i>{{ buyer.phone }}</div>
      <div>
        <ul>
          <div class="mt-2" v-if="address != null">
            <b>Dikirim ke Alamat </b> <br>
            <li> {{ address.subdistrict_name }} {{ ", " + address.city_name }} {{ ", " + address.province_name }}</li>
            <li> Kode Pos {{ address.postal_code }} </li>
            <b> Alamat Rinci</b> <br>
            <li> {{ address.detail }} </li>
          </div>
        </ul>
      </div>
      </div>     
      </div>
    </div>
    <modal v-if="showModal" v-bind:user-id="userId"/>        
  </div>  
</template>

<script>
import Modal from "./AddAddressModal";
import EventBus from "../../eventBus";

export default {
  props: ["userId"],
  data() {
    return {
      showModal: false,
      addresses: [],
      address: null,
      buyer: {},      
    };
  },
  components: {
    Modal
  },
  methods: {
    async getAddress() {
     await window.axios
        .get("/profile/" + this.userId)
        .then(res => {
          this.addresses = JSON.parse(res.data.address);
          this.address = JSON.parse(this.addresses[0]);
          this.buyer = res.data;      
          
          EventBus.$emit('ADDRESS_CHOOSEN', null);
          //  this.publishAddressChoosenEvent();          
        })
        .catch(err => {
          console.log(err);
        });
    },

    publishAddressChoosenEvent() {
      EventBus.$emit('ADDRESS_CHOOSEN', this.address)
    }
  },
  mounted() {
    this.getAddress();
    EventBus.$on("ADD_ADDRESS_MODAL_CLOSED", () => {
      this.showModal = false;
    });     
  }
};
</script>

<style>
</style>
