<template>
    <div class="registration">
        <spinner></spinner>
        <div class="row">
            <div class="container">
                <br><br>
                <h4>Tambah Homestay</h4>
                <hr>
                <form class="form-group" @submit="save">
                    <div class="form-group row">
                        <div class="input-group mb-3">
                            <label class="col-sm-3 col-form-label">
                                Gambar Homestay
                                <span
                                    class="formbadge badge badge-secondary font-weight-light text-muted">Wajib</span>
                            </label>
                            <div class="col-sm-9">
                                <div class="col-md-3" v-if="image">
                                    <img :src="image" class="img-responsive" height="70" width="90">
                                </div>
                                <div class="col-md-6">
                                    <input type="file" v-on:change="onImageChange" class="form-control">
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
                            <input type="text" class="form-control" v-model="name"
                                   aria-describedby="namaprodukhelp" name="name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Jumlah Kamar
                            <span
                                class="formbadge text-muted badge badge-secondary font-weight-light">Wajib</span>
                        </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="totalRoom"
                                   aria-describedby="namaprodukhelp" min="1" name="stock">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Jumlah Kamar Tersedia
                            <span
                                class="formbadge text-muted badge badge-secondary font-weight-light">Wajib</span>
                        </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="roomAvailable"
                                   aria-describedby="namaprodukhelp" min="0" name="stock">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Harga Kamar/malam
                            <span
                                class="formbadge text-muted badge badge-secondary font-weight-light">Wajib</span>
                        </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="price"
                                   aria-describedby="namaprodukhelp" min="1" name="price">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Deskripsi Homestay
                            <span
                                class="formbadge text-muted badge badge-secondary font-weight-light">Wajib</span>
                        </label>
                        <div class="col-sm-9">
                            <textarea rows="10" class="form-control" v-model="description"
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
                            <input type="text" class="form-control" v-model="address"
                                   aria-describedby="namaprodukhelp" min="1" name="product_origin"
                            >
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

                        </div>
                    </div>
                </form>
                <button @click="save" type="submit" style="background-color: black"
                        class="btn btn-primary float-right">Simpan
                </button>
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
                image:'',
                name: '',
                price:'',
                totalRoom:'',
                roomAvailable:'',
                description:'',
                address:'',
                kabupaten:'',
                kecamatan:'',
                desa:'',
                userMerchant: {
                    selectedCity: "",
                    selectedProvince: "",
                    selectedSubdistrict: "",
                }
            };
        },
        methods: {
            dismiss() {
                EventBus.$emit("ADD_MERCHANT_MODAL_CLOSED", null);
            },
            getCities() {
                EventBus.$emit("SPINNER", true);
                window.axios
                    .get("/api/cities?pro_id=" + 34)
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
            onImageChange(e) {
                let files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.createImage(files[0]);
            },
            createImage(file) {
                let reader = new FileReader();
                let vm = this;
                reader.onload = (e) => {
                    vm.image = e.target.result;
                };
                reader.readAsDataURL(file);
            },
            save() {
                console.log(this.image)
                window.axios
                    .post("/homestays/save",{
                        'name': this.name,
                        'price':this.price,
                        'totalRoom':this.totalRoom,
                        'roomAvailable':this.roomAvailable,
                        'description':this.description,
                        'address':this.address,
                        'kabupaten':this.userMerchant.selectedCity,
                        'kecamatan':this.userMerchant.selectedSubdistrict,
                        'desa':'',
                        'image': this.image
                    })
                    .then(res => {
                        alert("Tambah Penginapan Sukses");
                        window.location.href="/merchant/homestay/findAll";
                    })
                    .catch(err => {
                        console.log(err);
                    });
            }
        },

        validations: {
            userMerchant: {
                username: {
                    minLength: minLength(8)
                },
                email: {
                    email
                },
                addressDetail: {},
                selectedCity: {},
                selectedSubdistrict: {}
            }
        },
        mounted() {
            this.getCities();
        }
    };

</script>
