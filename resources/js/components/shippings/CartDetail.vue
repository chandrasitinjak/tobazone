<template>
  <div class="card globalcard">
    <spinner></spinner>
    <div class="card-header">
      <div class="row">
        <div class="col-12">
          <h5>Barang yang Anda Pesan </h5>
        </div>
      </div>
    </div>
    <div class="card-body pt-0">
      <div v-for="cart in carts" class="row mt-4 pb-1" style="border-bottom: 1px solid #00000020">
        <div class="col-md-9 col-sm-12 col-xs-6">
          <div class="row">
            <div class="col-lg-4 col-sm-6 col-xs-12">
              <a :href="'/products/' + cart.product.id" style="float: left;">
                <div class="imgwrapper" style="padding: 0px">
                  <img :src="'/images/' + JSON.parse(cart.product.images)[0]" alt="Card image cap">
                </div>
              </a>
            </div>
            <div class="col-lg-7 col-sm-6 col-xs-12">
              <div class="mb-1"><h6>{{ cart.product.name }}</h6></div>
              <div class="medium">
                <ul>
                  <li>
                    Jumlah :
                    <b>{{ cart.total }} buah</b>
                  </li>
                  <li>
                    Penjual :
                    <b>
                      {{ cart.product.merchant.profile.name }},
                      {{ JSON.parse(JSON.parse(cart.product.merchant.profile.address)[0]).city_name }}
                    </b>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="float-right h6" style="color: #ff8415">Rp {{formatPrice( cart.product.price * cart.total)}}</div>
        </div>
      </div>
    </div>
  </div>    
</template>

<script>
import EventBus from "../../eventBus";
import spinner from "../Spinner";

export default {
  props: ["userId"],
   components: {
    spinner
  },
  data() {
    return {
      carts: [],
      merchants: [],
      products: [], 
      addresses: [],     
      addres: null,
    };
  },
  methods: {
      formatPrice(value) {
          let val = (value/1).toFixed().replace('.', ',')
          return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
      },
    getProducts() {
      window.axios
        .get("/api/carts/user/" + this.userId)
        .then(res => {
          this.carts = res.data.carts;
          this.filterMerchants();
        })
        .catch(err => {
          console.log(err);
        });
    },
    async filterMerchants() {
      let merchantNames = [];

      await Promise.all(
        this.carts.map(async cart => {
          let merchantName = cart.product.merchant.profile.name;
          let merchantAddress = cart.product.merchant.profile.address;

          let found = merchantNames.find(function(element) {
            return element === merchantName;
          });

          if (!found) {
            merchantNames.push(merchantName);
            this.merchants.push({
              name: merchantName,
              id: cart.product.merchant.id,
              address: JSON.parse(JSON.parse(merchantAddress)[0]),
              // totalWeight : 2200,
              // totalWeight: 1000 * cart.total * JSON.parse(cart.product.specification).weight,
              totalWeight: cart.total * JSON.parse(cart.product.specification).weight,
              totalProductCost: cart.product.price * cart.total,
              totalShippingCost: 0,
              courier_used: "",
              estimate_waktu: "",
              courier_code: "",
              products: [
                {
                  productId: cart.product.id,
                  quantity: cart.total,
                  cartId: cart.id,
                }
              ]
            });
          } else {
            this.merchants.forEach(merchant => {
              if(merchant.name === merchantName) {
                merchant.totalProductCost += cart.product.price * cart.total;
                merchant.totalWeight += cart.total * JSON.parse(cart.product.specification).weight
                merchant.products.push(
                  {
                    productId: cart.product.id,
                    quantity: cart.total,
                    cartId: cart.id,
                  }
                )
              }
            });
          }
        })        
      );
      // console.log(this.merchants);
      
      this.publishMerchantsListEvent(this.merchants)
    },

    async getAddress() {
     await window.axios
        .get("/profile/" + this.userId)
        .then(res => {          
          this.addresses = JSON.parse(res.data.address);
          this.addres = JSON.parse(this.addresses[0]);        
          
          console.log("alamat : " + this.addres);
        })
        .catch(err => {
          console.log(err);
        });
    },

    async countShippingPrice(address) {

      await this.getAddress();

      if(address == null) {
        address = this.addres;
        console.log(address);
      }else {             
        console.log(address);
      }
       
      await Promise.all(
        this.merchants.map(async merchant => {
          let shippingCost = 0;
          let courier_used = "";
          let estimasi_waktu = "";
          let courier_code = "";
          
          const payload = {
            origin: merchant.address.subdistrict_id,
            originType: "subdistrict",
            destination: address.subdistrict_id,
            destinationType: "subdistrict",
            weight: merchant.totalWeight,
            // courier: "jne:sicepat:pos:ninja"
            courier: "pos"

          };          

          EventBus.$emit("SPINNER", true);                         
          await window.axios.post("/api/shippingcost", payload).then(res => {       
            
            var len_data = res.data.rajaongkir.results.length;
            var i;
            for(i=0; i<len_data; i++) {                 
              if(res.data.rajaongkir.results[i].costs.length != 0) {                                                     
                shippingCost = res.data.rajaongkir.results[i].costs[0].cost[0].value;
                estimasi_waktu = res.data.rajaongkir.results[i].costs[0].cost[0].etd;
                courier_used = res.data.rajaongkir.results[i].name;
                courier_code = res.data.rajaongkir.results[i].code;
                break;
                }
              }            

              EventBus.$emit("SPINNER", false);
          })
          .catch(error => {
              console.log(error);
              EventBus.$emit("SPINNER", false);
          });
          
          

          merchant.totalShippingCost = shippingCost;
          merchant.courier_used = courier_used;
          merchant.estimate_waktu = estimasi_waktu;
          merchant.courier_code = courier_code;
        })
      );

      const transactionDetail = {
        merchants: this.merchants,
        customerAddress: address,
        customerId: this.userId,
      }


      // console.log(transactionDetail);
      this.publishFinalTransactionDetail(transactionDetail);
    },

    
    publishMerchantsListEvent(merchants) {
      EventBus.$emit("MERCHANT_LIST", merchants);
    },

    publishFinalTransactionDetail(transactionDetail) {
      EventBus.$emit("FINAL_TRANSACTION_DETAIL", transactionDetail);
    },    
  },
  
  async mounted() {    
    await this.getProducts();

    EventBus.$on("ADDRESS_CHOOSEN", address => {
      this.countShippingPrice(address);      
    });
  }
};
</script>

<style>
</style>
