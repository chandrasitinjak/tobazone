<template>
  <div v-if="carousels.length > 0">
    <Carousel
      :autoplay="true"
      :autoplayTimeout="3000"
      :nav="false"
      :loop="true"
      :speed="800"
      :paginationPadding="3"
      :paginationEnabled="true"
      :perPageCustom="[[0, 1], [991.88, 1]]"
    >
      <slide class="px-0" v-for="carousel in carousels">
        <a :href="carousel.link">
          <img :src="'/images/carousels/' + carousel.image" style="height : 28em; width : 100%!important">
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
      :paginationEnabled="true"
      :perPageCustom="[[0, 1], [991.88, 1]]"
    >
      <slide class="px-0">
        <a href="/register"><img src="/images/assets/empty_carousel.gif" style="height : 28em; width : 100%!important"></a>
      </slide>
    </Carousel>
  </div>
</template>

<style scoped>
</style>


<script>
// import carousel from "vue-owl-carousel";
import { Carousel, Slide } from "vue-carousel";

export default {
  name: "carousel",
  components: { Carousel, Slide },
  data() {
    return {
      carousels: []
    };
  },
  methods: {
    getCarousels() {
      window.axios.get("/get-carousels").then(res => {
        this.carousels = res.data;
      });
    }
  },
  mounted() {
    this.getCarousels();
  }
};
</script>
