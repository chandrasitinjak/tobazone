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
                                    <input type="file" v-on:change="onImageChange" >
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
                        <label class="col-sm-3 col-form-label">Kamar Homestay
                            <span
                                class="formbadge text-muted badge badge-secondary font-weight-light">Wajib</span>
                        </label>
                        <div class="col-sm-9">
                        </div>
                    </div>
                    <div class="form-group row" v-for="(experience, index) in workExperiences" :key="index">
                        <label class="col-sm-3 col-form-label">Kamar {{index+1}}
                        </label>
                        <div class="form-group row col-sm-9" >
                            <div class="form-group col-md-3">
                                <label>Kategori</label>
                                <select class="form-control"
                                        aria-describedby="emailHelp"
                                        placeholder="Nama Pengirim"
                                        required
                                        :name="`workExperiences[${index}][company]`"
                                        v-model="experience.kategori">
                                    <option v-for="data,index in kategori" :key="index" :value="data">{{
                                        data.category_name }}
                                    </option>
                                </select>
                                </div>
                            <div class="form-group col-md-3">
                                <label>Fasilitas</label>
                                <br>
                                <div>
                                    <input type="checkbox" id="Ac" value="Ac" v-model="workExperiences[index].checked[0]">
                                    <label for="Ac">Ac</label>
                                    <input type="checkbox" id="Kamar mandi" value="Kamar mandi" v-model="workExperiences[index].checked[1]">
                                    <label for="Kamar mandi">Kamar mandi</label>
                                    <input type="checkbox" id="Pemanas" value="Pemanas" v-model="workExperiences[index].checked[2]">
                                    <label for="Pemanas">Pemanas</label>
                                </div>
<!--                                <input v-model="experience.fasilitas" :name="`workExperiences[${index}][title]`" type="text" class="form-control">-->
                            </div>
                            <div class="form-group col-md-2">
                                <label>Harga</label>
                                <input v-model="experience.harga" :name="`workExperiences[${index}][title]`" type="number" min="0" class="form-control">
                            </div>
                            <div class="form-group col-md-2">
                                <label>Total Kasur</label>
                                <input v-model="experience.totalBed" :name="`workExperiences[${index}][title]`" type="number" min="0" class="form-control" >
                            </div>
                            <div class="form-group col-md-2">
                                <label style="font-size:13px;">Extra bed</label>
                                <input v-model="experience.isExtraBed" :name="`workExperiences[${index}][title]`" type="number" min="0" class="form-control" >
                            </div>
                        </div>
                    </div>
                    <div class="form-group" align="right">
                        <button @click="addKamar" type="button" class="btn btn-secondary">Tambah Kamar</button>
                        <button @click="removeKamar" type="button" class="btn btn-secondary">Hapus Kamar</button>
                    </div>
                    <br>
<!--                    <div class="form-group row">-->
<!--                        <label class="col-sm-3 col-form-label">Jumlah Kamar Tersedia-->
<!--                            <span-->
<!--                                class="formbadge text-muted badge badge-secondary font-weight-light">Wajib</span>-->
<!--                        </label>-->
<!--                        <div class="col-sm-9">-->
<!--                            <input type="number" class="form-control" v-model="roomAvailable"-->
<!--                                   aria-describedby="namaprodukhelp" min="0" name="stock">-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div>-->
<!--                        {{kamar}}-->
<!--                    </div>-->
<!--                    <div align="right">-->
<!--                        <button class="btn btn-primary" data-toggle="modal"-->
<!--                                data-target="#exampleModal"><i class="fa fa-plus"></i> Tambah-->
<!--                        </button>-->
<!--                    </div>-->
                    <div
                        class="modal fade"
                        id="exampleModal"
                        tabindex="-1"
                        role="dialog"
                        aria-labelledby="exampleModalLabel"
                        aria-hidden="true"
                    >
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                    <spinner></spinner>
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Kamar
                                        </h5>
                                        <button
                                            type="button"
                                            class="close"
                                            data-dismiss="modal"
                                            aria-label="Close"
                                        >
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- <form> -->
                                        <div class="form-group">
                                            <label for="namapengirim" class="small">
                                                Kategori Kamar</label>
                                            <select class="form-control"
                                                    id="namapengirim"
                                                    aria-describedby="emailHelp"
                                                    placeholder="Nama Pengirim"
                                                    required
                                                    v-model="rooms.kategoriSelected">
                                                <option v-for="data,index in kategori" :key="index" :value="data">{{
                                                    data.category_name }}
                                                </option>
                                            </select>
                                            <div class="valid-feedback">sudah valid</div>
                                        </div>
                                        <div class="form-group">
                                            <label for="Jumlah Kasur" class="small">
                                               Jumlah Kasur</label>
                                            <input
                                                type="number"
                                                min="1"
                                                class="form-control form-control-sm"
                                                id="Jumlah Kasur"
                                                aria-describedby="emailHelp"
                                                placeholder="Jumlah Kasur"
                                                required
                                            >
                                            <div class="valid-feedback">sudah valid</div>
                                        </div>
                                        <div class="form-group">
                                            <label for="utkbank" class="small">Bank
                                                Tujuan</label>
                                            <br>
                                            <select id="utkbank" class="form-control" required>
                                                <!-- <option value="BRI">BRI</option> -->
                                                <option value="MANDIRI">MANDIRI</option>
                                                <option value="OVO">OVO</option>
                                                <option value="DANA">DANA</option>
                                                <option value="GOPAY">GOPAY</option>
                                                <!-- <option value="BNI">BNI</option>
                                                <option value="BCA">BCA</option> -->
                                            </select>
                                            <div class="valid-feedback">sudah valid</div>
                                            <div class="invalid-feedback">
                                                <span>tidak boleh kosong</span>
                                                <!-- <span v-if="!$v.senderName.required">tidak boleh kosong</span> -->
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label class="col-form-label">Gambar Kamar (
                                                jpg/jpeg/png )</label>
                                            <div class="col-sm-9">
                                                <div class="upload-btn-wrapper">
                                                    <button class="btn-upcus"
                                                            style="margin: auto">
                                                        <img src="/images/assets/addimage.png"
                                                             style="height: 100px">
                                                        <input type="file" name="images">
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- </form> -->
                                    </div>
                                    <div class="modal-footer">
                                        <a
                                            @click="addRooms(1)"
                                            class="btn btn-secondary close"
                                            data-dismiss="modal"
                                        >Unggah
                                        </a>
                                    </div>
                            </div>
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
                            <select class="form-control" @change="getSubdistricts"
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
                            <select class="form-control"
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
                kategori:'',
                fasilitas:'',
                desa:'',
                kamar:['Kamar 1', 'Kamar 2'],
                rooms:{
                  kategoriSelected:'',
                },
                userMerchant: {
                    selectedCity: "",
                    selectedProvince: "",
                    selectedSubdistrict: ""
                },
                workExperiences: [
                    {
                        kategori: '',
                        fasilitas: [],
                        harga: '',
                        totalBed: '',
                        isExtraBed: '',
                        checked:[false,false,false]
                    },

                ]
            };
        },
        methods: {
            addKamar() {
                this.workExperiences.push({
                    kategori: '',
                    fasilitas: '',
                    harga: '',
                    totalBed: '',
                    isExtraBed: '',
                    checked:[false,false,false]
                })
            },
            removeKamar() {
                this.workExperiences.pop();
            },
            getCategories(){
                window.axios
                    .get("/api/homestay/room-categories")
                    .then(res => {
                        this.kategori = res.data;
                        console.log(res.data);
                    })
                    .catch(err => {
                        console.log(err);
                    });
            },
            getFacilities(){
                window.axios
                    .get("/homestay/room-facilities/findAll")
                    .then(res => {
                        this.fasilitas = res.data;
                        console.log(res.data);
                    })
                    .catch(err => {
                        console.log(err);
                    });
            },
            addRooms(position){
              this.kamar.push("kamar"+position);
            },
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
                window.axios
                    .post("/homestays/save",{
                        'name': this.name,
                        'price':this.price,
                        'totalRoom':this.workExperiences.length,
                        'roomAvailable':this.roomAvailable,
                        'description':this.description,
                        'address':this.address,
                        'kabupaten':this.userMerchant.selectedCity,
                        'kecamatan':this.userMerchant.selectedSubdistrict,
                        'desa':'',
                        'image': this.image
                    })
                    .then(res => {
                        for(let i=0 ; i<this.workExperiences.length ; i++){
                            var facy =['Ac','Kamar mandi', 'Pemanas'];
                            var fa_res =[];
                            alert("test");
                            for(let j=0 ; j< this.workExperiences[i].checked.length ; j++){
                                if(this.workExperiences[i].checked[j]){
                                    fa_res.push(facy[j])
                                }
                            }
                            window.axios
                                .post("/homestay/room/store",{
                                    'kategori':this.workExperiences[i].kategori.category_name,
                                    'fasilitas':fa_res,
                                    'price':this.workExperiences[i].harga,
                                    'total_bed':this.workExperiences[i].totalBed,
                                    'total_extra_bed':this.workExperiences[i].isExtraBed,
                                }).then(res=>{

                            })
                        }
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
            this.getCategories();
            this.getFacilities();
        }
    };

</script>
