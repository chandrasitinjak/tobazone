<template>
  <div class="row">
    <div class="col-md-12 mb-3">
      <label for="select">Pilih Alamat Pengiriman</label>
      <select v-model="address" @change="publishAddressChoosenEvent">
        <option v-for="address in addresses" :value=JSON.parse(address)> {{ JSON.parse(address).name }} </option>                        
      </select>
    </div>
    
    <div class="col-md-12 mb-3">   
      <div class="contact-info card p-4">
        <p> {{ address.name }} </p>
        {{ address.detail }}, {{ address.subdistrict_name}}, {{ address.city_name }}, {{ address.province_name }}
        <button @click="showModal = !showModal" class="btn btn-sm btn-info col-3 mt-2 pull-right"> Tambah Alamat </button>
      </div>
    </div>

    <div v-if="showModal">
      <modal v-bind:user-id=userId />
    </div>
  </div>
</template>

<script>
import Modal from './AddAddressModal'
import EventBus from '../../eventBus'

export default {
  props: ['userId'],
  data() {
    return {
      showModal: false,
      addresses: [],
      address: {},
    }
  },
  components: {
    Modal
  },
  methods: {
    getAddress() {
      window.axios.get('/profile/' + this.userId).then(res => {
        this.addresses = JSON.parse(res.data.address)
      }).catch(err => {
        console.log(err)
      })
    },
    publishAddressChoosenEvent() {
      EventBus.$emit('ADDRESS_CHOOSEN', this.address)
    }
  },
  mounted() {
    this.getAddress()
  },
};
</script>

<style>
</style>
