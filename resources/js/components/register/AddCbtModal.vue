<template>
    <div class="registration">
        <spinner></spinner>
        <div class="row">
            <div class="col-md-12">
                <form>
                    <label class="label text-muted">CBT</label>
                    <br/>                    

                    <div class="form-group">
                        <label class="label">nama Lengkap</label>
                        <input type="text" class="form-control form-control-sm" v-model="nama_lengkap"
                        v-model.trim="$v.nama_lengkap.$model"
                        :class="{'is-invalid':$v.nama_lengkap.$error, 'is-valid':!$v.nama_lengkap.$invalid }"
                        />        

                        <div class="valid-feedback">sudah valid</div>
                        <div class="invalid-feedback">
                            <span v-if="!$v.nama_lengkap.required">nama lengkap tidak boleh kosong</span>                            
                        </div>                
                    </div>                                        

                    <div class="form-group">
                        <label class="label">nomor WA</label>
                        <input type="number" class="form-control form-control-sm" v-model="nomor_wa"
                        v-model.trim="$v.nomor_wa.$model"
                        :class="{'is-invalid':$v.nomor_wa.$error, 'is-valid':!$v.nomor_wa.$invalid }"/>    

                        <div class="valid-feedback">sudah valid</div>
                        <div class="invalid-feedback">
                            <span v-if="!$v.nomor_wa.required">nomor WA tidak boleh kosong</span>                            
                        </div>                                                   
                    </div>                                        

                    <div class="form-group">
                        <label class="label">nomor Handphone</label>
                        <input type="number" class="form-control form-control-sm" v-model="nomor_hp"
                         v-model.trim="$v.nomor_hp.$model"
                        :class="{'is-invalid':$v.nomor_hp.$error, 'is-valid':!$v.nomor_hp.$invalid }"/>        

                        <div class="valid-feedback">sudah valid</div>
                        <div class="invalid-feedback">
                            <span v-if="!$v.nomor_hp.required">nomor Handphone tidak boleh kosong</span>                            
                        </div>                                                                     
                    </div>                                        

                    <div class="form-group">
                        <label class="label">Email</label>
                        <input type="email" class="form-control form-control-sm" v-model="email" 
                         v-model.trim="$v.email.$model"
                        :class="{'is-invalid':$v.email.$error, 'is-valid':!$v.email.$invalid }"/>     

                        <div class="valid-feedback">sudah valid</div>
                        <div class="invalid-feedback">
                            <span v-if="!$v.email.required">Email tidak boleh kosong</span>         
                            <span v-if="!$v.email.email">Masukkan email dengan format
                                        example@mail.com</span>                   
                        </div>                                      
                    </div>    

                    <div class="form-group">
                        <label class="label">Kata Sandi</label>
                        <input type="password" class="form-control form-control-sm" v-model="kata_sandi"
                        v-model.trim="$v.kata_sandi.$model"
                        :class="{'is-invalid':$v.kata_sandi.$error, 'is-valid':!$v.kata_sandi.$invalid }"
                        />    

                        <div class="valid-feedback">Kata Sandi sudah valid</div>
                        <div class="invalid-feedback">
                            <span v-if="!$v.kata_sandi.required">Kata Sandi tidak boleh kosong</span>
                            <span v-if="!$v.kata_sandi.mingLength">Kata Sandi minimal 8 karakter</span>
                        </div>                                               
                    </div>

                    <div class="form-group">
                        <label class="label">Konfirmasi Kata Sandi</label>
                        <input type="password" class="form-control form-control-sm" v-model="kata_sandi_konfirmasi" 
                         v-model.trim="$v.kata_sandi_konfirmasi.$model"
                        :class="{'is-invalid':$v.kata_sandi_konfirmasi.$error, 'is-valid':!$v.kata_sandi_konfirmasi.$invalid }"/>                                                     

                        <div class="valid-feedback">Konfirmasi Kata Sandi sudah valid</div>
                        <div class="invalid-feedback">
                            <span v-if="!$v.kata_sandi_konfirmasi.sameAsPassword">Kata Sandi dan Konfirmasi Kata
                                Sandi tidak sesuai</span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="label">Nomor KTP</label>
                        <input type="number" class="form-control form-control-sm" v-model="nomor_ktp"
                        v-model.trim="$v.nomor_ktp.$model"
                        :class="{'is-invalid':$v.nomor_ktp.$error, 'is-valid':!$v.nomor_ktp.$invalid }"/>        

                        <div class="valid-feedback">sudah valid</div>
                        <div class="invalid-feedback">
                            <span v-if="!$v.nomor_ktp.required">Nomor KTP tidak boleh kosong</span>                                                    
                        </div>                                            
                    </div>   


                    <div class="form-group">
                        <label class="label">Foto KTP</label>
                        <input type="file" class="form-control form-control-sm" v-on:change="onImageChange"/>                        
                    </div>   

                    <div class="form-group">
                                <label class="label">Komunitas</label>
                                <select class="form-control form-control-lg" v-model="selected_komunitas"  
                                v-model.trim="$v.selected_komunitas.$model"
                                :class="{'is-invalid':$v.selected_komunitas.$error, 'is-valid':!$v.selected_komunitas.$invalid }">                                                                 
                                    <option v-for="community in komunitas" :key="community.nama_komunitas" :value="community.id">{{ community.nama_komunitas }}</option>
                                </select>                                

                                <div class="valid-feedback">sudah valid</div>
                                <div class="invalid-feedback">
                                    <span v-if="!$v.selected_komunitas.required">Komunitas tidak boleh
                                        kosong</span>
                                </div>
                                

                            </div>                     
                    <button type="button" class="btn essence-btn btn-block" v-on:click="addCbt">Daftar</button>
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
    } 
    
    from "vuelidate/lib/validators";
    import EventBus from "../../eventBus";
    import spinner from "../Spinner";

    export default {
        components: {
            spinner
        },
        data() {
            return {
                nama_lengkap: "",
                nomor_wa: "",
                nomor_hp: "",
                email: "",
                kata_sandi: "",
                kata_sandi_konfirmasi: "",
                nomor_ktp: "",
                foto_ktp: null,
                komunitas: [],
                selected_komunitas: "",
                image: null
            };  
        },
        methods: {

            dismiss() {
                EventBus.$emit("ADD_MERCHANT_MODAL_CLOSED", null);
            },

            getCbt() {
                window.axios
                    .get("/api/get-cbt")
                    .then(res => {
                        this.komunitas = res.data;
                    })
                    .catch(err => {
                        console.log(err);
                    });
            },

            onImageChange(e) {                
                this.foto_ktp = e.target.files[0];
                this.image = URL.createObjectURL(this.foto_ktp);
            },

            addCbt() {                
                // let payload = {                    
                //     nama_lengkap: this.nama_lengkap,                    
                //     nomor_wa: this.nomor_wa,
                //     nomor_hp: this.nomor_hp,
                //     email: this.email,                                        
                //     kata_sandi: this.kata_sandi,
                //     kata_sandi_konfirmasi: this.kata_sandi,                    
                //     komunitas: this.komunitas,
                //     nomor_ktp: this.nomor_ktp,
                // };

                this.$v.$touch()
                if (!this.$v.$invalid) {

                const formData = new FormData();
                formData.append("image", this.foto_ktp);
                formData.append("nama_lengkap", this.nama_lengkap);
                formData.append("nomor_wa", this.nomor_wa);
                formData.append("nomor_hp", this.nomor_hp);
                formData.append("email", this.email);
                formData.append("kata_sandi", this.kata_sandi);
                formData.append("komunitas", this.selected_komunitas);                
                formData.append("nomor_ktp", this.nomor_ktp);    

                EventBus.$emit("SPINNER", true);                                                
                window.axios
                    .post("/register-cbt", formData)
                    .then(rest => {                        
                        window.location = "/email-verify1";
                    })
                    .catch(err => {                         
                         EventBus.$emit("SPINNER", false);

                         let customerAttributes = {
                            "nama_lengkap": "Nama Lengkap",
                            "nomor_wa": "nomor WA",
                            "nomor_hp": "nomor HP",
                            "email": "Email",
                            "kata_sandi": "Kata Sandi",
                            "kata_sandi_konfirmasi": "Konfirmasi Kata Sandi",
                            "nomor_ktp": "Nomor KTP",                                                        
                            "selected_komunitas": "Komunitas",
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
            nama_lengkap: {
                required,                
            }, 
            nomor_wa : {
                required,    
            },
            nomor_hp : {
                required,
            },
            email : {
                required,
                email
            },
            kata_sandi : {
                required,
                minLength: minLength(8)
            },
            kata_sandi_konfirmasi : {
                required,
                sameAsPassword: sameAs("kata_sandi")
            },            
            selected_komunitas : {
                required,
            }, 
            nomor_ktp : {
                required,
            },             


        },
        mounted() {
            this.getCbt();
        }
    };

</script>
