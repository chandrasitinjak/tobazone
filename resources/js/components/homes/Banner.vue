<template>
  <div class="col-md-12 slide">
    <div class="card globalcard">
      <div class="card-header">
        <h5 style="float: left">Inspirasi Belanja</h5>
        <!--<h6 style="float: right">-->
          <!--<a href="shop.html" style="color: -webkit-link">Lihat Semua Produk</a>-->
        <!--</h6>-->
      </div>
      <div class="card-body">
        <div class="flex" >
          <div class="ab d-inline-flex" v-for="banner in banners"  style="margin: 2px;
    min-width: 300px;
    width: 33%;" >
            <a :href="banner.link">
              <img :src="'/images/banners/' + banner.image" alt="Inspirasi Belanja" style="">
            </a>
          </div>

        </div>

        <!--<Carousel-->

            <!--:nav="false"-->

            <!--:paginationEnabled="true"-->
            <!--:perPageCustom="[[0, 1], [991.88, 3]]">-->

          <!--<slide class="px-2 " v-for="banner in banners">-->
              <!---->
          <!--</slide>-->

        <!--</Carousel>-->
      </div>
    </div>
  </div>
</template>

<script>

import { Carousel, Slide } from "vue-carousel";


export default {
  data() {
    return {
      banners: []
    };
  },
  methods: {
    getBanners() {
      window.axios.get("/get-banners").then(res => {
        this.banners = res.data;
        console.log(this.banners);
      });
    }
  },
  mounted() {
    this.getBanners();
  },
  components: { Carousel, Slide }
};
</script>

