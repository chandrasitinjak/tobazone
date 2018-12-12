<template>
  <div class="col-12 col-md-12 col-lg-12">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header align-items-center border-0">
          <h5 class="modal-title font-light" id="exampleModalLabel">Tambah Alamat</h5>
          <button type="button" class="close" @click="dismiss" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label class="label">Nama Alamat</label>
              <input type="text" class="form-control" v-model="addressName" aria-describedby="namaalamat">
              <small id="namaalamat" class="form-text text-muted">
                Contoh: AlamatRumah, Kantor, Kampus
              </small>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label class="label">Provinsi</label>
                  <select class="form-control" @change="getCities" v-model="selectedProvince">
                    <option v-for="province in provicies" :value="province">{{ province.name }}</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label class="label">Kota / Kabupaten</label>
                  <select class="form-control" @change="getSubdistricts" v-model="selectedCity">
                    <option v-for="city in cities" :value="city">{{ city.name }}</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label class="label">Kecamatan</label>
                  <select class="form-control" v-model="selectedSubdistrict">
                    <option
                        v-for="subdistrict in subdistricts"
                        :value="subdistrict"
                    >{{ subdistrict.subdistrict_name }}
                    </option>
                  </select>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="label">Alamat Rinci</label>
              <textarea v-model="addressDetail" aria-describedby="alamatrinci" class="form-control" rows="3"
                        placeholder="Cantumkan patokan alamat, nama panggilan penerima, dan no. telp alternatif (contoh: Rumah sebelah minimarket 'Fruit Mart', panggilan penerima: Pak Budi, no. telp lain:  081234567890)."></textarea>
              <small id="alamatrinci" class="form-text text-muted"> Diisi dengan petunjuk lokasi untuk kurir</small>
            </div>
          </form>
        </div>
        <div class="modal-footer" style="border: none">
          <button type="button" class="btn btn-primary btn-block" v-on:click="addAddress">Tambah Alamat</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import EventBus from "../../eventBus";

export default {
  props: ["userId"],
  data() {
    return {
      provicies: [],
      cities: [],
      subdistricts: [],
      selectedCity: "",
      selectedProvince: "",
      selectedSubdistrict: "",
      addressDetail: "",
      addressName: ""
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
        postalCode: this.selectedCity.postal_code
      };

      window.axios
        .post("/profile/edit/" + this.userId, payload)
        .then(res => {
          this.provicies = res.data;
          window.location = "/shipping"
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
