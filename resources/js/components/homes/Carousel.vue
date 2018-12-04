<template>
  <div class style="margin-top: 100px;">
    <Carousel
        :autoplay="true"
        :nav="false"
        :loop="true"
        :speed="1000"
        :paginationActiveColor="761616"
        :paginationEnabled="true"
        :perPageCustom="[[0, 1], [991.88, 1]]">


      <slide class="px-2" v-for="carousel in carousels">
        <a :href="carousel.link">
          <img :src="'/images/carousels/' + carousel.image"/>
        </a>
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
        console.log(this.carousels);
      });
    }
  },
  mounted() {
    this.getCarousels();
  }
};
</script>
