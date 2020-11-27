<template>
    <div v-if="carousels.length > 0">
        <Carousel
            :autoplay="true"
            :autoplayTimeout="3000"
            :nav="false"
            :loop="true"
            :speed="800"
            :paginationPadding="3"
            :paginationEnabled="false"
            :perPageCustom="[[0, 1], [991.88, 1]]"
            :navigationEnabled="true"
            :navigationNextLabel="kanan"
            :navigationPrevLabel="kiri"


        >
            <slide class="px-0" v-for="carousel in carousels">
                <a :href="carousel.link">
                    <img :src="'/images/carousels/' + carousel.image" style="" class="empty-slide">
                </a>
            </slide>
        </Carousel>
    </div>

    <div v-else style="">
        <Carousel
            :autoplay="true"
            :autoplayTimeout="3000"
            :nav="false"
            :loop="true"
            :speed="800"
            :paginationEnabled="false"
            :perPageCustom="[[0, 1], [991.88, 1]]"
        >
            <slide class="px-0">
                <a href="/register"><img src="/images/carousels/carousel-tobazone-4.png" style="" class="empty-slide"></a>
            </slide>
        </Carousel>
    </div>
</template>
<!--
    Created by Sogumontar Hendra Simangunsong on .
 -->

<script>
    import { Carousel, Slide } from "vue-carousel";
    export default {
        name: "CarouselHomestay",
        components: { Carousel, Slide },
        data() {
            return {
                carousels: [],
            };
        },
        methods: {
            getCarousels() {
                window.axios.get("/homestay/get-carousels").then(res => {
                    this.carousels = res.data;
                });
            },

        },
        mounted() {
            this.getCarousels();
        }
    }
</script>


<style scoped>
    @media (min-width:219px) and (max-width: 449px){
        .empty-slide{
            width: 0%;
            height: 0px;
        }
    }
    @media (min-width:450px) and (max-width: 767px){
        .empty-slide{
            width: 0%;
            height: 0px;
        }
    }
    @media (min-width:768px) and (max-width: 990px){
        .empty-slide{
            height: 180px;
            width: 100%!important;
        }

    }
    @media (min-width:991px) and (max-width: 1199px){

    }
    @media (min-width:1200px){
        .empty-slide{
            height: 100%;
            width: 100%;
        }
    }
</style>

