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
                        <input type="text" class="form-control form-control-sm" v-model="nama_lengkap"/>                        
                    </div>                                        

                    <div class="form-group">
                        <label class="label">nomor WA</label>
                        <input type="number" class="form-control form-control-sm" v-model="nomor_wa"/>                                                    
                    </div>                                        

                    <div class="form-group">
                        <label class="label">nomor Handphone</label>
                        <input type="number" class="form-control form-control-sm" v-model="nomor_hp"/>                                                                            
                    </div>                                        

                    <div class="form-group">
                        <label class="label">Email</label>
                        <input type="email" class="form-control form-control-sm" v-model="email" />                                                 
                    </div>    

                    <div class="form-group">
                        <label class="label">Kata Sandi</label>
                        <input type="password" class="form-control form-control-sm" v-model="kata_sandi"/>                                                   
                    </div>

                    <div class="form-group">
                        <label class="label">Konfirmasi Kata Sandi</label>
                        <input type="password" class="form-control form-control-sm" v-model="kata_sandi_konfirmasi" />                                                     
                    </div>
                    
                    <div class="form-group">
                        <label class="label">Nomor KTP</label>
                        <input type="number" class="form-control form-control-sm" v-model="nomor_ktp"/>                                                    
                    </div>   


                    <div class="form-group">
                        <label class="label">Foto KTP</label>
                        <input type="file" class="form-control form-control-sm" v-on:change="onImageChange"/>                        
                    </div>   

                    <div class="form-group">
                                <label class="label">Komunitas</label>
                                <select class="form-control form-control-lg" v-model="selected_komunitas">                                   
                                    <option v-for="community in komunitas" :key="community.nama_komunitas" :value="community.id">{{ community.nama_komunitas }}</option>
                                </select>                                

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
    } from "vuelidate/lib/validators";
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

                const formData = new FormData();
                formData.append("image", this.foto_ktp);
                formData.append("nama_lengkap", this.nama_lengkap);
                formData.append("nomor_wa", this.nomor_wa);
                formData.append("nomor_hp", this.nomor_hp);
                formData.append("email", this.email);
                formData.append("kata_sandi", this.kata_sandi);
                formData.append("komunitas", this.selected_komunitas);                
                formData.append("nomor_ktp", this.nomor_ktp);    
                                                
                window.axios
                    .post("/register-cbt", formData)
                    .then(rest => {
                        
                    })
                    .catch(err => {
                         console.log(err);
                    })
            }
        },

        validations: {            

        },
        mounted() {
            this.getCbt();
        }
    };

</script>
