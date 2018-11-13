<template>
  <div class="" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <div class="pull-left">
            <h3 class="box-title"> Tambah Alamat </h3>
          </div>
        </div>
        
        <div class="modal-body">
          <label class="label"> Nama Alamat </label>
          <input type="text" class="form-control" v-model="addressName">
        </div>

        <div class="modal-body">
          <label class="label"> Provinsi </label>
          <select class="form-control" @change="getCities" v-model="selectedProvince">
            <option v-for="province in provicies" :value=province> {{ province.name }} </option>
          </select>
        </div>

        <div class="modal-body">
          <label class="label"> Kota / Kabupaten </label>
          <select class="form-control" @change="getSubdistricts" v-model="selectedCity">
            <option v-for="city in cities" :value=city> {{ city.name }} </option>
          </select>
        </div>

        <div class="modal-body">
          <label class="label"> Kecamatan </label>
          <select class="form-control" v-model="selectedSubdistrict">
            <option v-for="subdistrict in subdistricts" :value=subdistrict> {{ subdistrict.subdistrict_name }} </option>
          </select>
        </div>

        <div class="modal-body">
          <label class="label"> Alamat Rinci </label>
          <textarea v-model="addressDetail" class="form-control"> </textarea>
        </div>
            
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary">Cancel</button>
          <button type="button" class="btn btn-primary" v-on:click="addAddress">Add</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import https from "https";

export default {
  props: ['userId'],
  data() {
    return {
      provicies: [],
      cities: [],
      subdistricts: [],
      selectedCity: '',
      selectedProvince: '',
      selectedSubdistrict: '',
      addressDetail: '',
      addressName: '',
    };
  },
  methods: {
    getProvincies() {
      window.axios.get('/api/provincies').then(res => {
        this.provicies = res.data
      }).catch(err => {
        console.log(err)
      })
    },
    getCities() {
      window.axios.get('/api/cities?pro_id=' + this.selectedProvince.id).then(res => {
        this.cities = res.data
      }).catch(err => {
        console.log(err)
      })
    },
    getSubdistricts() {
      window.axios.get('/api/subdistricts?city_id=' + this.selectedCity.id).then(res => {
        this.subdistricts = res.data.rajaongkir.results
      }).catch(err => {
        console.log(err)
      })
    },
    addAddress() {
      let payload = {
        provinceId: this.selectedProvince.id,
        cityId: this.selectedCity.id,
        subdistrictId: this.selectedSubdistrict.subdistrict_id,
        provinceName: this.selectedProvince.name,
        cityName: this.selectedCity.name,
        subdistrictName: this.selectedSubdistrict.subdistrict_name,
        addressDetail: this.addressDetail,
        addressName: this.addressName,
        postalCode: this.selectedCity.postal_code
      };

      console.log(payload);

      window.axios.post('/profile/edit/' + this.userId, payload).then(res => {
        this.provicies = res.data
      }).catch(err => {
        console.log(err)
      })
    }
  },
  mounted() {
    this.getProvincies();
  }
};
</script>

<style>
</style>
