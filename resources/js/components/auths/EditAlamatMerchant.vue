<template>
    <div>
        <form @submit.prevent="save" style="margin-top: 2rem">
            <div class="form-group">
                <label class="label">Alamat</label>
                <input type="text" class="form-control form-control-sm" v-model="address.addressName"
                       placeholder="Contoh: Rumah, Kantor">
            </div>
            <div class="form-group">
                <label class="label">Provinsi</label>
                <select v-if="show.prov" class="form-control" v-model="address.prov" @change="getUpdateCities">
                    <option v-for="province in provicies" :key="province.id" :value="province.id">
                        {{ province.name }}
                    </option>
                </select>
            </div>
            <div class="form-group">
                <label class="label">Kota/Kabupaten</label>
                <select v-if="show.city" class="form-control" v-model="address.kab" @change="getUpdateSubdistricts">
                    <option v-for="city in cities" :key="city.name" :value="city.id">{{ city.name }}
                    </option>
                </select>
            </div>
            <div class="form-group">
                <label class="label">Kecamatan</label>
                <select v-if="show.kec" class="form-control " v-model="address.kec">
                    <option v-for="subdistrict in subdistricts" :key="subdistrict.subdistrict_name"
                            :value="subdistrict.subdistrict_id">{{ subdistrict.subdistrict_name }}
                    </option>
                </select>

            </div>
            <div class="form-group">
                <label class="label">Alamat Rinci</label>
                <textarea v-model="address.addressDetail" class="form-control form-control-sm" rows="3"
                          placeholder="Contoh: Jalan Melati Nomor 23"></textarea>
            </div>
            <center>
                <button type="submit" class="btn essence-btn col-md-4" style="margin-top: 0.5rem;margin-bottom: 2rem">
                    Ubah
                </button>
            </center>

        </form>
    </div>
</template>

<script>

    export default {
        data() {
            return {
                provicies: [],
                cities: [],
                subdistricts: [],
                address: {
                    prov: null,
                    kab: null,
                    kec: null,
                    addressName: null,
                    addressDetail: null
                },
                show: {
                    prov: false,
                    city: false,
                    kec: false
                }
            }
        },
        methods: {
            save() {
                if (this.address.prov === null || this.address.kab === null || this.address.kec === undefined) {
                    this.$swal.fire(
                        'Error!',
                        'Silahkan lengkapi alamat anda',
                        'error',
                    );
                    return
                }

                const loader = this.$loading.show()
                const payload = {
                    name: this.address.addressName,
                    addressDetail: this.address.addressDetail,
                    provinceId: this.address.prov,
                    cityId: this.address.kab,
                    subdistrictId: this.address.kec,
                }
                for (let i = 0; i < this.cities.length; i++) {
                    if (this.cities[i].id === payload.cityId) {
                        payload.cityName = this.cities[i].name
                        payload.postalCode = this.cities[i].postal_code
                    }
                }
                for (let i = 0; i < this.provicies.length; i++) {
                    if (this.provicies[i].id === payload.provinceId) {
                        payload.provinceName = this.provicies[i].name
                    }
                }
                for (let i = 0; i < this.subdistricts.length; i++) {
                    if (this.subdistricts[i].subdistrict_id === payload.subdistrictId) {
                        payload.subdistrictName = this.subdistricts[i].subdistrict_name
                    }
                }

                var url = window.location.pathname;
                var id = url.substring(url.lastIndexOf('/') + 1);
                axios.post(`/api/updatealamatcustomer/${id}`, payload)
                    .then(e => {
                        window.location.href = `/merchant/${id}/myProfile`
                        loader.hide()
                    })
                .catch(e=> {
                    this.$swal.fire(
                        'Error!',
                        'Terjadi kesalahan Silahkan coba beberapa saat lagi',
                        'error',
                    );
                    loader.hide()
                })
            },
            getUpdateCities() {
                const loader = this.$loading.show()
                axios
                    .get("/api/cities?pro_id=" + this.address.prov)
                    .then(res => {
                        this.cities = res.data;
                        this.address.kab = null;
                        this.address.kec = '';
                        this.subdistricts = [];
                        loader.hide()
                    })
                    .catch(err => {
                        console.log(err);
                        loader.hide()
                    });
            },
            getUpdateSubdistricts() {
                const loader = this.$loading.show()
                axios
                    .get("/api/subdistricts?city_id=" + this.address.kab)
                    .then(res => {
                        this.subdistricts = res.data.rajaongkir.results;
                        this.address.kec = ''
                        loader.hide()
                    })
                    .catch(err => {
                        console.log(err);
                        loader.hide()
                    });
            },
            getUserAddress() {
                var url = window.location.pathname;
                var id = url.substring(url.lastIndexOf('/') + 1);
                axios.get(`/api/getuseraddress/${id}`)
                    .then(e => {
                        const {data} = e
                        this.address.addressDetail = data.detail
                        this.address.addressName = data.name
                        {
                            this.getProvincies()
                            this.address.prov = data.province_id
                            this.show.prov = true
                        }
                        {
                            this.getCities()
                            this.address.kab = data.city_id
                            this.show.city = true
                        }
                        {
                            this.getSubdistricts()
                            this.address.kec = data.subdistrict_id
                            this.show.kec = true
                        }
                    })
            },
            getProvincies() {
                const loader = this.$loading.show()
                axios
                    .get("/api/provincies")
                    .then(res => {
                        this.provicies = res.data;
                        loader.hide()
                    })
                    .catch(err => {
                        console.log(err);
                        loader.hide()
                    });
            },
            getCities() {
                const loader = this.$loading.show()
                axios
                    .get("/api/cities?pro_id=" + this.address.prov)
                    .then(res => {
                        this.cities = res.data;
                        loader.hide()
                    })
                    .catch(err => {
                        console.log(err);
                        loader.hide()
                    });
            },
            getSubdistricts() {
                const loader = this.$loading.show()
                axios
                    .get("/api/subdistricts?city_id=" + this.address.kab)
                    .then(res => {
                        this.subdistricts = res.data.rajaongkir.results;
                        loader.hide()
                    })
                    .catch(err => {
                        console.log(err);
                        loader.hide()
                    });
            }
        },
        mounted() {
            this.getUserAddress()
        }
    }
</script>

<style scoped>

</style>
