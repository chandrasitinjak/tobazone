<template>
    <div class="container">
        <div class="row">
            <div v-for="product in homestays" :key="product.id" class="col-12 col-sm-6 col-lg-4 card">
                <div class="single-product-wrapper">
<!--                    <a href="{{ '../images/assets/no-image.jpg'}}">-->
                        <div class="product-img">
                            <img :src="'/images/assets/'+product.image" style="height: 30px; display: inline" alt>

                        </div>
<!--                    </a>-->
                    <div class="product-description">
                        <div class="row">
                            <div class="col-md-7">
<!--                                <a href="{{ url('/homestays/find', $product->id)}}">-->
                                    <h6>{{product.name}}</h6>
<!--                                </a>-->
                            </div>
                            <div class="col-md-5" style="alignment: right">
                                <p class="product-price" style="color: #FF8311; "> Rp.{{
                                    product.price }}</p>
                            </div>
                            <br>
                        </div>
                        <div class="row">
                            <div class="col-md-1">
                                <i class="fa fa-map-marker icon fa-lg"
                                   style="color:#000000;"></i>
                            </div>
                            <div class="col-md-10">
                                <p> {{ product.address }}</p>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6" align="left">
                            <button class="btn" style="background-color: #222757; color: white"  @click="goToRouteubah(product.id)"
                            >Ubah
                            </button>
                        </div>
                        <div class="col-md-6" align="right">
                            <button class="btn" style="background-color: #6D0000; color: white"
                                    >Hapus
                            </button>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
            <br><br>
        </div>
        <br><br>
    </div>
</template>
<!--
    Created by Sogumontar Hendra Simangunsong on .
 -->

<script>
    export default {
        name: "AllHomestay.vue",
        data() {
            return {
                homestays: [],
            }
        },
        methods: {
            findAll() {
                window.axios
                    .get("/homestays/findAllMyHomestay")
                    .then(res => {
                        this.homestays = res.data;
                        console.log(this.homestays)
                    })
                    .catch(err => {
                        console.log(err);
                    });
            },
            ubah(id){
                alert(id);
                window.axios
                    .get("/merchant/homestay/update/"+id)
                    .then(res => {
                        console.log(res)
                    })
                    .catch(err => {
                        console.log(err);
                    });
            }
        },
        mounted() {
            this.findAll();
        }
    }
</script>

<style scoped>

</style>
