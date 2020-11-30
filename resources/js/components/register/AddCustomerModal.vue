<template>
    <div class="registration">
        <spinner></spinner>
        <div class="row">
            <div class="col-md-12">
                <form>
                    <!--                    <div class="row">-->
                    <!--                        <div class="col-6">-->
                    <!--                            <div class="form-group">-->
                    <!--                                <label class="label">Username</label>-->
                    <!--                                <input type="text" class="form-control form-control-sm" v-model="userCustomer.username"-->
                    <!--                                    v-model.trim="$v.userCustomer.username.$model"-->
                    <!--                                    :class="{'is-invalid':$v.userCustomer.username.$error, 'is-valid':!$v.userCustomer.username.$invalid }">-->
                    <!--                                <div class="valid-feedback">Username sudah valid</div>-->
                    <!--                                <div class="invalid-feedback">-->
                    <!--                                    <span v-if="!$v.userCustomer.username.required">Username tidak boleh kosong</span>-->
                    <!--                                    <span v-if="!$v.userCustomer.username.minLength">Username minimal 8 karakter</span>-->
                    <!--                                </div>-->
                    <!--                            </div>-->
                    <!--                        </div>-->
                    <!--                        <div class="col-6">-->
                    <div class="form-group">
                        <label class="label">E-mail</label>
                        <input type="text" class="form-control form-control-sm" v-model="userCustomer.email"
                               v-model.trim="$v.userCustomer.email.$model"
                               :class="{'is-invalid':$v.userCustomer.email.$error, 'is-valid':!$v.userCustomer.email.$invalid }">
                        <div class="valid-feedback">E-mail sudah valid</div>
                        <div class="invalid-feedback">
                            <span v-if="!$v.userCustomer.email.required">E-mail tidak boleh kosong</span>
                            <span v-if="!$v.userCustomer.email.email">Masukkan email dengan format
                                        example@mail.com</span>
                        </div>
                    </div>
                    <!--                        </div>-->
                    <!--                    </div>-->

                    <div class="form-group">
                        <label class="label">Nama Lengkap</label>
                        <input type="text" class="form-control form-control-sm" v-model="userCustomer.name"
                               v-model.trim="$v.userCustomer.name.$model"
                               :class="{'is-invalid':$v.userCustomer.name.$error, 'is-valid':!$v.userCustomer.name.$invalid }">
                        <div class="valid-feedback">Nama Lengkap sudah valid</div>
                        <div class="invalid-feedback">
                            <span v-if="!$v.userCustomer.name.required">Nama Lengkap tidak boleh kosong</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="label">Nomor Telepon</label>
                        <input type="number" class="form-control form-control-sm" v-model="userCustomer.phone"
                               v-model.trim="$v.userCustomer.phone.$model"
                               :class="{'is-invalid':$v.userCustomer.phone.$error, 'is-valid':!$v.userCustomer.phone.$invalid }">
                        <div class="valid-feedback">Nomor Telepon sudah valid</div>
                        <div class="invalid-feedback">
                            <span v-if="!$v.userCustomer.phone.required">Nomor Telepon tidak boleh kosong</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="label">Jenis Kelamin</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="male" value="Male"
                                   v-model="userCustomer.gender" v-model.trim="$v.userCustomer.gender.$model"
                                   :class="{'is-invalid':$v.userCustomer.gender.$error, 'is-valid':!$v.userCustomer.gender.$invalid }">
                            <label class="form-check-label" for="male">Laki-laki</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="female" value="Female"
                                   v-model="userCustomer.gender" v-model.trim="$v.userCustomer.gender.$model"
                                   :class="{'is-invalid':$v.userCustomer.gender.$error, 'is-valid':!$v.userCustomer.gender.$invalid }">
                            <label class="form-check-label" for="female">Perempuan</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="label">Alamat</label>
                        <input type="text" class="form-control form-control-sm" v-model="userCustomer.addressName"
                               v-model.trim="$v.userCustomer.addressName.$model"
                               :class="{'is-invalid':$v.userCustomer.addressName.$error, 'is-valid':!$v.userCustomer.addressName.$invalid }"
                               placeholder="Contoh: Rumah, Kantor">
                        <div class="valid-feedback">Alamat sudah valid</div>
                        <div class="invalid-feedback">
                            <span v-if="!$v.userCustomer.addressName.required">Alamat tidak boleh kosong</span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label class="label">Provinsi</label>
                                <select class="form-control" @change="getCities"
                                    v-model="userCustomer.selectedProvince"
                                    v-model.trim="$v.userCustomer.selectedProvince.$model"
                                    :class="{'is-invalid':$v.userCustomer.selectedProvince.$error, 'is-valid':!$v.userCustomer.selectedProvince.$invalid }">
                                    <option v-for="province in provicies" :key="province.name" :value="province">
                                        {{ province.name }}
                                    </option>
                                </select>
                                <div class="valid-feedback">Provisi sudah valid</div>
                                <div class="invalid-feedback">
                                    <span v-if="!$v.userCustomer.selectedProvince.required">Provinsi tidak boleh
                                        kosong</span>
                                </div>

                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label class="label">Kota/Kabupaten</label>
                                <select class="form-control " @change="getSubdistricts"
                                    v-model="userCustomer.selectedCity"
                                    v-model.trim="$v.userCustomer.selectedCity.$model"
                                    :class="{'is-invalid':$v.userCustomer.selectedCity.$error, 'is-valid':!$v.userCustomer.selectedCity.$invalid }">
                                    <option v-for="city in cities" :key="city.name" :value="city">{{ city.name }}
                                    </option>
                                </select>
                                <div class="valid-feedback">Kota/Kabupaten sudah valid</div>
                                <div class="invalid-feedback">
                                    <span v-if="!$v.userCustomer.selectedCity.required">Kota/Kabupaten tidak boleh
                                        kosong</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label class="label">Kecamatan</label>
                                <select class="form-control " v-model="userCustomer.selectedSubdistrict"
                                    v-model.trim="$v.userCustomer.selectedSubdistrict.$model"
                                    :class="{'is-invalid':$v.userCustomer.selectedSubdistrict.$error, 'is-valid':!$v.userCustomer.selectedSubdistrict.$invalid }">
                                    <option v-for="subdistrict in subdistricts" :key="subdistrict.subdistrict_name"
                                            :value="subdistrict">{{ subdistrict.subdistrict_name }}
                                    </option>
                                </select>
                                <div class="valid-feedback">Kecamatan sudah valid</div>
                                <div class="invalid-feedback">
                                    <span v-if="!$v.userCustomer.selectedSubdistrict.required">Kecamatan tidak boleh
                                        kosong</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="label">Alamat Rinci</label>
                        <textarea v-model="userCustomer.addressDetail" class="form-control form-control-sm" rows="3"
                                  placeholder="Contoh: Jalan Melati Nomor 23"
                                  v-model.trim="$v.userCustomer.addressDetail.$model"
                                  :class="{'is-invalid':$v.userCustomer.addressDetail.$error, 'is-valid':!$v.userCustomer.addressDetail.$invalid }"></textarea>
                        <div class="valid-feedback">Alamat Rinci sudah valid</div>
                        <div class="invalid-feedback">
                            <span v-if="!$v.userCustomer.addressDetail.required">Alamat Rinci tidak boleh kosong</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="label">Tanggal Lahir</label>
                        <input type="date" class="form-control form-control-sm" v-model="userCustomer.birthday"
                               v-model.trim="$v.userCustomer.birthday.$model"
                               :class="{'is-invalid':$v.userCustomer.birthday.$error, 'is-valid':!$v.userCustomer.birthday.$invalid }">
                        <div class="valid-feedback">Tanggal Lahir sudah valid</div>
                        <div class="invalid-feedback">
                            <span v-if="!$v.userCustomer.birthday.required">Tanggal Lahir tidak boleh kosong</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="label">Kata Sandi</label>
                        <input type="password" class="form-control form-control-sm" v-model="userCustomer.password"
                               v-model.trim="$v.userCustomer.password.$model" :class="{'is-invalid':$v.userCustomer.password.$error,
                            'is-valid':!$v.userCustomer.password.$invalid}">
                        <div class="valid-feedback">Kata Sandi sudah valid</div>
                        <div class="invalid-feedback">
                            <span v-if="!$v.userCustomer.password.required">Kata Sandi tidak boleh kosong</span>
                            <span v-if="!$v.userCustomer.password.minLength">Kata Sandi minimal 8 karakter</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="label">Konfirmasi Kata Sandi</label>
                        <input type="password" class="form-control form-control-sm"
                               v-model="userCustomer.passwordconfirm"
                               v-model.trim="$v.userCustomer.passwordconfirm.$model"
                               :class="{'is-invalid':$v.userCustomer.passwordconfirm.$error,
                            'is-valid':(userCustomer.password!='')?!$v.userCustomer.passwordconfirm.$invalid:''}">
                        <div class="valid-feedback">Konfirmasi Kata Sandi sudah valid</div>
                        <div class="invalid-feedback">
                            <span v-if="!$v.userCustomer.passwordconfirm.sameAsPassword">Kata Sandi dan Konfirmasi
                                Kata Sandi tidak sesuai</span>
                        </div>
                    </div>

                    <button type="button" class="btn essence-btn btn-block" v-on:click="addCustomer">Daftar</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    import {
        required,
        minLength,
        email,
        sameAs
    } from "vuelidate/lib/validators"
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
                    // username: "",
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
                EventBus.$emit("SPINNER", true);
                window.axios
                    .get("/api/cities?pro_id=" + this.userCustomer.selectedProvince.id)
                    .then(res => {
                        this.cities = res.data;
                        EventBus.$emit("SPINNER", false);
                    })
                    .catch(err => {
                        console.log(err);
                        EventBus.$emit("SPINNER", false);
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
                        // username: this.userCustomer.username,
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
                            this.$swal({
                                title: "Pendaftaran Berhasil",
                                icon: "success"
                            });
                            window.location = "/";
                        })
                        .catch(err => {
                            console.log(err);
                            EventBus.$emit("SPINNER", false);

                            let customerAttributes = {
                                "selectedCity": "Kota/Kabupaten",
                                "selectedProvince": "Provinsi",
                                "selectedSubdistrict": "Kecamatan",
                                "addressDetail": "Alamat Rinci Toko",
                                "addressName": "Alamat",
                                // "username": "Username",
                                "email": "E-mail",
                                "name": "Nama Lengkap",
                                "phone": "Nomor Telepon",
                                "gender": "Jenis Kelamin",
                                "photo": "Foto",
                                "birthday": "Tanggal Lahir",
                                "password": "Kata Sandi",
                                "passwordconfirm": "Konfirmasi Kata Sandi"
                            };

                            let errMessage = "Terjadi kesalahan.";
                            if (err.response.status == 422) {
                                let errKeys = Object.keys(err.response.data.errors);
                                let errKey = "";
                                if (errKeys.length > 0) {
                                    errKey = errKeys[0];
                                }

                                errMessage = "Data yang diberikan tidak valid.";
                                if (errKey != "") {
                                    if (errKey == "email" /*|| errKey == "username"*/) {
                                        errMessage = errMessage + " " + customerAttributes[errKey] +
                                            " tidak valid atau telah terdaftar.";
                                    } else {
                                        errMessage = customerAttributes[errKey] +
                                            " tidak valid.";
                                    }
                                }
                            }

                            this.$swal({
                                title: "Pendaftaran Gagal",
                                icon: "error",
                                text: errMessage
                            });
                        });
                }
            }
        },

        validations: {
            userCustomer: {
                // username: {
                //     required,
                //     minLength: minLength(8)
                // },
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
                birthday: {
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
                    sameAsPassword: sameAs('password')
                },
            }
        },
        mounted() {
            this.getProvincies();
        }
    };

</script>
