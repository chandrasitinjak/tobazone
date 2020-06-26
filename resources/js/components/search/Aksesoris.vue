<template>
  <div>
    <div class="card globalcard" style="min-height: 400px">
      <div class="card-header">
        <nav class="navbar navbar-expand-lg mproduct p-1" style="background-color: transparent; border:none">
          <h5 class="mr-3">Filter Aksesoris</h5>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fa fa-bars"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
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
                <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="left: 10rem;">
                  <a class="dropdown-item" @click="filterProductByCategory('Buatan Tangan')">Buatan Tangan</a>
                  <a class="dropdown-item" @click="filterProductByCategory('Buatan Mesin')">Buatan Mesin</a>                  
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
                <div class="dropdown-menu" aria-labelledby="navbarDropdown1" style="left: 15rem;">
                  <a class="dropdown-item" @click="sortProductByName('asc')">Nama A-Z</a>
                  <a class="dropdown-item" @click="sortProductByName('des')">Nama Z-A</a>
                  <a class="dropdown-item" @click="sortProductByPrice('asc')">Harga Termurah</a>
                  <a class="dropdown-item" @click="sortProductByPrice('des')">Harga Termahal</a>
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
                >Kabupaten</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown1" style="left: 23.3rem;">
                  <a class="dropdown-item" @click="sortProductByDistrict('Dairi')">Dairi</a>                  
                  <a class="dropdown-item" @click="sortProductByDistrict('Humbang Hasundutan')">Humbang Hasundutan</a>                  
                  <a class="dropdown-item" @click="sortProductByDistrict('Karo')">Karo</a>                  
                  <a class="dropdown-item" @click="sortProductByDistrict('Pakpak Bharat')">Pakpak Bharat</a>                                                                                
                  <a class="dropdown-item" @click="sortProductByDistrict('Samosir')">Samosir</a>
                  <a class="dropdown-item" @click="sortProductByDistrict('Simalungun')">Simalungun</a>
                  <a class="dropdown-item" @click="sortProductByDistrict('Tapanuli Utara')">Tapanuli Utara</a>
                  <a class="dropdown-item" @click="sortProductByDistrict('Toba Samosir')">Toba Samosir</a>     
                  <a class="dropdown-item" @click="sortProductByDistrict('')">Semua Kabupaten</a>     
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
          </div>
        </nav>
      </div>
      <div class="card-body">
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
                </div>
              </div>
            </div>
          </div>
        </div>

        <div v-else class="col-12 center center-block align-center text-center">
          <img src="/images/assets/search_result_empty.png" style="height: 120px; border: none; opacity: 0.5"/>
          <p class="text font-bold">
            <br>
            Oops, produk tidak ditemukan :(
          </p>
          <div class="btn essence-btn " id="searchagain">Lakukan Pencarian Baru</div>
        </div>

      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ['userId'],
  data() {
    return {
      products: [],
      orginalProductsData: [],
      searchName: "",
      datas: ""
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
    getProducts() {
      let payload = {
        keyword: this.keyword
      }

      window.axios
        .get("/api/product/aksesoris")
        .then(res => {
          this.orginalProductsData = res.data;
          this.products = this.orginalProductsData;
        })
        .catch(err => {
          console.log(err);
        });
    },
    filterProductByName() {
      this.products = this.orginalProductsData.filter(product =>
        product.name.toLowerCase().includes(this.searchName.toLowerCase())
      );
    },
    filterProductByCategory(category) {
      this.products = this.orginalProductsData.filter(product =>
        product.category.includes(category)
      );
    },
    sortProductByName(type) {
      if (type === "asc") {
        this.products = this.orginalProductsData.sort((a, b) => {
          return a.name > b.name ? 1 : -1;
        });
      } else {
        this.products = this.orginalProductsData.sort((a, b) => {
          return a.name < b.name ? 1 : -1;
        });
      }
    },
    sortProductByPrice(type) {
      if (type === "asc") {
        this.products = this.orginalProductsData.sort((a, b) => {
          return parseInt(a.price) > parseInt(b.price) ? 1 : -1;
        });
      } else {
        this.products = this.orginalProductsData.sort((a, b) => {
          return parseInt(a.price) < parseInt(b.price) ? 1 : -1;
        });
      }
    },

    sortProductByDistrict(distric) {
      if(distric === "Samosir") {
          this.products = this.orginalProductsData.filter(product => 
            product.asal === "Samosir"
          );
      } else if(distric === "Toba Samosir") {
          this.products = this.orginalProductsData.filter(product => 
            product.asal === "Toba Samosir"
          );
      } else {
          this.products = this.orginalProductsData.filter(product => 
            product.asal.includes(distric)
          );
      }
      
    }
  },
  mounted() {
    this.getProducts();
  }
};
</script>

<style>
</style>
