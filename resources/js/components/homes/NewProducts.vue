<template>
  <div>
    <div class="card globalcard" style="min-height: 400px; background-color: #fffaf3">
      <div class="card-header">
        <nav class="navbar navbar-expand-lg mproduct p-1" style="background-color: transparent; border:none">
           <h3 class="m-auto">Ragam Produk</h3>
        </nav>
      </div>
      <div class="card-body" style="padding : 0.7rem">
        <div class="" v-if="products.length>0">
          <div class="row">
            <div v-for="product in products" class="col-6 col-md-2 col-lg-2 px-1">
              <div class="card products">
                <a :href="'/products/' + product.id">
                  <div class="imgwrapper">
                    <img :src="'/images/' + JSON.parse(product.images)[0]" alt="Card image cap" style="width: 180px; heigh: 168px">
                  </div>
                </a>
                <div class="card-body">
                  <p class="card-title productname" style=" white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 20ex;">{{ product.name }}</p>
                  <h6 style="color: #ff5205">Rp {{formatPrice( product.price )}}</h6>

                  <div v-if="userId == null">
                  <p class="card-text float-right">
                     <small class="text-muted"> {{ product.merchant.profile.name }}</small>
                  </p>
                  </div>

                  <div v-if="userId != null">
                    <p class="card-text float-left">
                      <small class="text-muted"> {{ product.merchant.profile.name }}</small>
                    </p>
                    <div>
                    <button style="border : 0px; background-color: white" class="float-right" v-on:click="addToWishlist(product.id)"> <i class="fa fa-heart-o"></i> </button>
                    </div>
                  </div>
                    <!-- <div >
                      <i class="fas fa-heart"></i>
                        <i class="far fa-heart"></i>
                    </div>                     -->

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-12">
          <center>
            <a href="/search">
                <button class="btn essence-btn" type="button"
                  style="text-decoration-line: unset; "> Lihat Lebih Banyak
                </button>
            </a>
          </center>
          <br><br>
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
      products: [],
      datas: "",
      data: "",
      id_producs: []
    };
  },
  methods: {


      check_idProd(id_product) {
        var len = this.id_producs.length;
        var i = 0;

        for(i=0; i<len; i++) {
          if(id_product == this.id_producs.length[i]) {
            return 1;
            break;
          }
        }

      },

      async checkProduct(id_product) {

      await window.axios.get("/api/customer/"+this.userId+"/wishlists/"+id_product)
        .then(res => {
            this.datas = res.data;
        })
      },

      async addToWishlist(id_product){
      await this.checkProduct(id_product);

      if(this.datas.length != 0) {
        alert("Sudah ada di daftar produk favorit Anda");
      }
       else {
          let payload = {
            productId: id_product,
            userId: this.userId
          };
        
      // await window.axios.post("/api/wishlists", payload).then(res => {
        window.axios.post("/api/wishlist", payload)
            .then(() => {
              alert("Berhasil ditambahkan ke daftar produk favorit Anda")
            })

          .catch(error => {
            console.log(error);
          });
        }
    },

      formatPrice(value) {
          let val = (value/1).toFixed().replace('.', ',')
          return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
      },

    async getAllMyWishList() {
      await window.axios.get("/api/customer/"+this.userId+"/wishlists/")
        .then(res => {
            this.data = res.data;            
            var i;
            for(i=0; i<this.data.length; i++) {                
                this.id_producs[i] = this.data[i].product_id;
            }            
        })
    },

    async getAllProducts() {
      await window.axios
        .get("/api/products")
        .then(res => {
          this.products = res.data;
          // console.log(this.products);
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
    this.getAllMyWishList();
    this.getAllProducts();

  }
};
</script>