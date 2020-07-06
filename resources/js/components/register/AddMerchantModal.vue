<template>
  <div class="registration">
    <spinner></spinner>
    <div class>
      <div class="row">
        <div class="col-md-12">
          <form>
            <label class="label text-muted">Pemilik Toko (Merchant)</label>
            <br />
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label class="label">Username</label>
                  <input
                    type="text"
                    class="form-control form-control-sm"
                    v-model="userMerchant.username"
                    v-model.trim="$v.userMerchant.username.$model"
                    :class="{'is-invalid':$v.userMerchant.username.$error, 'is-valid':!$v.userMerchant.username.$invalid }"
                  />
                  <div class="valid-feedback">Username is valid</div>
                  <div class="invalid-feedback">
                    <span v-if="!$v.userMerchant.username.required">Username is required</span>
                  </div>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label class="label">E-mail</label>
                  <input
                    type="text"
                    class="form-control form-control-sm"
                    v-model="userMerchant.email"
                    v-model.trim="$v.userMerchant.email.$model"
                    :class="{'is-invalid':$v.userMerchant.email.$error, 'is-valid':!$v.userMerchant.email.$invalid }"
                  />
                  <div class="valid-feedback">Email is valid</div>
                  <div class="invalid-feedback">
                    <span v-if="!$v.userMerchant.email.required">Email is required</span>
                    <span v-if="!$v.userMerchant.email.email">Email is invalid</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="label">Phone</label>
              <input
                type="number"
                class="form-control form-control-sm"
                v-model="userMerchant.phone"
                v-model.trim="$v.userMerchant.phone.$model"
                :class="{'is-invalid':$v.userMerchant.phone.$error, 'is-valid':!$v.userMerchant.phone.$invalid }"
              />

              <div class="valid-feedback">phone is valid</div>
              <div class="invalid-feedback">
                <span v-if="!$v.userMerchant.phone.required">phone is required</span>
              </div>
            </div>

            <div class="form-group mt">            
              <label class="label">Jenis Kelamin</label>
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="male" value="Male"
                      v-model="userMerchant.gender">
                  <label class="form-check-label" for="male">Pria</label>
              </div>
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="female" value="Female"
                      v-model="userMerchant.gender">
                  <label class="form-check-label" for="female">Wanita</label>
              </div>


            </div>
            <div class="form-group">
              <label class="label">Birthday</label>
              <input
                type="date"
                class="form-control form-control-sm"
                v-model="userMerchant.birthday"
                v-model.trim="$v.userMerchant.birthday.$model"
                :class="{'is-invalid':$v.userMerchant.birthday.$error, 'is-valid':!$v.userMerchant.birthday.$invalid }"
              />

              <div class="valid-feedback">success</div>
              <div class="invalid-feedback">
                <span v-if="!$v.userMerchant.birthday.required">Password is required</span>
              </div>
            </div>

            <div class="form-group">
              <label class="label">Nama Toko</label>
              <input
                type="text"
                class="form-control form-control-sm"
                v-model="userMerchant.name"
                v-model.trim="$v.userMerchant.name.$model"
                :class="{'is-invalid':$v.userMerchant.name.$error, 'is-valid':!$v.userMerchant.name.$invalid }"
              />

              <div class="valid-feedback">Name is valid</div>
              <div class="invalid-feedback">
                <span v-if="!$v.userMerchant.name.required">Name is required</span>
              </div>
            </div>
            <label class="label text-muted">Alamat Toko</label>
            <br />
            <div class="row">
              <div class="col-4">
                <div class="form-group">
                  <label class="label">Provinsi</label>
                  <select
                    class="form-control form-control-sm"
                    v-on:change="getCities"
                    v-model="userMerchant.selectedProvince"
                    v-model.trim="$v.userMerchant.selectedProvince.$model"
                    :class="{'is-invalid':$v.userMerchant.selectedProvince.$error, 'is-valid':!$v.userMerchant.selectedProvince.$invalid }"
                  >
                    <option v-for="province in provicies" :value="province">{{ province.name }}</option>
                  </select>

                  <div class="valid-feedback">Province is valid</div>
                  <div class="invalid-feedback">
                    <span v-if="!$v.userMerchant.selectedProvince.required">Province is required</span>
                  </div>
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <label class="label">Kabupaten</label>
                  <select
                    class="form-control form-control-sm"
                    @change="getSubdistricts"
                    v-model="userMerchant.selectedCity"
                    v-model.trim="$v.userMerchant.selectedCity.$model"
                    :class="{'is-invalid':$v.userMerchant.selectedCity.$error, 'is-valid':!$v.userMerchant.selectedCity.$invalid }"
                  >
                    <option v-for="city in cities" :value="city">{{ city.name }}</option>
                  </select>

                  <div class="valid-feedback">City is valid</div>
                  <div class="invalid-feedback">
                    <span v-if="!$v.userMerchant.selectedCity.required">City is required</span>
                  </div>
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <label class="label">Kecamatan</label>
                  <select
                    class="form-control form-control-sm"
                    v-model="userMerchant.selectedSubdistrict"
                    v-model.trim="$v.userMerchant.selectedSubdistrict.$model"
                    :class="{'is-invalid':$v.userMerchant.selectedSubdistrict.$error, 'is-valid':!$v.userMerchant.selectedSubdistrict.$invalid }"
                  >
                    <option
                      v-for="subdistrict in subdistricts"
                      :value="subdistrict"
                    >{{ subdistrict.subdistrict_name }}</option>
                  </select>

                  <div class="valid-feedback">Subdistrict is valid</div>
                  <div class="invalid-feedback">
                    <span
                      v-if="!$v.userMerchant.selectedSubdistrict.required"
                    >Subdistrict is required</span>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label class="label">Alamat Rinci</label>
              <textarea
                v-model="userMerchant.addressDetail"
                class="form-control form-control-sm"
                rows="3"
                v-model.trim="$v.userMerchant.addressDetail.$model"
                :class="{'is-invalid':$v.userMerchant.addressDetail.$error, 'is-valid':!$v.userMerchant.addressDetail.$invalid }"
              ></textarea>

              <div class="valid-feedback">Address is valid</div>
              <div class="invalid-feedback">
                <span v-if="!$v.userMerchant.addressDetail.required">Address is required</span>
              </div>
            </div>

            <div class="form-group">
              <label class="label">Password</label>
              <input
                type="password"
                class="form-control form-control-sm"
                v-model="userMerchant.password"
                v-model.trim="$v.userMerchant.password.$model"
                :class="{'is-invalid':$v.userMerchant.password.$error,
                                'is-valid':!$v.userMerchant.password.$invalid}"
              />
              <div class="valid-feedback">Your password is valid</div>
              <div class="invalid-feedback">
                <span v-if="!$v.userMerchant.password.required">Password is required</span>
                <span
                  v-if="!$v.userMerchant.password.mingLength"
                >Password must be at least 8 characters</span>
              </div>
            </div>

            <div class="form-group">
              <label class="label">Confirm Password</label>
              <input
                type="password"
                class="form-control form-control-sm"
                v-model="userMerchant.passwordconfirm"
                v-model.trim="$v.userMerchant.passwordconfirm.$model"
                :class="{'is-invalid':$v.userMerchant.passwordconfirm.$error,
                                'is-valid':!$v.userMerchant.passwordconfirm.$invalid}"
              />
              <div class="valid-feedback">Password has been confirmed</div>
              <div class="invalid-feedback">
                <span v-if="!$v.userMerchant.password.required">Confirm Password is required</span>
                <span v-if="!$v.userMerchant.password.sameAs">Password must be match</span>
              </div>
            </div>

            <button type="button" class="btn essence-btn btn-block"
              v-on:click="addMerchant">Register</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
    import { required, minLength, email, sameAs } from "vuelidate/lib/validators";
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
      this.$v.$touch()
      if (!this.$v.$invalid) {
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
          .then(() => {
            EventBus.$emit("SPINNER", false);
            window.location = "/";
          })
          .catch(err => {
            console.log(err);
            EventBus.$emit("SPINNER", false);
          });
      }
    }
  },

  validations: {
    userMerchant: {
      username: {
        required,
        minLength: minLength(8)
      },
      email: {
        required,
        email
      },
      name: {
        required
      },
      phone: {
        required
      },
      addressDetail: {
        required
      },
      birthday: {
        required
      },
      selectedProvince: {
        required
      },
      selectedCity: {
        required
      },
      selectedSubdistrict: {
        required
      },
      gender: {
        required
      },
      password: {
        required,
        minLength: minLength(8)
      },
      passwordconfirm: {
        required,
        sameAsPassword: sameAs("password")
      }
    }
  },
  mounted() {
    this.getProvincies();
  }
};
</script>
