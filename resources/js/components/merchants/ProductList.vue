<template>
  <div >
    <div class="card globalcard">
      <div class="card-header px-0">
        <nav class="navbar navbar-expand-lg mproduct p-1" style="background-color: transparent; border:none">
          <h5 class="mr-3">Produk</h5>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fa fa-bars"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
              <li class="d-lg-none">
                <a :href="'/products/create'" class="btn btn-sm btn-success">Tambah produk</a>
              </li>
              <li>
                <a
                   class="nav-link dropdown-toggle"
                   id="navbarDropdown"
                   role="button"
                   data-toggle="dropdown"
                   aria-haspopup="true"
                   aria-expanded="false"
                >Kategori</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" @click="filterProductByCategory('ulos')">Ulos</a>
                  <a class="dropdown-item" @click="filterProductByCategory('pakaian')">Pakaian</a>
                  <a class="dropdown-item" @click="filterProductByCategory('makanan')">Makanan</a>
                  <a class="dropdown-item" @click="filterProductByCategory('aksesoris')">Aksesoris</a>
                  <a class="dropdown-item" @click="filterProductByCategory('obat')">Obat</a>
                  <div class="dropdown-divider"></div>
                  <a  class="dropdown-item" @click="filterProductByCategory('')">Semua kategory</a>
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
                <div class="dropdown-menu" aria-labelledby="navbarDropdown1" style="left: 156px;">
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
                  placeholder="Cari Produk"
                  aria-label="Search"
                  v-model="searchName"
                  @input="filterProductByName"
              >
            </form>
          </div>
        </nav>
      </div>
      <div class="card-body">
        <div class="row">
          <div v-for="product in products" class="col-6 col-md-3 px-1">
            <div class="card products">
              <a :href="'/products/' + product.id">
                <div class="imgwrapper">
                  <img :src="'/images/' + JSON.parse(product.images)[0]" alt="Card image cap">
                </div>

              <div class="card-body">
                <p class="card-title productname" style=" white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 20ex;">{{ product.name }}</p>
                <h6 style="color: #ff5205">Rp {{ formatPrice(product.price) }}</h6>
                <p class="card-text float-right">
                  <small class="text-muted">Stok {{ product.stock }}</small>
                </p>
              </div>
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
  props: ['userId'],
  data() {
    return {
      products: [],
      orginalProductsData: [],
      searchName: ""
    };
  },
  methods: {
    getProducts() {
      window.axios
        .get("/api/merchant/products/" + this.userId)
        .then(res => {
          this.orginalProductsData = res.data;
          this.products = this.orginalProductsData;
        })
        .catch(err => {
          console.log(err);
        });
    },
    
    formatPrice(value) {
          let val = (value/1).toFixed().replace('.', ',')
          return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
    },

    filterProductByName() {
      this.products = this.orginalProductsData.filter(product =>
        product.name.includes(this.searchName)
      );
    },
    filterProductByCategory(category) {
      this.products = this.orginalProductsData.filter(product =>
        product.cat_product.includes(category)
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
  },
  mounted() {
    this.getProducts();
  }
};
</script>

<style>
</style>
