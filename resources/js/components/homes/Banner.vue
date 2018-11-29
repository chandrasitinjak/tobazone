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
            :nav="false"
            :dots="true"
            :items="3"
            :loop="true"
            :responsive="{0:{margin: 5,
                    items: 1,
                    autoplay: true,
                    touchDrag:true,
                    mouseDrag:true,
                    loop: true,
                    stagePadding:10,},991.88:{items: 3,
                    touchDrag:false,
                    mouseDrag:false,
                    margin:7,
                    autoplay: false}}"
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

