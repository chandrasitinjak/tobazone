<template>      
    <div class="cart-fav-box d-flex align-items-center mt-4" v-if="user_id != null ">
      <div v-if="datas.length != 0">
          
      </div>
      <div v-if="datas.length == 0">
        <button v-on:click="addToWishlist()" class="btn essence-btn">Tambah ke Wishlist</button>
        <i class="far fa-heart"></i>
      </div>
    </div>  
</template>

<script>
import EventBus from "../eventBus";

export default {
  props: ["userId", "productId"],
  data() {
    return {
      total: 1,
      datas: "",
      user_id: "",
    };
  },
  methods: {
    checkProduct() {
      // let id = this.productId;
      
      window.axios.get("/api/customer/"+this.userId+"/wishlists/"+this.productId)
        .then(res => {
            this.datas = res.data;
            console.log(this.datas);
        })
    },

    addToWishlist(){
      let payload = {
        productId: this.productId,
        userId: this.userId
      };

      // await window.axios.post("/api/wishlists", payload).then(res => {
      window.axios.post("/api/wishlist", payload)          
          .then(() => {       
            alert("berhasil menambahkan ke daftar wishlish anda")
            this.checkProduct();       
          })

        .catch(error => {
          console.log(error);
        });

      
    },
    
  },
  mounted() {
    this.checkProduct();
  }
};
</script>