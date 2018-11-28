<template>
  <div class="blog-wrapper">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-6">
          <div class="single-blog-area mb-50">
            <img src="/images/1542352749ragihotang3.jpeg" alt>
            <!-- Post Title -->
            <div class="post-title">
              <a href="#">Filosofi Ulos</a>
            </div>
            <!-- Hover Content -->
            <div class="hover-content">
              <!-- Post Title -->
              <div class="hover-post-title">
                <a href="#">Filosofi Ulos</a>
              </div>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla, mollis eu metus in, sagittis
                fringilla tortor. Phasellus purus dignissim convallis.
              </p>
              <a href="single-blog.html">
                Continue reading
                <i class="fa fa-angle-right"></i>
              </a>
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
