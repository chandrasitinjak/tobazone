<template>
  <div>
    <div class="card globalcard">
      <div class="card-header">
        <nav class="navbar navbar-expand-sm navbar-light">
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle"
                  id="navbarDropdown"
                  role="button"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >Kategori</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" @click="filterProductByCategory('Alat Tenun Bukan Mesin')">Alat Tenun Bukan Mesin</a>
                  <a class="dropdown-item" @click="filterProductByCategory('Tradisional')">Tradisional</a>
                  <a class="dropdown-item" @click="filterProductByCategory('Mesin')">Mesin</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" @click="filterProductByCategory('')">Semua kategory</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle"
                  id="navbarDropdown1"
                  role="button"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >Urutkan Berdasarkan</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
                  <a class="dropdown-item" @click="sortProductByName('asc')">Nama A-Z</a>
                  <a class="dropdown-item" @click="sortProductByName('des')">Nama Z-A</a>
                  <a class="dropdown-item" @click="sortProductByPrice('asc')">Harga Termurah</a>
                  <a class="dropdown-item" @click="sortProductByPrice('des')">Harga Termahal</a>
                </div>
              </li>
            </ul>
            <div class="form-inline my-2 my-lg-0">
              <input
                class="form-control form-control-sm mr-sm-2"
                type="search"
                placeholder="Cari Produk"
                aria-label="Search"
                v-model="searchName"
                @input="filterProductByName"
              >
            </div>
          </div>
        </nav>
      </div>
      <div class="card-body">
        <div class="row">
          <div v-for="product in products" class="col-lg-3 col-sm-2 px-1">
            <div class="card products">
              <a :href="'/products/' + product.id">
                <div class="imgwrapper">
                  <img :src="'/images/' + JSON.parse(product.images)[0]" alt="Card image cap">
                </div>
              </a>
              <div class="card-body">
                <p class="card-title productname">{{ product.name }}</p>
                <h6 style="color: #ff5205">Rp {{ product.price }}</h6>
                <p class="card-text float-right">
                  <small class="text-muted">Stock {{ product.stock }}</small>
                </p>
              </div>
            </div>
          </div>
        </div>
        <!-- Pagination -->
        <nav aria-label="navigation">
          <ul class="pagination mt-50 mb-50">
            <li class="page-item">
              <a class="page-link" href="#">
                <i class="fa fa-angle-left"></i>
              </a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">1</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">2</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">3</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">...</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">21</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">
                <i class="fa fa-angle-right"></i>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</template>

<script>
export default {
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
        .get("/api/merchant/products/2")
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
        product.name.includes(this.searchName)
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
          return a.price > b.price ? 1 : -1;
        });
      } else {
        this.products = this.orginalProductsData.sort((a, b) => {
          return a.price < b.price ? 1 : -1;
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
