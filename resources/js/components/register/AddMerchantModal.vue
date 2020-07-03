<template>
    <div class="registration">
        <spinner></spinner>
        <div class="row">
            <div class="col-md-12">
                <form>
                    <label class="label text-muted">Pemilik Toko (Merchant)</label>
                    <br />
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="label">Username</label>
                                <input type="text" class="form-control form-control-sm" v-model="userMerchant.username"
                                    v-model.trim="$v.userMerchant.username.$model"
                                    :class="{'is-invalid':$v.userMerchant.username.$error, 'is-valid':!$v.userMerchant.username.$invalid }" />
                                <div class="valid-feedback">Username sudah valid</div>
                                <div class="invalid-feedback">
                                    <span v-if="!$v.userMerchant.username.required">Username tidak boleh kosong</span>
                                    <span v-if="!$v.userMerchant.username.minLength">Username minimal 8 karakter</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label class="label">E-mail</label>
                                <input type="text" class="form-control form-control-sm" v-model="userMerchant.email"
                                    v-model.trim="$v.userMerchant.email.$model"
                                    :class="{'is-invalid':$v.userMerchant.email.$error, 'is-valid':!$v.userMerchant.email.$invalid }" />
                                <div class="valid-feedback">E-mail sudah valid</div>
                                <div class="invalid-feedback">
                                    <span v-if="!$v.userMerchant.email.required">E-mail tidak boleh kosong</span>
                                    <span v-if="!$v.userMerchant.email.email">Masukkan email dengan format
                                        example@mail.com</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="label">Nomor Telepon</label>
                        <input type="number" class="form-control form-control-sm" v-model="userMerchant.phone"
                            v-model.trim="$v.userMerchant.phone.$model"
                            :class="{'is-invalid':$v.userMerchant.phone.$error, 'is-valid':!$v.userMerchant.phone.$invalid }" />
                        <div class="valid-feedback">Nomor Telepon sudah valid</div>
                        <div class="invalid-feedback">
                            <span v-if="!$v.userMerchant.phone.required">Nomor Telepon tidak boleh kosong</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="label">Jenis Kelamin</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="male" value="Male"
                                v-model="userMerchant.gender" v-model.trim="$v.userMerchant.gender.$model"
                                :class="{'is-invalid':$v.userMerchant.gender.$error, 'is-valid':!$v.userMerchant.gender.$invalid }">
                            <label class="form-check-label" for="male">Laki-laki</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="female" value="Female"
                                v-model="userMerchant.gender" v-model.trim="$v.userMerchant.gender.$model"
                                :class="{'is-invalid':$v.userMerchant.gender.$error, 'is-valid':!$v.userMerchant.gender.$invalid }">
                            <label class="form-check-label" for="female">Perempuan</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="label">Tanggal Lahir</label>
                        <input type="date" class="form-control form-control-sm" v-model="userMerchant.birthday"
                            v-model.trim="$v.userMerchant.birthday.$model"
                            :class="{'is-invalid':$v.userMerchant.birthday.$error, 'is-valid':!$v.userMerchant.birthday.$invalid }" />
                        <div class="valid-feedback">Tanggal Lahir sudah valid</div>
                        <div class="invalid-feedback">
                            <span v-if="!$v.userMerchant.birthday.required">Tanggal Lahir tidak boleh kosong</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="label">Nama Toko</label>
                        <input type="text" class="form-control form-control-sm" v-model="userMerchant.name"
                            v-model.trim="$v.userMerchant.name.$model"
                            :class="{'is-invalid':$v.userMerchant.name.$error, 'is-valid':!$v.userMerchant.name.$invalid }" />
                        <div class="valid-feedback">Nama Toko sudah valid</div>
                        <div class="invalid-feedback">
                            <span v-if="!$v.userMerchant.name.required">Nama Toko tidak boleh kosong</span>
                        </div>
                    </div>

                    <label class="label text-muted">Alamat Toko</label>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label class="label">Provinsi</label>
                                <select class="form-control form-control-sm" v-on:change="getCities"
                                    v-model="userMerchant.selectedProvince"
                                    v-model.trim="$v.userMerchant.selectedProvince.$model"
                                    :class="{'is-invalid':$v.userMerchant.selectedProvince.$error, 'is-valid':!$v.userMerchant.selectedProvince.$invalid }">
                                    <option v-for="province in provicies" :key="province.name" :value="province">
                                        {{ province.name }}
                                    </option>
                                </select>
                                <div class="valid-feedback">Provinsi sudah valid</div>
                                <div class="invalid-feedback">
                                    <span v-if="!$v.userMerchant.selectedProvince.required">Provinsi tidak boleh
                                        kosong</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label class="label">Kota/Kabupaten</label>
                                <select class="form-control form-control-sm" @change="getSubdistricts"
                                    v-model="userMerchant.selectedCity"
                                    v-model.trim="$v.userMerchant.selectedCity.$model"
                                    :class="{'is-invalid':$v.userMerchant.selectedCity.$error, 'is-valid':!$v.userMerchant.selectedCity.$invalid }">
                                    <option v-for="city in cities" :key="city.name" :value="city">{{ city.name }}
                                    </option>
                                </select>
                                <div class="valid-feedback">Kota/Kabupaten sudah valid</div>
                                <div class="invalid-feedback">
                                    <span v-if="!$v.userMerchant.selectedCity.required">Kota/Kabupaten tidak boleh
                                        kosong</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label class="label">Kecamatan</label>
                                <select class="form-control form-control-sm" v-model="userMerchant.selectedSubdistrict"
                                    v-model.trim="$v.userMerchant.selectedSubdistrict.$model"
                                    :class="{'is-invalid':$v.userMerchant.selectedSubdistrict.$error, 'is-valid':!$v.userMerchant.selectedSubdistrict.$invalid }">
                                    <option v-for="subdistrict in subdistricts" :key="subdistrict.subdistrict_name">
                                        {{ subdistrict.subdistrict_name }}</option>
                                </select>
                                <div class="valid-feedback">Kecamatan sudah valid</div>
                                <div class="invalid-feedback">
                                    <span v-if="!$v.userMerchant.selectedSubdistrict.required">Kecamatan tidak boleh
                                        kosong</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="label">Alamat Rinci Toko</label>
                        <textarea v-model="userMerchant.addressDetail" class="form-control form-control-sm" rows="3"
                            placeholder="Contoh: Jalan Melati Nomor 23"
                            v-model.trim="$v.userMerchant.addressDetail.$model"
                            :class="{'is-invalid':$v.userMerchant.addressDetail.$error, 'is-valid':!$v.userMerchant.addressDetail.$invalid }"></textarea>
                        <div class="valid-feedback">Alamat Rinci Toko sudah valid</div>
                        <div class="invalid-feedback">
                            <span v-if="!$v.userMerchant.addressDetail.required">Alamat Rinci Toko tidak boleh
                                kosong</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="label">Kata Sandi</label>
                        <input type="password" class="form-control form-control-sm" v-model="userMerchant.password"
                            v-model.trim="$v.userMerchant.password.$model" :class="{'is-invalid':$v.userMerchant.password.$error,
                            'is-valid':!$v.userMerchant.password.$invalid}" />
                        <div class="valid-feedback">Kata Sandi sudah valid</div>
                        <div class="invalid-feedback">
                            <span v-if="!$v.userMerchant.password.required">Kata Sandi tidak boleh kosong</span>
                            <span v-if="!$v.userMerchant.password.mingLength">Kata Sandi minimal 8 karakter</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="label">Konfirmasi Kata Sandi</label>
                        <input type="password" class="form-control form-control-sm"
                            v-model="userMerchant.passwordconfirm" v-model.trim="$v.userMerchant.passwordconfirm.$model"
                            :class="{'is-invalid':$v.userMerchant.passwordconfirm.$error, 
                            'is-valid':(userMerchant.password!='')?!$v.userMerchant.passwordconfirm.$invalid:''}">
                        <div class="valid-feedback">Konfirmasi Kata Sandi sudah valid</div>
                        <div class="invalid-feedback">
                            <span v-if="!$v.userMerchant.passwordconfirm.sameAsPassword">Kata Sandi dan Konfirmasi Kata
                                Sandi tidak sesuai</span>
                        </div>
                    </div>

                    <button type="button" class="btn essence-btn btn-block" v-on:click="addMerchant">Daftar</button>
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
    } from "vuelidate/lib/validators";
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
                EventBus.$emit("SPINNER", true);
                window.axios
                    .get("/api/cities?pro_id=" + this.userMerchant.selectedProvince.id)
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
                                "username": "Username",
                                "email": "E-mail",
                                "name": "Nama Toko",
                                "phone": "Nomor Telepon",
                                "photo": "Foto",
                                "gender": "Jenis Kelamin",
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
                                    if (errKey == "email" || errKey == "username") {
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
                    sameAsPassword: sameAs("password")
                }
            }
        },
        mounted() {
            this.getProvincies();
        }
    };

</script>
