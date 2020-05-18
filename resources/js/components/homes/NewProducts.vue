<template>
 <div class="row pt-4">
   <div class="col-md-12">
      <div class="row">
        <div class="col-md-12">
            <center>
              <h3>Ragam Produk</h3>
            </center>
        </div>
      </div>

      <div class="row" style="background-color : #d4cece">
        <div class="col-md-2 p-md-3" v-for="product in products">
            
                <a :href="'/products/' + product.id">
            <div class="card product ">
                <div class="imgwrapper" style="padding:0px;">
                  <img :src="'/images/' + JSON.parse(product.images)[0]" alt="Card image cap">
                </div>

              <div class="card-body" style="height:2rem">
                <!-- <p class="card-title productname">{{product.name}}</p> -->
                <p class="card-title productname" style=" white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 20ex;">{{product.name}}</p>
                <h6 style="color: #ff5205">Rp {{formatPrice (product.price)}}</h6>
                <p class="card-text float-right">
                  <small class="text-muted">{{ product.merchant.profile.name }}</small>
                </p>

              </div>
            </div>
            </a>            
        </div>
      </div>

      <div class="row p-4" style="">
        <div class="col-md-12">
            <center>
              <a href="/search">
                  <button class="btn btn-toba" type="button"
                    style="text-decoration-line: unset; "> Lihat Lebih Banyak
                  </button>
              </a>
            </center>
        </div>
      </div>
   </div>
 </div>

</template>

<script>
import carousel2 from "vue-owl-carousel";
import { Carousel, Slide } from "vue-carousel";
import EventBus from "../../eventBus";

export default {
  components: { carousel2, Carousel, Slide },
  props: ["userId", "title"],
  data() {
    return {
      products: []
    };
  },
  methods: {
      formatPrice(value) {
          let val = (value/1).toFixed().replace('.', ',')
          return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
      },

    async getAllProducts() {
      await window.axios
        .get("/api/products")
        .then(res => {
          this.products = res.data;
        })
        .catch(err => {
          console.log(err);
        });
    },
    async addToCart(id) {
      let payload = {
        productId: id,
        total: 1,
        userId: this.userId
      };
    
      await window.axios
        .post("/api/carts", payload)
        .then(res => {
          this.emitEvent(res.data);
        })
        .catch(err => {
          console.log(err);
        });
    },
    emitEvent(data) {
      EventBus.$emit("CART_UPDATED", data);
    }
  },
  mounted() {
    this.getAllProducts();
  }
};
</script>
