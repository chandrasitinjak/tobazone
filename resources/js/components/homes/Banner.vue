<template>
  <div class="slide">
    <div class="card globalcard" style="width: 100%!important;">
      <div class="card-header">
        <h5 style="float: left">Inspirasi Belanja</h5>
      </div>
      <div class="card-body" style="text-align: center;">
        <div class="flex">
          <div
            class="ab d-inline-flex"
            v-for="banner in banners"
            style="margin: 2px; min-width: 300px; width: 33%;"
          >
            <a :href="banner.link">
              <img :src="'/images/banners/' + banner.image" alt="Inspirasi Belanja" style>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
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
      });
    }
  },
  mounted() {
    this.getBanners();
  }
};
</script>

