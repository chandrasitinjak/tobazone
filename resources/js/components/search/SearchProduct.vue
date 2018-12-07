<template>
  <div>
    <div class="card globalcard" style="min-height: 400px">
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
                  <a class="dropdown-item" @click="filterProductByCategory('ATBM')">Alat Tenun Bukan Mesin</a>
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
                  placeholder="Filter Nama"
                  aria-label="Search"
                  v-model="searchName"
                  @input="filterProductByName"
              >
            </div>
          </div>
        </nav>
      </div>
      <div class="card-body">
        <div class="" v-if="products.length>0">
          <div class="row">
            <div v-for="product in products" class="col-lg-2 col-md-2 col-sm-2 px-1">
              <div class="card products">
                <a :href="'/products/' + product.id">
                  <div class="imgwrapper">
                    <img :src="'/images/' + JSON.parse(product.images)[0]" alt="Card image cap">
                  </div>
                </a>
                <div class="card-body">
                  <p class="card-title productname">{{ product.name }}</p>
                  <h6 style="color: #ff5205">Rp {{formatPrice( product.price )}}</h6>
                  <p class="card-text float-right">
                    <small class="text-muted"> {{ product.merchant.profile.name }}</small>
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
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
  props: ['keyword'],
  data() {
    return {
      products: [],
      orginalProductsData: [],
      searchName: ""
    };
  },
  methods: {
      formatPrice(value) {
          let val = (value/1).toFixed().replace('.', ',')
          return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
      },
    getProducts() {
      let payload = {
        keyword: this.keyword
      }

      window.axios
        .post("/api/product/search/", payload)
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
