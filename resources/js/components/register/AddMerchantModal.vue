<template>
  <div class="registration">
    <spinner> </spinner>
    <div class>
      <div class="row">
        <div class="col-md-12">
          <form>
            <label class="label text-muted">Pemilik Toko (Merchant)</label>
            <br>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label class="label">Username Merchant</label>
                  <input
                    type="text"
                    class="form-control form-control-sm"
                    v-model="userMerchant.username"
                    placeholder
                    required
                  >
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label class="label">E-mail Merchant</label>
                  <input
                    type="text"
                    class="form-control form-control-sm"
                    v-model="userMerchant.email"
                    required
                  >
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="label">Phone</label>
              <input
                type="text"
                class="form-control form-control-sm"
                v-model="userMerchant.phone"
                required
              >
            </div>
            <div class="form-group mt">
              <label class="label">Gender</label>
              <br>

              <label form="male">
                <input
                  type="radio"
                  id="male"
                  value="Male"
                  class="form-control form-control-sm"
                  v-model="userMerchant.gender"
                >Male
              </label>
              <label form="female">
                <input
                  type="radio"
                  id="female"
                  value="Female"
                  class="form-control form-control-sm"
                  v-model="userMerchant.gender"
                >Female
              </label>
            </div>
            <div class="form-group">
              <label class="label">Birthday</label>
              <input
                type="date"
                class="form-control form-control-sm"
                v-model="userMerchant.birthday"
                required
              >
            </div>

            <div class="form-group">
              <label class="label">Nama Toko</label>
              <input
                type="text"
                class="form-control form-control-sm"
                v-model="userMerchant.name"
                required
              >
            </div>
            <label class="label text-muted">Alamat Toko</label>
            <br>
            <div class="row">
              <div class="col-4">
                <div class="form-group">
                  <label class="label">Provinsi</label>
                  <select
                    class="form-control form-control-sm"
                    v-on:change="getCities"
                    v-model="userMerchant.selectedProvince"
                  >
                    <option v-for="province in provicies" :value="province">{{ province.name }}</option>
                  </select>
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <label class="label">Kabupaten</label>
                  <select
                    class="form-control form-control-sm"
                    @change="getSubdistricts"
                    v-model="userMerchant.selectedCity"
                  >
                    <option v-for="city in cities" :value="city">{{ city.name }}</option>
                  </select>
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <label class="label">Kecamatan</label>
                  <select
                    class="form-control form-control-sm"
                    v-model="userMerchant.selectedSubdistrict"
                  >
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
              <textarea
                v-model="userMerchant.addressDetail"
                class="form-control form-control-sm"
                rows="3"
              ></textarea>
            </div>

            <div class="form-group">
              <label class="label">Password</label>
              <input
                type="password"
                class="form-control form-control-sm"
                v-model="userMerchant.password"
                required
              >
            </div>

            <div class="form-group">
              <label class="label">Confirm Password</label>
              <input
                type="password"
                class="form-control form-control-sm"
                v-model="userMerchant.passwordconfirm"
                required
              >
            </div>
            <button
              type="button"
              class="btn essence-btn btn-block"
              v-on:click="addMerchant"
            >Register</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import EventBus from "../../eventBus";
import spinner from "../Spinner";

export default {
  components: {
    spinner
  },
  data() {
    return {
      provicies: [],
      cities: [],
      subdistricts: [],
      userMerchant: {
        selectedCity: "",
        selectedProvince: "",
        selectedSubdistrict: "",
        addressDetail: "",
        username: "",
        email: "",
        name: "",
        phone: "",
        photo: "",
        gender: "",
        birthday: "",
        password: "",
        passwordconfirm: ""
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
      EventBus.$emit("SPINNER", true);
      window.axios
        .get("/api/subdistricts?city_id=" + this.userMerchant.selectedCity.id)
        .then(res => {
          this.subdistricts = res.data.rajaongkir.results;
          EventBus.$emit("SPINNER", false);
        })
        .catch(err => {
          console.log(err);
          EventBus.$emit("SPINNER", false);
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
        addressDetail: this.userMerchant.addressDetail,
        addressName: "",
        username: this.userMerchant.username,
        email: this.userMerchant.email,
        name: this.userMerchant.name,
        photo: "",
        phone: this.userMerchant.phone,
        gender: this.userMerchant.gender,
        birthday: this.userMerchant.birthday,
        postalCode: this.userMerchant.selectedCity.postal_code,
        password: this.userMerchant.password,
        password_confirmation: this.userMerchant.passwordconfirm,
        role: "merchant"
      };

      EventBus.$emit("SPINNER", true);
      window.axios
        .post("/register", payload)
        .then(res => {
          EventBus.$emit("SPINNER", false);
          window.location = "/";
        })
        .catch(err => {
          console.log(err);
          EventBus.$emit("SPINNER", false);
        });
    }
  },
  mounted() {
    this.getProvincies();
  }
};
</script>

