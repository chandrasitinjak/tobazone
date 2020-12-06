<template>
    <div class="registration">
        <spinner></spinner>
        <div class="row">
            <div class="container">
                <br><br>
                <h4>Ubah Homestay</h4>
                <hr>
                <form class="form-group" method="POST"  enctype="multipart/form-data">
                    <div class="form-group row">
                        <div class="input-group mb-3">
                            <label class="col-sm-3 col-form-label">
                                Gambar Homestay
                                <span
                                    class="formbadge badge badge-secondary font-weight-light text-muted">Wajib</span>
                            </label>
                            <div class="col-sm-9">
                                <div>
                                    <input type='file' alt="Input" onchange="readURL(this);"/>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nama Homestay
                            <span
                                class="formbadge text-muted badge badge-secondary font-weight-light">Wajib</span>
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" :placeholder="homestay.name"
                                   aria-describedby="namaprodukhelp" name="name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Jumlah Kamar
                            <span
                                class="formbadge text-muted badge badge-secondary font-weight-light">Wajib</span>
                        </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" :placeholder="homestay.total_room"
                                   aria-describedby="namaprodukhelp" min="1" name="stock" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Jumlah Kamar Tersedia
                            <span
                                class="formbadge text-muted badge badge-secondary font-weight-light">Wajib</span>
                        </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" :placeholder="homestay.room_available"
                                   aria-describedby="namaprodukhelp" min="0" name="stock" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Harga Kamar/malam
                            <span
                                class="formbadge text-muted badge badge-secondary font-weight-light">Wajib</span>
                        </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" :placeholder="homestay.price"
                                   aria-describedby="namaprodukhelp" min="1" name="price" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Deskripsi Homestay
                            <span
                                class="formbadge text-muted badge badge-secondary font-weight-light">Wajib</span>
                        </label>
                        <div class="col-sm-9">
                            <textarea rows="10" class="form-control" :placeholder="homestay.description"
                                      aria-describedby="namaprodukhelp"
                                      name="description"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Alamat Homestay
                            <span
                                class="formbadge text-muted badge badge-secondary font-weight-light">Wajib</span>
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" :placeholder="homestay.address"
                                   aria-describedby="namaprodukhelp" min="1" name="product_origin"
                                   required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Kabupaten
                            <span
                                class="formbadge text-muted badge badge-secondary font-weight-light">Wajib</span>
                        </label>
                        <div class="col-sm-9">
                            <select class="form-control form-control-sm" @change="getSubdistricts"
                                    v-model="userMerchant.selectedCity"
                                    v-model.trim="$v.userMerchant.selectedCity.$model"
                                    :class="{'is-invalid':$v.userMerchant.selectedCity.$error, 'is-valid':!$v.userMerchant.selectedCity.$invalid }">
                                <option v-for="city in cities" :key="city.name" :value="city">{{
                                    city.name }}
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Kecamatan
                            <span
                                class="formbadge text-muted badge badge-secondary font-weight-light">Wajib</span>
                        </label>
                        <div class="col-sm-9">
                            <select class="form-control form-control-sm"
                                    v-model="userMerchant.selectedSubdistrict"
                                    v-model.trim="$v.userMerchant.selectedSubdistrict.$model"
                                    :class="{'is-invalid':$v.userMerchant.selectedSubdistrict.$error, 'is-valid':!$v.userMerchant.selectedSubdistrict.$invalid }">
                                <option v-for="subdistrict in subdistricts"
                                        :key="subdistrict.subdistrict_name" :value="subdistrict">
                                    {{ subdistrict.subdistrict_name }}
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12 mt-4">
                            <button type="submit" style="background-color: black" class="btn btn-primary float-right">Simpan
                            </button>
                        </div>
                    </div>
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
    import EventBus from "../../../eventBus";
    import spinner from "../../Spinner";

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
                },
                homestay:""
            };
        },
        methods: {
            dismiss() {
                EventBus.$emit("ADD_MERCHANT_MODAL_CLOSED", null);
            },
            getHomestay(){
                var url = window.location.href;
                var id = url.substring(url.lastIndexOf('/') + 1);
                window.axios
                    .get("/merchant/homestay/findHomestayById/" +id)
                    .then(res => {
                        this.homestay= res.data;
                        this.userMerchant.selectedCity = res.data.kabupaten
                       console.log(res.data)
                    })
                    .catch(err => {
                        console.log(err);
                    });
            },
            getCities() {
                EventBus.$emit("SPINNER", true);
                window.axios
                    .get("/api/cities?pro_id=" +34)
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
            save(){
                window.axios
                    .post("/merchant/homestay/update/" +id)
                    .then(res => {
                        console.log(res);
                    })
                    .catch(err => {
                        console.log(err);
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

                    console.log(payload);

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
            this.getCities();
            this.getHomestay();
        }
    };

</script>
