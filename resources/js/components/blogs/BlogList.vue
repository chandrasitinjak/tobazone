<template>

  <div class="container" style="margin-top: 100px; ">
    <div class="card globalcard blog" style="min-height: 400px">

      <div class="card-body">
        <div class="row">
        <div class="card-deck">
          <div class="col-4">
            <div class="card blogcard " style="border: none">
              <div class="card-header blogpict" style="background-image: url('/images/banners/ulos modif.jpg');">
                <!--<img src="/images/banners/ulos modif.jpg" alt>-->
              </div>
              <div class="card-body px-0">

                <!-- Post Title -->
                <div class="h4">
                  <a href="#">
                  <h4>Filosofi Ulos</h4>
                  </a>
                </div>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla, mollis eu metus in, sagittis
                  fringilla tortor. Phasellus purus dignissim convallis.
                </p>
                <a href="#">
                  Continue reading
                  <i class="fa fa-angle-right"></i>
                </a>

                </div>
              </div>
            </div>
          <div class="col-4">
            <div class="card blogcard" style="border: none">
              <div class="card-header blogpict " style="background-image: url('/images/banners/alattenun.jpg')">
                <!--<img src="/images/banners/ulos modif.jpg" alt>-->
              </div>
              <div class="card-body px-0">

                <!-- Post Title -->
                <div class="h4">
                  <a href="#">
                    <h4>Macam Pembuatan Ulos</h4>
                  </a>
                </div>
                <p>
                  ATBM (Alat Tenun Bukan Mesin) adalah alat pembuat kain dasar untuk dijadikan sebagai kain tenun tradisional. ATBM terdiri dari rangka kayu yang gerakan mekaniknya dilakukan oleh ...
                </p>
                <a href="#">
                  Continue reading
                  <i class="fa fa-angle-right"></i>
                </a>

              </div>
            </div>
          </div>
          <div class="col-4">
            <div class="card blogcard" style="border: none">
              <div class="card-header blogpict" style="background-image: url('/images/banners/ulos modif.jpg');">
                <!--<img src="/images/banners/ulos modif.jpg" alt>-->
              </div>
              <div class="card-body px-0">

                <!-- Post Title -->
                <div class="h4">
                  <a href="#">
                    <h4>Filosofi Ulos</h4>
                  </a>
                </div>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla, mollis eu metus in, sagittis
                  fringilla tortor. Phasellus purus dignissim convallis.
                </p>
                <a href="#">
                  Continue reading
                  <i class="fa fa-angle-right"></i>
                </a>

              </div>
            </div>
          </div>
          <div class="col-4">
            <div class="card blogcard" style="border: none">
              <div class="card-header blogpict" style="background-image: url('/images/banners/sindo_ulos_bandung.jpg');">
                <!--<img src="/images/banners/ulos modif.jpg" alt>-->
              </div>
              <div class="card-body px-0">

                <!-- Post Title -->
                <div class="h4">
                  <a href="#">
                    <h4>Tips Merawat Tenun Ulos</h4>
                  </a>
                </div>
                <p>
                  adu padan kain songket membuat apa saja terlihat mewah.
                  Kain jenis ini ditenun dengan menggunakan benang emas dan perak.
                  Beberapa yang lain menggunakan benang sutera, benang sulam, atau
                  benang katun berwarna sebagai bahan dasar. Bahannya yang istimewa dan
                  pembuatannya yang rumit membuat kain asal Sumatera ini perlu perawatan khusus...

                </p>
                <a href="#">
                  Continue reading
                  <i class="fa fa-angle-right"></i>
                </a>

              </div>
            </div>
          </div>
        </div>
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
      blogs: []
    };
  },
  methods: {
    getBlogs() {
      window.axios.get('/get-blogs').then(res => {
        this.blogs = res.data
        console.log(this.blogs)
      }).catch(err => {
        console.log(err)
      })
    }
  },
  created() {
    this.getBlogs();
  }
};
</script>

<style>
</style>
