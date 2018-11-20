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
               <input type="text" class="form-control" v-model="username" required>
            </div>

            <div class="form-group">
                <label class="label">E-mail</label>
                <input type="text" class="form-control" v-model="email" required>
            </div>

            <div class="form-group">
                <label class="label">Nama</label>
                <input type="text" class="form-control" v-model="nama" required>
            </div>

            <div class="form-group">
              <label class="label">Alamat</label>  
              <label class="label">Provinsi</label>
              <select class="form-control" @change="getCities" v-model="selectedProvince">
                <option v-for="province in provicies" :value="province">{{ province.name }}</option>
              </select>
            </div>
            <div class="form-group">
              <label class="label">Kota / Kabupaten</label>
              <select class="form-control" @change="getSubdistricts" v-model="selectedCity">
                <option v-for="city in cities" :value="city">{{ city.name }}</option>
              </select>
            </div>
            <div class="form-group">
              <label class="label">Kecamatan</label>
              <select class="form-control" v-model="selectedSubdistrict">
                <option
                  v-for="subdistrict in subdistricts"
                  :value="subdistrict"
                >{{ subdistrict.subdistrict_name }}</option>
              </select>
            </div>
            <div class="form-group">
              <label class="label">Alamat Rinci</label>
              <textarea v-model="addressDetail" class="form-control" rows="10"></textarea>
            </div>

            <div class="form-group">
                <label class="label">Phone</label>
                <input type="text" class="form-control" v-model="phone" required>
            </div>
            
            <div class="form-group">
                <label class="label">Gender</label>
                <input type="text" class="form-control" v-model="gender" required>
            </div>

            <div class="form-group">
                <label class="label">Photo</label>
                <input type="text" class="form-control" v-model="photo" required>
            </div>

            <div class="form-group">
                <label class="label">Birthday</label>
                <input type="text" class="form-control" v-model="birthday" required>
            </div>

            <div class="form-group">
                <label class="label">Password</label>
                <input id = "password" type="password" class="form-control" v-model="password" required>
            </div>

            <div class="form-group">
                <label class="label">Confirm Password</label>
                <input id = "password-confirm" type="password-confirm" class="form-control" v-model="passwordconfirm" required>
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
      selectedCity: "",
      selectedProvince: "",
      selectedSubdistrict: "",
      addressDetail: "",
      addressName: "",
      username: "",
      email: "",
      nama: "",
      phone: "",
      gender: "",
      photo: "",
      birthday: "",
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
        .get("/api/cities?pro_id=" + this.selectedProvince.id)
        .then(res => {
          this.cities = res.data;
        })
        .catch(err => {
          console.log(err);
        });
    },
    getSubdistricts() {
      window.axios
        .get("/api/subdistricts?city_id=" + this.selectedCity.id)
        .then(res => {
          this.subdistricts = res.data.rajaongkir.results;
        })
        .catch(err => {
          console.log(err);
        });
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
        username: this.username,
        email : this.email,
        nama : this.nama,
        phone : this.phone,
        gender : this.gender,
        photo : this.photo,
        birthday : this.birthday,
        postalCode: this.selectedCity.postal_code
      };

      window.axios
        .post("/profile/edit/" + payload)
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

