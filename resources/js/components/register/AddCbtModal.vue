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
                        <input type="file" class="form-control form-control-sm" name="myfile"/>                        
                    </div>   

                    <div class="form-group">
                                <label class="label">Komunitas</label>
                                <select class="form-control form-control-lg" v-model="komunitas">                                   
                                    <option>Komunitas Test 1</option>
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
                foto_ktp: "",
                komunitas: "",
            };  
        },
        methods: {
            addCbt() {
                let payload = {
                    email: this.email
                };
                console.log(payload);
                window.axios
                    .post("/register-cbt", payload)
                    .then(rest => {
                        console.log("hello world");
                    })
                    .catch(err => {
                         console.log(err);
                    })
            }
        },

        validations: {            

        },
        mounted() {
            
        }
    };

</script>
