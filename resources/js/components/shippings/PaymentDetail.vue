<template>

    <div
        class="card shopsummary globalcard"
        style="position: -webkit-sticky; position: sticky; top: 6rem;"
    >
        <div class="card-header">
            <h5>Ringkasan Belanja</h5>
        </div>
        <div class="card-body">
            <div v-for="(merchant,id) in merchants">

                <div>
                    <span style="color : white">toko</span>
                    <span class="float-right font-weight-bold" style="color: #ff8415">{{ merchant.name }}</span>
                </div>
                <br>
                <div>
                    <span>Total Belanja</span>
                    <span class="float-right font-weight-bold">Rp. {{formatPrice( merchant.totalProductCost )}}</span>
                </div>
                <div>
                    <span class="">
                        <div class="btn-group btn-block">
                            <button type="button" class="btn btn-sm btn-block btn-primary dropdown-toggle"
                                    data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                Pilih Kurir
                            </button>
                            <div class="dropdown-menu"><button
                                v-for="(cost, idx) in merchant.all_shipping"
                                class="dropdown-item" @click="changeKurir(id,idx)" href="#">{{ cost.shipping_name }}: Rp.{{ formatPrice(cost.cost_shipping.cost) }} ({{cost.cost_shipping.etd}})</button>
                            </div>
                        </div>
                    </span>
                </div>
                <div>
                    <span>Ongkos Kirim</span>
                    <span class="float-right font-weight-bold">Rp. {{formatPrice (merchant.totalShippingCost) }}</span>
                </div>

                <div v-if="merchant.totalShippingCost == 0">
                    <p style="display : none">{{ cek = 1 }} </p>
                </div>
                <div v-else-if="merchant.totalShippingCost != 0">
                    <p style="display : none">{{ cek = 11 }} </p>
                </div>
                <!-- <div v-if="merchant.totalShippingCost != 0">
                <div>
                  <span>Kurir yang digunakan </span>
                  <span class="float-right font-weight-bold">{{ (merchant.courier_used) }}</span>
                </div> -->

                <!-- <div>
                  <span>Estimasi waktu(hari)</span>
                  <span class="float-right font-weight-bold">{{ (merchant.estimate_waktu) }}</span>
                </div> -->
                <!-- </div> -->

                <div style="border-bottom: 1px #b4b4b4 solid; margin: 10px 0px 10px 0px"></div>
                Total Pembayaran
                <div
                    class="float-right"
                    style="color: #ff8415"
                >Rp {{formatPrice( merchant.totalProductCost + merchant.totalShippingCost) }}
                </div>
                <div>
                    <span>Kurir</span>
                    <span class="float-right font-weight-bold">{{ merchant.courier_used }}({{ merchant.estimate_waktu }})</span>
                </div>
                <div v-if="merchants.length > 1">
                    <br>
                </div>
            </div>

            <div class="mt-3">
                <button class="btn essence-btn btn-block" @click.prevent="createOrder" :disabled="disable">Bayar
                </button>
            </div>
        </div>
        <!-- {{ merchants }} -->
    </div>

</template>

<script>
    import EventBus from "../../eventBus";

    export default {
        props: ["userId"],
        data() {
            return {
                merchants: [],
                finalPaymentDetail: null,
                disable: false,
                cek: 0,
                kurir: []
            };
        },
        methods: {
            formatPrice(value) {
                let val = (value / 1).toFixed().replace('.', ',')
                return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
            },
            registerListener() {
                EventBus.$on("MERCHANT_LIST", merchants => {
                    this.merchants = merchants;
                    // console.log(this.merchants);
                });

                EventBus.$on("FINAL_TRANSACTION_DETAIL", finalPaymentDetail => {
                    this.finalPaymentDetail = finalPaymentDetail;
                });

            },
            changeKurir(id, idx) {
                this.merchants[id].totalShippingCost = this.merchants[id].all_shipping[idx].cost_shipping.cost
                this.merchants[id].estimate_waktu = this.merchants[id].all_shipping[idx].cost_shipping.etd
                this.merchants[id].courier_code = this.merchants[id].all_shipping[idx].shipping_code
                this.merchants[id].courier_used = this.merchants[id].all_shipping[idx].shipping_name
                this.finalPaymentDetail.merchants[id] = this.merchants[id]
                // console.log(this.finalPaymentDetail.merchants[id])
            },
            createOrder() {

                //  this. registerListener();

                if (this.cek === 1) {

                } else {
                    this.disable = true

                    window.axios
                        .post("/api/transactions", this.finalPaymentDetail)
                        .then(res => {
                            if (this.finalPaymentDetail['merchants'].length == 1) {
                                window.location = "/customer/transactions/" + res.data.id
                            } else {
                                window.location = "/customer/" + this.userId + "/orders"
                            }
                        })
                        .catch(err => {
                            // console.log(err);
                            alert(err);
                        });
                }
            }
        },
        mounted() {
            this.registerListener();
        }
    };
</script>

<style>
</style>
