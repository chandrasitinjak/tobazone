<template>
  <div class="col-md-12 slide">
    <div class="card globalcard ">
      <div class="card-header">
        <h5 style="float: left">Inspirasi Belanja</h5>
        <h6 style="float: right">
          <a href="shop.html" style="color: -webkit-link">Lihat Semua Produk</a>

        </h6>
      </div>
      <div class="card-body">
        <carousel3
            :autoplay="true"
            :nav="false"
            :dots="true"
            :items="3"
            :touchDrag="false"
            :mouseDrag="true"
            :loop="true">

          <div class="banner_item">
            <a href="single-product-details.html">
              <img src="/user-assets/img/bg-img/sindo_ulos_bandung_(3).jpg" alt="">
            </a>
          </div>
          <div class="banner_item">
            <a href="single-product-details.html">
              <img src="/user-assets/img/bg-img/sindo_ulos_bandung_(3).jpg" alt="">
            </a>
          </div>
          <div class="banner_item">
            <a href="single-product-details.html">
              <img src="/user-assets/img/bg-img/sindo_ulos_bandung_(3).jpg" alt="">
            </a>
          </div>


        </carousel3>
      </div>
    </div>
  </div>
</template>

<script>
    import carousel3 from 'vue-owl-carousel'

    export default {
        components: {carousel3}
    }
</script>

