<template>
  <div class="card globalcard">
    <div class="card-header">
      <div class="row">
        <div class="col-4">
          <h5>Alamat Pengiriman</h5>
        </div>
        <div class="col-4">
          <select
            v-model="address"
            class="form-control input-sm"
            @change="publishAddressChoosenEvent"
          >
            <option
              v-for="address in addresses"
              :value="JSON.parse(address)"
            >{{ JSON.parse(address).name }}</option>
          </select>
        </div>
        <div class="col-4">
          <button
            class="btn btn-sm btn-outline-primary float-right"
            @click="showModal = !showModal"
          >Tambah Alamat</button>
        </div>
      </div>
    </div>
    <div class="card-body">
      <div class="font-weight-bold">{{ buyer.name }} ({{ buyer.phone }})</div>
      <div>
        <ul>
          <div v-if="address != null">
            <li> {{ address.detail }} </li>
            <li> {{ address.subdistrict_name }} {{ ", " + address.city_name }} {{ ", " + address.province_name }}</li>
            <li> Kode Pos {{ address.postal_code }} </li>
          </div>
        </ul>
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
      buyer: {}
    };
  },
  components: {
    Modal
  },
  methods: {
    getAddress() {
      window.axios
        .get("/profile/" + this.userId)
        .then(res => {
          this.addresses = JSON.parse(res.data.address);
          this.buyer = res.data;
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
