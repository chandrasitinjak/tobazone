<template>
  <div class="registration">
    <div class="">
      <div class="row">
        <!--<div class="col-md-7" style="background-color: blue">-->
          <!--<div></div>-->
        <!--</div>-->
        <div class="col-md-12">
          <form>
            <div class="row">
            <div class="col-6">
                <div class="form-group">
                  <label class="label">Username</label>
                  <input type="text" class="form-control form-control-sm" v-model="userCustomer.username" required>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label class="label">E-mail</label>
                  <input type="text" class="form-control form-control-sm" v-model="userCustomer.email" required>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="label">Nama Lengkap</label>
              <input type="text" class="form-control form-control-sm" v-model="userCustomer.name" required>
            </div>
            <div class="form-group">
              <label class="label">Phone</label>
              <input type="text" class="form-control form-control-sm" v-model="userCustomer.phone" required>
            </div>

            <label class="label">Gender</label>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="male" id="male" value="Male" v-model="userCustomer.gender" >
              <label class="form-check-label" for="male">
                Male
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="female" id="female" value="Female" v-model="userCustomer.gender">
              <label class="form-check-label" for="female">
                Female
              </label>
            </div>

            <div class="row">
              <div class="col-4">
                <div class="form-group">
                  <label class="label">Provinsi</label>
                  <select class="form-control form-control-sm" @change="getCities" v-model="userCustomer.selectedProvince">
                    <option v-for="province in provicies" :value="province">{{ province.name }}</option>
                  </select>
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <label class="label">Kota / Kabupaten</label>
                  <select class="form-control form-control-sm" @change="getSubdistricts" v-model="userCustomer.selectedCity">
                    <option v-for="city in cities" :value="city">{{ city.name }}</option>
                  </select>
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <label class="label">Kecamatan</label>
                  <select class="form-control form-control-sm" v-model="userCustomer.selectedSubdistrict">
                    <option
                        v-for="subdistrict in subdistricts"
                        :value="subdistrict"
                    >{{ subdistrict.subdistrict_name }}</option>
                  </select>
                </div>
              </div>
            </div>



            <div class="form-group">
              <label class="label">Alamat Rinci</label>
              <textarea v-model="userCustomer.addressDetail" class="form-control form-control-sm" rows="3"></textarea>
            </div>



            <div class="form-group">
              <label class="label">Birthday</label>
              <input type="date" class="form-control form-control-sm" v-model="userCustomer.birthday" required>
            </div>

            <div class="form-group">
              <label class="label">Password</label>
              <input id = "password" type="password" class="form-control form-control-sm" v-model="userCustomer.password" required>
            </div>

            <div class="form-group">
              <label class="label">Confirm Password</label>
              <input id = "passwordconfirm" type="password" class="form-control form-control-sm" v-model="userCustomer.passwordconfirm" required>
            </div>
            <button type="button" class="btn essence-btn btn-block" v-on:click="addCustomer">Register</button>
          </form>
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
