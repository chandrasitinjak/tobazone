<template>
  <div class="col-md-12">
    <div class="card globalcard">
      <div class="card-header">
        <h5 style="float: left">Produk Terbaru</h5>
        <h6 style="float: right">
          <a href="shop.html" style="color: -webkit-link">see more</a>
        </h6>
      </div>
      <div class="card-body globalcardbody">
        <carousel
          :mouse-drag="true"
          :scrollPerPage="true"
          :spacePadding="20"
          :speed="800"
          :paginationEnabled="false"
          :perPageCustom="[[0, 1], [991.88, 6]]"
        >
          <slide class="px-2" v-for="product in products">
            <div class="card product ">
              <a :href="'/products/' + product.id">
                <div class="imgwrapper">
                  <img :src="'/images/' + JSON.parse(product.images)[0]" alt="Card image cap">
                </div>
              </a>

              <div class="card-body">
                <p class="card-title productname">{{product.name}}</p>
                <h6 style="color: #ff5205">Rp {{product.price}}</h6>
                <p class="card-text float-right">
                  <small class="text-muted">{{ product.merchant.profile.name }}</small>
                </p>
                <!--<div class="hover-content">-->
                  <!--<div class="add-to-cart-btn">-->
                    <!--<button v-on:click="addToCart(product.id)" class="btn product-btn">Add to Cart</button>-->
                  <!--</div>-->
                <!--</div>-->
              </div>
            </div>
          </slide>
        </carousel>
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
  props: ["userId"],
  data() {
    return {
      products: []
    };
  },
  methods: {
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
