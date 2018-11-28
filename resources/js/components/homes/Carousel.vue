 <template>

  <div class="" style="margin-top: 100px;" >
  <carousel1
      :autoplay="true"
      :nav="false"
      :items="1"
      :loop="true"
      >

    <img src="/user-assets/img/bg-img/banner1.png">
    <img src="/user-assets/img/bg-img/banner1.png">
    <img src="/user-assets/img/bg-img/banner1.png" >

  </carousel1>
  </div>
</template>

<style scoped>

</style>


<script>
    import carousel1 from 'vue-owl-carousel'

export default {
  mounted() {
    console.log("Carousel mounted.");
  },
    components: { carousel1 }
};
</script>
