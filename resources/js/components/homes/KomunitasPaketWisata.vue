<template>
    <div class="col-md-12">
        <br><br><br>
        <div class="card globalcard">
            <h3 class="text-center">Paket Wisata Terlaris</h3>
            <div class="card-body globalcardbody mb-5" >
                <carousel
                        :mouse-drag="true"
                        :scrollPerPage="true"
                        :spacePadding="20"
                        :speed="800"
                        :paginationEnabled="false"
                        :autoplay="true"
                        :perPageCustom="[[0, 1], [991.88, 4]]"
                        :navigationEnabled="true"
                        navigationNextLabel="<i class='fa fa-angle-right fa-3x'></i>"
                        navigationPrevLabel="<i class='fa fa-angle-left fa-3x'></i>"
                >
                    <slide class="mt-3" v-for="paket in pakets" :key="paket.id">
                        <div class="col-auto">
                            <div class="card products"  style="border-radius: 10px;">
                                <a :href="'/paket/details/'+paket.id_paket">

                                    <img class="card-img-top"
                                         :src="'/storage/img/paket/'+paket.gambar" alt="Card image cap" style="height: 200px;">

                                    <div class="card-body">
                                        <h7 class="card-title" style="font-weight: bold">{{paket.nama_paket}} ( <i class="fa fa-clock-o"></i> &nbsp;{{paket.durasi}} )</h7>
                                        <h5 style="color: #FF8311;">Rp.{{formatPrice(paket.harga_paket)}}</h5>
                                        <li class="list-inline-item" style="color: #ffc000;"><i class="fa fa-star"></i></li>
                                        <li class="list-inline-item" style="color: #ffc000;"><i class="fa fa-star"></i></li>
                                        <li class="list-inline-item" style="color: #ffc000;"><i class="fa fa-star"></i></li>
                                        <li class="list-inline-item" style="color: #ffc000;"><i class="fa fa-star"></i></li>
                                        <li class="list-inline-item" style="color: #ffc000;"><i class="fa fa-star"></i></li>

                                        <h5 style="color: #FF8311;"></h5>
                                        <p></p>
                                        <p class="card-text">
                                            <medium class="text-muted  float-right"> &nbsp;{{paket.get_kabupaten.nama_kabupaten}}</medium>
                                            <medium class="text-muted  float-left"></medium>
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </slide>
                </carousel>

            </div>
        </div>
    </div>

</template>

<script>
    import carousel2 from "vue-owl-carousel";
    import {Carousel, Slide} from "vue-carousel";
    import EventBus from "../../eventBus";

    export default {
        components: {carousel2, Carousel, Slide},
        data() {
            return {
                pakets: []
            };
        },
        methods: {
            async getPaket() {
                await window.axios
                    .get("/api/paket/get-paket-terbaru")
                    .then(res => {
                        this.pakets = res.data;
                        console.log(this.pakets);
                    })
                    .catch(err => {
                        console.log(err);
                    });
            },
            formatPrice(value) {
                let val = (value / 1).toFixed().replace('.', ',')
                return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
            },
        },
        mounted() {
            this.getPaket();
        }
    };
</script>

<style>
    .card-paket {
        border-radius: 15px;
    }

    #card-img {
        border-top-right-radius: 15px;
        border-top-left-radius: 15px;
        border-bottom-left-radius: 15px;
        border-bottom-right-radius: 15px;

    }
</style>
