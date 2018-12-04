<template>
  <div>
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header align-items-center border-0">
          <h5 class="modal-title font-light" id="CustomerModal">Customer</h5>
          <button type="button" class="close" @click="dismiss" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
               <label class="label">Username</label>
               <input type="text" class="form-control" v-model="userCustomer.username" required>
            </div>

            <div class="form-group">
                <label class="label">E-mail</label>
                <input type="text" class="form-control" v-model="userCustomer.email" required>
            </div>

            <div class="form-group">
                <label class="label">Name</label>
                <input type="text" class="form-control" v-model="userCustomer.name" required>
            </div>

            <div class="form-group">
              <label class="label">Nama Alamat</label>
              <input type="text" class="form-control" v-model="userCustomer.addressName">
            </div>

            <div class="form-group">
              <label class="label">Provinsi</label>
              <select class="form-control" @change="getCities" v-model="userCustomer.selectedProvince">
                <option v-for="province in provicies" :value="province">{{ province.name }}</option>
              </select>
            </div>

            <div class="form-group">
              <label class="label">Kota / Kabupaten</label>
              <select class="form-control" @change="getSubdistricts" v-model="userCustomer.selectedCity">
                <option v-for="city in cities" :value="city">{{ city.name }}</option>
              </select>
            </div>

            <div class="form-group">
              <label class="label">Kecamatan</label>
              <select class="form-control" v-model="userCustomer.selectedSubdistrict">
                <option
                  v-for="subdistrict in subdistricts"
                  :value="subdistrict"
                >{{ subdistrict.subdistrict_name }}</option>
              </select>
            </div>

            <div class="form-group">
              <label class="label">Alamat Rinci</label>
              <textarea v-model="userCustomer.addressDetail" class="form-control" rows="10"></textarea>
            </div>

            <div class="form-group">
                <label class="label">Phone</label>
                <input type="text" class="form-control" v-model="userCustomer.phone" required>
            </div>
            
            <label class="label">Gender</label>
            <div class="form-group">
                <label form="male">
                  <input type="radio" id="male" value="Male" class="form-control" v-model="userCustomer.gender" >Male
                </label>
                <label form="female">
                  <input type="radio" id="female" value="Female" class="form-control" v-model="userCustomer.gender" >Female
                </label>
            </div>
            
            <div class="form-group">
                <label class="label">Birthday</label>
                <input type="text" class="form-control" v-model="userCustomer.birthday" required>
            </div>

            <div class="form-group">
                <label class="label">Password</label>
                <input id = "password" type="password" class="form-control" v-model="userCustomer.password" required>
            </div>

            <div class="form-group">
                <label class="label">Confirm Password</label>
                <input id = "passwordconfirm" type="password" class="form-control" v-model="userCustomer.passwordconfirm" required>
            </div>

          </form>
        </div>
        <div class="modal-footer" style="border: none">
          <button type="button" class="btn btn-primary btn-block" v-on:click="addCustomer">Register</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import EventBus from "../../eventBus";

export default {
  data() {
    return {
      provicies: [],
      cities: [],
      subdistricts: [],
      userCustomer: {
        selectedCity: "",
        selectedProvince: "",
        selectedSubdistrict: "",
        addressDetail: "",
        addressName: "",
        username: "",
        email: "",
        name: "",
        phone: "",
        gender: "",
        photo: "",
        birthday: "",
        password: "",
        passwordconfirm: "",
      }
    };
  },
  methods: {
    dismiss() {
      EventBus.$emit("ADD_ADDRESS_MODAL_CLOSED", null);
    },
    getProvincies() {
      window.axios
        .get("/api/provincies")
        .then(res => {
          this.provicies = res.data;
        })
        .catch(err => {
          console.log(err);
        });
    },
    getCities() {
      window.axios
        .get("/api/cities?pro_id=" + this.userCustomer.selectedProvince.id)
        .then(res => {
          this.cities = res.data;
        })
        .catch(err => {
          console.log(err);
        });
    },
    getSubdistricts() {
      window.axios
        .get("/api/subdistricts?city_id=" + this.userCustomer.selectedCity.id)
        .then(res => {
          this.subdistricts = res.data.rajaongkir.results;
        })
        .catch(err => {
          console.log(err);
        });
    },
    addCustomer() {
      let payload = {
        provinceId: this.userCustomer.selectedProvince.id,
        cityId: this.userCustomer.selectedCity.id,
        subdistrictId: this.userCustomer.selectedSubdistrict.subdistrict_id,
        provinceName: this.userCustomer.selectedProvince.name,
        cityName: this.userCustomer.selectedCity.name,
        subdistrictName: this.userCustomer.selectedSubdistrict.subdistrict_name,
        addressDetail: this.userCustomer.addressDetail,
        addressName: this.userCustomer.addressName,
        username: this.userCustomer.username,
        email : this.userCustomer.email,
        name : this.userCustomer.name,
        phone : this.userCustomer.phone,
        gender : this.userCustomer.gender,
        photo : this.userCustomer.photo,
        birthday : this.userCustomer.birthday,
        postalCode: this.userCustomer.selectedCity.postal_code,
        password: this.userCustomer.password,
        password_confirmation: this.userCustomer.passwordconfirm,
        role : 'customer'
      };

      window.axios
        .post("/register", payload)
        .then(res => {
          this.provicies = res.data;
          this.dismiss()
        })
        .catch(err => {
          console.log(err);
      });
    }
  },
  mounted() {
    this.getProvincies();
  }
};
</script>

<style>
</style>
