<template>
  <div class="card globalcard">
    <div class="card-header">
      <div class="row">
        <div class="col-7">
          <h5>Barang yang Anda Pesan</h5>
        </div>
      </div>
    </div>
    <div class="card-body pt-0">
      <div v-for="cart in carts" class="row mt-4 pb-1" style="border-bottom: 1px solid #00000020">
        <div class="col-md-9 col-sm-12 col-xs-6">
          <div class="row">
            <div class="col-lg-4 col-sm-6 col-xs-12">
              <a href="single-product-details.html">
                <div class="imgwrapper" style="padding: 0px">
                  <img :src="'/images/' + JSON.parse(cart.product.images)[0]" alt="Card image cap">
                </div>
              </a>
            </div>
            <div class="col-lg-7 col-sm-6 col-xs-12">
              <div class="mb-1">{{ cart.product.name }}</div>
              <div class="small">
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
          <div class="float-right h6" style="color: #ff8415">Rp {{ cart.product.price * cart.total}}</div>
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
      merchants: []
    };
  },
  methods: {
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
              totalWeight: 1000 * cart.total * JSON.parse(cart.product.specification).weight,
              totalProductCost: cart.product.price * cart.total,
              totalShippingCost: 0,
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
                merchant.totalProductCost += cart.product.price * cart.total
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

      this.publishMerchantsListEvent(this.merchants)
    },
    async countShippingPrice(address) {
      await Promise.all(
        this.merchants.map(async merchant => {
          let shippingCost = 0;

          const payload = {
            origin: merchant.address.subdistrict_id,
            originType: "subdistrict",
            destination: address.subdistrict_id,
            destinationType: "subdistrict",
            weight: merchant.totalWeight,
            courier: "jne"
          };

          await window.axios.post("/api/shippingcost", payload).then(res => {
            shippingCost = res.data.rajaongkir.results[0].costs[0].cost[0].value;
          });

          merchant.totalShippingCost = shippingCost
        })
      );

      const transactionDetail = {
        merchants: this.merchants,
        customerAddress: address,
        customerId: this.userId,
      }

      this.publishFinalTransactionDetail(transactionDetail);
    },
    publishMerchantsListEvent(merchants) {
      EventBus.$emit("MERCHANT_LIST", merchants);
    },
    publishFinalTransactionDetail(transactionDetail) {
      EventBus.$emit("FINAL_TRANSACTION_DETAIL", transactionDetail);
    }
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
