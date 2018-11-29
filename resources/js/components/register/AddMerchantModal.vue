<template>
  <div>
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header align-items-center border-0">
          <h5 class="modal-title font-light" id="MerchantModal">Merchant</h5>
          <button type="button" class="close" @click="dismiss" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
               <label class="label">Username</label>
               <input type="text" class="form-control" v-model="userMerchant.username" required>
            </div>

            <div class="form-group">
                <label class="label">E-mail</label>
                <input type="text" class="form-control" v-model="userMerchant.email" required>
            </div>

            <div class="form-group">
                <label class="label">Nama</label>
                <input type="text" class="form-control" v-model="userMerchant.name" required>
            </div>

            <div class="form-group">
              <label class="label">Alamat</label>  
              <label class="label">Provinsi</label>
              <select class="form-control" v-on:change="getCities" v-model="userMerchant.selectedProvince">
                <option v-for="province in provicies" :value="province">{{ province.name }}</option>
              </select>
            </div>
            <div class="form-group">
              <label class="label">Kota / Kabupaten</label>
              <select class="form-control" @change="getSubdistricts" v-model="userMerchant.selectedCity">
                <option v-for="city in cities" :value="city">{{ city.name }}</option>
              </select>
            </div>
            <div class="form-group">
              <label class="label">Kecamatan</label>
              <select class="form-control" v-model="userMerchant.selectedSubdistrict">
                <option
                  v-for="subdistrict in subdistricts"
                  :value="subdistrict"
                >{{ subdistrict.subdistrict_name }}</option>
              </select>
            </div>
            
            <div class="form-group">
                <label class="label">Phone</label>
                <input type="text" class="form-control" v-model="userMerchant.phone" required>
            </div>
            
            <div class="form-group">
                <label class="label">Gender</label>
                <label form="male">
                  <input type="radio" id="male" value="Male" class="form-control" v-model="userMerchant.gender" >Male
                </label>
                <label form="female">
                  <input type="radio" id="female" value="Female" class="form-control" v-model="userMerchant.gender" >Female
                </label>
            </div>

            <div class="form-group">
                <label class="label">Photo</label>
                <input type="text" class="form-control" v-model="userMerchant.photo" required>
            </div>

            <div class="form-group">
                <label class="label">Birthday</label>
                <input type="text" class="form-control" v-model="userMerchant.birthday" required>
            </div>

            <div class="form-group">
                <label class="label">Password</label>
                <input id = "password" type="password" class="form-control" v-model="userMerchant.password" required>
            </div>

            <div class="form-group">
                <label class="label">Confirm Password</label>
                <input id = "passwordconfirm" type="password" class="form-control" v-model="userMerchant.passwordconfirm" required>
            </div>

          </form>
        </div>
        <div class="modal-footer" style="border: none">
          <button type="button" class="btn btn-primary btn-block" v-on:click="addMerchant">Register</button>
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
      userMerchant:{      

        selectedCity: "",
        selectedProvince: "",
        selectedSubdistrict: "",
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
      EventBus.$emit("ADD_MERCHANT_MODAL_CLOSED", null);
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
        .get("/api/cities?pro_id=" + this.userMerchant.selectedProvince.id)
        .then(res => {
          this.cities = res.data;
        })
        .catch(err => {
          console.log(err);
        });
    },
    getSubdistricts() {
      window.axios
        .get("/api/subdistricts?city_id=" + this.userMerchant.selectedCity.id)
        .then(res => {
          this.subdistricts = res.data.rajaongkir.results;
        })
        .catch(err => {
          console.log(err);
        });
    },
    addMerchant() {
      let payload = {
        provinceId: this.userMerchant.selectedProvince.id,
        cityId: this.userMerchant.selectedCity.id,
        subdistrictId: this.userMerchant.selectedSubdistrict.subdistrict_id,
        provinceName: this.userMerchant.selectedProvince.name,
        cityName: this.userMerchant.selectedCity.name,
        subdistrictName: this.userMerchant.selectedSubdistrict.subdistrict_name,
        addressDetail: '',
        addressName: '',
        username: this.userMerchant.username,
        email : this.userMerchant.email,
        name : this.userMerchant.name,
        phone : this.userMerchant.phone,
        gender : this.userMerchant.gender,
        photo : '',
        birthday : this.userMerchant.birthday,
        postalCode: this.userMerchant.selectedCity.postal_code,
        password: this.userMerchant.password,
        password_confirmation: this.userMerchant.passwordconfirm,
        role : 'merchant'
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

