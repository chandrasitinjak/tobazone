<template>
  <div>
    <div class="card globalcard" style="min-height: 400px; background-color: #fffaf3">
      <div class="card-header">
        <nav class="navbar navbar-expand-lg mproduct p-1" style="background-color: transparent; border:none">
           <h3 class="m-auto">Ragam Produk</h3>
          <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fa fa-bars"></span>
          </button> -->

          <!-- <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
              <li>
                <a
                    class="nav-link dropdown-toggle"
                    id="navbarDropdown"
                    role="button"
                    data-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                >Kategori</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="left: 9rem;">
                  <a class="dropdown-item" @click="filterProductByCategory('ulos')">Ulos</a>
                  <a class="dropdown-item" @click="filterProductByCategory('pakaian')">Pakaian</a>
                  <a class="dropdown-item" @click="filterProductByCategory('makanan')">Makanan</a>
                  <a class="dropdown-item" @click="filterProductByCategory('obat')">Obat</a>
                  <a class="dropdown-item" @click="filterProductByCategory('aksesoris')">Aksesoris</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" @click="filterProductByCategory('')">Semua kategori</a>
                </div>
              </li>
              <li>
                <a
                    class="nav-link dropdown-toggle"
                    id="navbarDropdown1"
                    role="button"
                    data-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                >Urutkan Berdasarkan</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown1" style="left: 13rem;">
                  <a class="dropdown-item" @click="sortProductByName('asc')">Nama A-Z</a>
                  <a class="dropdown-item" @click="sortProductByName('des')">Nama Z-A</a>
                  <a class="dropdown-item" @click="sortProductByPrice('asc')">Harga Termurah</a>
                  <a class="dropdown-item" @click="sortProductByPrice('des')">Harga Termahal</a>
                </div>
              </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
              <input
                  class="form-control form-control-sm mr-sm-2"
                  type="search"
                  placeholder="Filter Nama"
                  aria-label="Search"
                  v-model="searchName"
                  @input="filterProductByName"
              >
            </form>
          </div> -->
        </nav>
      </div>
      <div class="card-body" style="padding : 0.7rem">
        <div class="" v-if="products.length>0">
          <div class="row">
            <div v-for="product in products" class="col-6 col-md-2 col-lg-2 px-1">              
              <div class="card products">
                <a :href="'/products/' + product.id">
                  <div class="imgwrapper">
                    <img :src="'/images/' + JSON.parse(product.images)[0]" alt="Card image cap">
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
    </div>
    <div class="row" style="">
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
    };
  },
  methods: {


      async checkProduct(id_product) {      
      
      await window.axios.get("/api/customer/"+this.userId+"/wishlists/"+id_product)
        .then(res => {
            this.datas = res.data;
            // console.log(this.datas);
        })
      },

      async addToWishlist(id_product){
      
      await this.checkProduct(id_product);      

      if(this.datas.length != 0) {
        alert("Sudah ada didaftar wishlist anda");
      }
       else {
          let payload = {
            productId: id_product,
            userId: this.userId
          };

      // await window.axios.post("/api/wishlists", payload).then(res => {
        window.axios.post("/api/wishlist", payload)          
            .then(() => {       
              alert("berhasil menambahkan ke daftar wishlish anda")                  
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
