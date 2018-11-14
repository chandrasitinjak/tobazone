<template>
  <div class="container mt-100">
    <div class="col-md-12 keranjang">
      <div class="card globalcard ">
        <div class="card-header" v-if="carts.length > 0">
          <div class="row">
          <div class="col-5">
            <a href="/" role="button" class="btn btn-sm btn-outline-primary">Belanja lagi</a>
          </div>
          <div class="col-7">
            <h5>Keranjang Belanja</h5>
          </div>
        </div>
        </div>
        <div class="card-body">
          <div class="row" v-if="carts.length > 0">
            <div class="col-md-12" style="margin-bottom: 2em">
              <div class="row font-bold">
                <div class="col-md-6">
                  Produk
                </div>
                <div class="col-md-4">
                  Harga
                </div>
                <div class="col-md-2">
                  Jumlah
                </div>
              </div>
            </div>
          </div>

          <div v-else class="col-12 center center-block align-center">
            <img src="/images/emptycart.png" />
            <p class="text font-bold"> 
              Keranjang belanja Anda kosong, <a href="/"> <p class="text"> Ayo Lanjut Berbelanja </p> </a> 
            </p>
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
                    <h6> {{ cart.product.name }}</h6>
                    {{ cart.product.description }}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-6">
              <div class="keranjang-price-prod h5" style="color: #ff8415">
                Rp {{ cart.product.price }}
              </div>
            </div>
            <div class="quantity col-md-2 col-sm-12 col-xs-12">
              <div class="input-group input-group-sm">
                <div class="input-group-prepend">
                  <div class="btn input-group-text" v-on:click="updateTotal(cart.id, 'minus')"> - </div>
                </div>

                <input type="number" class="form-control" v-model="cart.total" v-on:change="updateCart(cart)" min="1" :max="cart.product.stock">
                
                <div clascart.totals="input-group-prepend">
                  <div class="btn input-group-text" v-on:click="updateTotal(cart.id, 'plus')"> + </div>
                </div>
              </div>
              <button type="button" v-on:click="deleteCart(cart.id)" class="btn btn-outline-warning btn-sm mt-2 ">
                <span> <i class="fa fa-trash"></i> Hapus </span> 
              </button>
            </div>
          </div>
        </div>
        
        <div class="card-footer" v-if="carts.length > 0">
          <div class="row justify-content-end">
            <div class="col-md-3 text-right">
              <h6> Total Bayar</h6>
              <h5>Rp. {{ getTotalPayment() }}</h5>
            </div>
          </div>

          <a href="/shipping" class="btn btn-primary float-right">Lanjut Pembayaran</a>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

import EventBus from '../../eventBus'

export default {
  props: ['userId'],
  data() {
    return {
      carts: [],
    };
  },
  methods: {
    async getCart() {
      await window.axios.get("/api/carts/user/" + this.userId).then(res => {
        this.carts = res.data
        console.log(this.carts)
      });
    },
    async updateTotal(id, action) {

      for(let i=0; i<this.carts.length; i++) {
        if(this.carts[i].id === id) {
          if(action === 'minus') {
            if(this.carts[i].total > 1) {
              this.carts[i].total--;
              this.updateCart(this.carts[i])
            }
          } else {
            if(this.carts[i].product.stock > this.carts[i].total) {
              this.carts[i].total++;
              this.updateCart(this.carts[i])
            }
          }

          break
        }
      }
    },
    async updateCart(cart) {
      await window.axios.put('/api/carts/' + cart.id, cart).then(res => {
        console.log(res.data)
      })
    },
    async deleteCart(id){
      await window.axios.delete('/api/carts/' + id).then(res => {
        this.getCart()
        this.emitEvent(null)
      })
    },
    getTotalPayment() {
      let total = 0;

      this.carts.forEach(cart => {
        total += cart.total * cart.product.price
      });

      return total
    },
    emitEvent(data) {
      EventBus.$emit('CART_UPDATED', data)
    }
  },
  mounted() {
    this.getCart()
  }
};
</script>
