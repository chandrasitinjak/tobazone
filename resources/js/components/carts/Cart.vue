w<template>
  <div class="col-md-12 keranjang">
    <div class="card globalcard" style="min-height: 400px">
      <div class="card-header" v-if="carts.length > 0">
        <div class="row">
          <div class="col-5">
            <a href="/search" role="button" class="btn btn-toba">Belanja lagi</a>
          </div>
          <div class="col-7">
            <h5>Keranjang Belanja Anda</h5>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="row" v-if="carts.length > 0">
          <div class="col-md-12 d-none " style="margin-bottom: 2em">
            <div class="row font-bold d-none d-sm-block">
              <div class="col-md-6">Produk</div>
              <div class="col-md-4">Harga</div>
              <div class="col-md-2">Jumlah</div>
            </div>
          </div>
        </div>

        <div v-else-if="carts.length == 0" class="col-12 text-center mt-3">
          <img
            src="/images/assets/empty_cart.png"
            style="height: 120px; border: none; opacity: 0.5"
          >
          <p class="text font-bold mt-3">Keranjang belanja Anda kosong,</p>
          <a href="/search" class="btn essence-btn">Ayo Lanjut Berbelanja</a>
        </div>
            

        <div class="row" v-for="cart in carts">
          <div class="col-md-6 col-sm-12 col-xs-6">
            <div class="row">
              <div class="col-lg-4 col-sm-6 col-xs-12">
                <div class="imgwrapper" style="padding: 0px">
                  <img :src="'/images/' + JSON.parse(cart.product.images)[0]" alt="Card image cap">
                </div>
              </div>
              <div class="col-lg-8 col-sm-6 col-xs-12">
                <div class="keranjang-desc-prod">
                  <h6>{{ cart.product.name }}</h6>
                  {{ cart.product.description }}
                  <p> <b> Stok Tersedia : {{ cart.product.stock }} </b> </p>                  
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-6">
            <div
              class="keranjang-price-prod h5"
              style="color: #ff8415"
            >Rp {{formatPrice( cart.product.price )}}</div>
          </div>
          
          <div class="quantity col-5 col-md-2" v-if="cart.product.stock > 0">
            <div class="input-group input-group-sm">
              <div class="input-group-prepend">
                <div class="btn input-group-text" v-on:click="updateTotal(cart.id, 'minus')">-</div>
              </div>

              <input
                type="number"
                onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57"                            
                class="form-control"                
                v-model="cart.total"
                @change="updateCart(cart)"                
                min="1"
                :max="cart.product.stock"
              >

              <div class="input-group-prepend">
                <div class="btn input-group-text" v-on:click="updateTotal(cart.id, 'plus')">+</div>
              </div>

              <small style="color : red" v-if="cart.total >  cart.product.stock">Maksimal pembelian {{ cart.product.stock }},kurangi jumlah produk</small>                
            </div>
            <button
              type="button"              
              class="btn btn-outline-warning btn-sm mt-2" 
              data-toggle="modal" 
              v-on:click="parsingIdCart(cart.id)"  
              data-target="#deleteConfirmation">                              
              <span>
                <i class="fa fa-trash"></i> Hapus
              </span>
            </button>

            <!-- Modal -->
          <div class="modal fade" id="deleteConfirmation" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="deleteConfirmationLabel">Konfirmasi</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          <p>Apakah Anda Yakin Mau Menghapus?</p>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                          <button v-on:click="deleteCart(key_produk)" class="btn btn-danger" data-dismiss="modal">Hapus</button>
                      </div>
                  </div>
              </div>
          </div>
          </div>
         

          

          <div class="quantity col-5 col-md-2" v-if="cart.product.stock == 0">
              <small style="color : red">Stok Barang habis</small>          
              <button
              type="button"
              v-on:click="deleteCart(cart.id)"
              class="btn btn-outline-warning btn-sm mt-2" >                              
              <span>
                <i class="fa fa-trash"></i> Hapus dari keranjang
              </span>
            </button>      
          </div>
        </div>
      </div>

      <div class="card-footer" v-if="carts.length > 0">
        <div class="row justify-content-end">
          <div class="col-md-3 text-right">
            <h6>Total Bayar</h6>
            <h5>Rp. {{ formatPrice(getTotalPayment() )}}</h5>
          </div>
        </div>
        <div v-if="this.cek == 1">
        <a href="/shipping" class="btn essence-btn float-right">Lanjut Pembayaran</a>
        </div>

        <div v-else-if="this.cek != 1">
          <a class="btn essence-btn float-right" :disabled="true">Lanjut Pembayaran</a>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import EventBus from "../../eventBus";

export default {
  props: ["userId"],
  data() {
    return {
      carts: [],
      cek : 1,
      stok_produk : 0,
      key_produk: "",
      input_stock : 1,
    };
  },
  methods: {

    parsingIdCart(id_cart) {      
      this.key_produk = id_cart;
    },

    formatPrice(value) {
      let val = (value / 1).toFixed().replace(".", ",");
      return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    },
    async getCart() {
      EventBus.$emit("SPINNER", true);
      await window.axios.get("/api/carts/user/" + this.userId).then(res => {
        this.carts = res.data.carts;
        EventBus.$emit("SPINNER", false);
      });
    },
    async updateTotal(id, action) {
      for (let i = 0; i < this.carts.length; i++) {
        if (this.carts[i].id === id) {
          if (action === "minus") {
            if (this.carts[i].total > 1) {
              this.carts[i].total--;
              this.updateCart(this.carts[i]);
            } else {

            }
          } else {
            if (this.carts[i].product.stock > this.carts[i].total) {
              this.carts[i].total++;
              this.updateCart(this.carts[i]);              
            } else {              
              this.cek = 0;
            }
          }

          break;
        }
      }

      this.emitEvent(null);
    },
    async updateCart(cart) {

      if(cart.product.stock < cart.total) {        
        this.cek = 0;                
      } else {
      await window.axios.put("/api/carts/" + cart.id, cart).then(res => {                  
        this.emitEvent(null);
        this.cek = 1;
      });
      }
    },

    async deleteCart(id) {
      await window.axios.delete("/api/carts/" + id).then(res => {
        this.getCart();
        this.emitEvent(null);        
      });
    },
    getTotalPayment() {
      let total = 0;

      this.carts.forEach(cart => {
        total += cart.total * cart.product.price;

        if(cart.total > cart.product.stock ) {
          this.cek = 0;
        } else if(cart.total <= cart.product.stock ) {
          this.cek = 1;        
        }
      });

      return total;
    },
    emitEvent(data) {
      EventBus.$emit("CART_UPDATED", data);
    }
  },
  mounted() {
    this.getCart();
  }
};
</script>
