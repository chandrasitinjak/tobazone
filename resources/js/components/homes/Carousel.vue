 <template>
  <div class style="margin-top: 100px;">
    <carousel :autoplay="true" :nav="false" :items="1" :loop="true">
      <img src="/user-assets/img/bg-img/banner1.png" />
      <img src="/user-assets/img/bg-img/banner1.png" />
      <img src="/user-assets/img/bg-img/banner1.png" />
    </carousel>
  </div>
</template>

<style scoped>
</style>


<script>
import carousel from "vue-owl-carousel";

export default {
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
  },
  components: { carousel }
};
</script>
