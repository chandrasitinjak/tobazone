<template>
  <div class="col-md-12 slide">
    <div class="card globalcard">
      <div class="card-header">
        <h5 style="float: left">Inspirasi Belanja</h5>
        <h6 style="float: right">
          <a href="shop.html" style="color: -webkit-link">Lihat Semua Produk</a>
        </h6>
      </div>
      <div class="card-body">
        <carousel
          :autoplay="true"
          :nav="false"
          :dots="true"
          :items="banners.length"
          :touchDrag="false"
          :mouseDrag="true"
          :loop="true"
        >
          <div class="banner_item" v-for="banner in banners">
            <a href="single-product-details.html">
              <img :src="'/images/' + banner.image" alt="Banner Image">
            </a>
          </div>
        </carousel>
      </div>
    </div>
  </div>
</template>

<script>
import carousel from "vue-owl-carousel";

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
  components: { carousel }
};
</script>

