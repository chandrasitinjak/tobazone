<template>
    <div class="registration">
        <spinner> </spinner>
        <div class>
            <div class="row">
                <div class="col-md-12">
                    <form>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="label">Username</label>
                                    <input type="text" 
                                    class="form-control form-control-sm" 
                                    v-model="userCustomer.username"
                                      v-model.trim="$v.userCustomer.username.$model"
                                      :class="{'is-invalid':$v.userCustomer.username.$error, 'is-valid':!$v.userCustomer.username.$invalid }">
                                    <div class="valid-feedback">Username is valid</div>
                                    <div class="invalid-feedback">
                                      <span v-if="!$v.userCustomer.username.required">Username is required</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="label">E-mail</label>
                                    <input type="text" 
                                    class="form-control form-control-sm" 
                                    v-model="userCustomer.email"
                                    v-model.trim="$v.userCustomer.email.$model"
                                    :class="{'is-invalid':$v.userCustomer.email.$error, 'is-valid':!$v.userCustomer.email.$invalid }">
                                    <div class="valid-feedback">Email is valid</div>
                                    <div class="invalid-feedback">
                                      <span v-if="!$v.userCustomer.email.required">Email is required</span>
                                      <span v-if="!$v.userCustomer.email.email">Email is invalid</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="label">Nama Lengkap</label>
                            <input type="text" class="form-control form-control-sm" v-model="userCustomer.name"
                            v-model.trim="$v.userCustomer.name.$model"
                            :class="{'is-invalid':$v.userCustomer.name.$error, 'is-valid':!$v.userCustomer.name.$invalid }" >
                            <div class="valid-feedback">Name is valid</div>
                            <div class="invalid-feedback">
                                <span v-if="!$v.userCustomer.name.required">Name is required</span>                                
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="label">Nomor Handphone</label>
                            <input type="number" class="form-control form-control-sm" v-model="userCustomer.phone"
                            v-model.trim="$v.userCustomer.phone.$model"   
                             :class="{'is-invalid':$v.userCustomer.phone.$error, 'is-valid':!$v.userCustomer.phone.$invalid }" >
                            <div class="valid-feedback">phone is valid</div>
                            <div class="invalid-feedback">
                                <span v-if="!$v.userCustomer.phone.required">phone is required</span>                                
                            </div>                                
                        </div>

                        <label class="label">Jenis Kelamin</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="male" value="Male"
                                v-model="userCustomer.gender">
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="female" value="Female"
                                v-model="userCustomer.gender">
                            <label class="form-check-label" for="female">Female</label>
                        </div>                                                

                        <div class="form-group mt-3">
                            <label class="label">Nama Alamat</label>
                            <input type="text" class="form-control form-control-sm" v-model="userCustomer.addressName"
                                v-model.trim="$v.userCustomer.addressName.$model"   
                                :class="{'is-invalid':$v.userCustomer.addressName.$error, 'is-valid':!$v.userCustomer.addressName.$invalid }"
                                placeholder="Cth: Alamat Rumah / Alamat Kantor" >

                            <div class="valid-feedback">Address is valid</div>
                            <div class="invalid-feedback">
                                <span v-if="!$v.userCustomer.addressName.required">Address is required</span>                                
                            </div>                                
                        </div>

                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label class="label">Provinsi</label>
                                    <select class="form-control form-control-sm" @change="getCities"
                                        v-model="userCustomer.selectedProvince"
                                        v-model.trim="$v.userCustomer.selectedProvince.$model"   
                                        :class="{'is-invalid':$v.userCustomer.selectedProvince.$error, 'is-valid':!$v.userCustomer.selectedProvince.$invalid }"
                                        >
                                        <option v-for="province in provicies" :key="province.name" :value="province">
                                            {{ province.name }}</option>
                                    </select>

                                    <div class="valid-feedback">Province is valid</div>
                                    <div class="invalid-feedback">
                                        <span v-if="!$v.userCustomer.selectedProvince.required">Province is required</span>                                
                                    </div>                                

                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label class="label">Kabupaten</label>
                                    <select class="form-control form-control-sm" @change="getSubdistricts"
                                        v-model="userCustomer.selectedCity"
                                        v-model.trim="$v.userCustomer.selectedCity.$model"   
                                        :class="{'is-invalid':$v.userCustomer.selectedCity.$error, 'is-valid':!$v.userCustomer.selectedCity.$invalid }"
                                        >
                                        <option v-for="city in cities" :key="city.name" :value="city">{{ city.name }}
                                        </option>
                                    </select>

                                    <div class="valid-feedback">City is valid</div>
                                    <div class="invalid-feedback">
                                        <span v-if="!$v.userCustomer.selectedCity.required">City is required</span>                                
                                    </div> 
                                    
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label class="label">Kecamatan</label>
                                    <select class="form-control form-control-sm"
                                        v-model="userCustomer.selectedSubdistrict"
                                        v-model.trim="$v.userCustomer.selectedSubdistrict.$model"   
                                        :class="{'is-invalid':$v.userCustomer.selectedSubdistrict.$error, 'is-valid':!$v.userCustomer.selectedSubdistrict.$invalid }"
                                        >
                                        <option v-for="subdistrict in subdistricts" :key="subdistrict.subdistrict_name"
                                            :value="subdistrict">{{ subdistrict.subdistrict_name }}</option>
                                    </select>
                                    <div class="valid-feedback">Subdistrict is valid</div>
                                    <div class="invalid-feedback">
                                        <span v-if="!$v.userCustomer.selectedSubdistrict.required">Subdistrict is required</span>                                
                                    </div> 
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="label">Alamat Rinci</label>
                            <textarea v-model="userCustomer.addressDetail" class="form-control form-control-sm" rows="3"
                                placeholder="Cth: Jalan Melati Nomor 23"
                                v-model.trim="$v.userCustomer.addressDetail.$model"   
                                :class="{'is-invalid':$v.userCustomer.addressDetail.$error, 'is-valid':!$v.userCustomer.addressDetail.$invalid }"
                                ></textarea>
                            <div class="valid-feedback">Address is valid</div>
                            <div class="invalid-feedback">
                                <span v-if="!$v.userCustomer.addressDetail.required">Address is required</span>                                
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="label">Birthday</label>
                            <input type="date" class="form-control form-control-sm" v-model="userCustomer.birthday"
                            v-model.trim="$v.userCustomer.birthday.$model"   
                            :class="{'is-invalid':$v.userCustomer.birthday.$error, 'is-valid':!$v.userCustomer.birthday.$invalid }"
                            >
                            <div class="valid-feedback">success</div>
                            <div class="invalid-feedback">
                              <span v-if="!$v.userCustomer.birthday.required">Password is required</span>                              
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="label">Password</label>
                            <input type="password" class="form-control form-control-sm" v-model="userCustomer.password"
                                v-model.trim="$v.userCustomer.password.$model" :class="{'is-invalid':$v.userCustomer.password.$error, 
                                'is-valid':!$v.userCustomer.password.$invalid}">
                            <div class="valid-feedback">Your password is valid</div>
                            <div class="invalid-feedback">
                              <span v-if="!$v.userCustomer.password.required">Password is required</span>
                              <span v-if="!$v.userCustomer.password.mingLength">Password must be at least 8 characters</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="label">Confirm Password</label>
                            <input type="password" class="form-control form-control-sm" v-model="userCustomer.passwordconfirm"
                              v-model.trim="$v.userCustomer.passwordconfirm.$model" :class="{'is-invalid':$v.userCustomer.passwordconfirm.$error, 
                                'is-valid':!$v.userCustomer.passwordconfirm.$invalid}">
                            <div class="valid-feedback">Password has been confirmed</div>
                            <div class="invalid-feedback">
                              <span v-if="!$v.userCustomer.password.required">Confirm Password is required</span>
                              <span v-if="!$v.userCustomer.password.sameAs">Password must be match</span>
                            </div>
                        </div>
                        <button type="button" class="btn essence-btn btn-block"
                            v-on:click="addCustomer">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {required, minLength, email, sameAs} from "vuelidate/lib/validators"
    import EventBus from "../../eventBus";
    import spinner from "../Spinner"

    export default {
        components: {
            spinner
        },
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
                    passwordconfirm: ""
                }
            };
        },
        methods: {
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
                EventBus.$emit("SPINNER", true);
                window.axios
                    .get("/api/subdistricts?city_id=" + this.userCustomer.selectedCity.id)
                    .then(res => {
                        this.subdistricts = res.data.rajaongkir.results;
                        EventBus.$emit("SPINNER", false);
                    })
                    .catch(err => {
                        console.log(err);
                        EventBus.$emit("SPINNER", false);
                    });
            },
            addCustomer() {
              this.$v.$touch()
              if (!this.$v.$invalid) {
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
                    email: this.userCustomer.email,
                    name: this.userCustomer.name,
                    phone: this.userCustomer.phone,
                    gender: this.userCustomer.gender,
                    photo: this.userCustomer.photo,
                    birthday: this.userCustomer.birthday,
                    postalCode: this.userCustomer.selectedCity.postal_code,
                    password: this.userCustomer.password,
                    password_confirmation: this.userCustomer.passwordconfirm,
                    role: "customer"
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
          userCustomer: {
            username: {
              required,
              minLength: minLength(8)
            },
            email: {
              required,
              email
            },
            name: {
              required,
            },
            phone: {
              required,  
            },
            addressName: {
              required,  
            },
            addressDetail: {
              required,
            },
            birthday : {
              required,
            },
            selectedProvince: {
              required,
            },
            selectedCity: {
              required,
            },
            selectedSubdistrict: {
              required,
            },
            gender: {
               required,
            },
            password: {
              required,
              minLength: minLength(8)
            },
            passwordconfirm: {
              required,
              sameAsPassword: sameAs('password')
            },

          }
        },
        mounted() {
            this.getProvincies();
        }
    };

</script>
