<template>
    <div>
        <div class="card globalcard breadcrumbcard card-body">
            <div class="row">
                <div class="col-md-4">
                    <h5>Pesanan</h5>
                </div>
            </div>
        </div>
        <div>
            <div class="card globalcard" style="min-height: 400px">
                <div class="card-header">
                    <nav class="tabbable">
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a
                                class="nav-item nav-link active"
                                id="pesananbaru-tab"
                                data-toggle="tab"
                                href="#pesanansaatini"
                                role="tab"
                                aria-controls="home"
                                aria-selected="true"
                            >Pesanan Saat Ini</a>
                            <a
                                class="nav-item nav-link"
                                id="Konfirmasi-tab"
                                data-toggle="tab"
                                href="#konfirmasi"
                                role="tab"
                                aria-controls="profile"
                                aria-selected="false"
                            >Pesanan Selesai</a>
                        </div>
                    </nav>
                    <div class="tab-content pt-2" id="myTabContent">
                        <div
                            class="tab-pane fade show active"
                            id="pesanansaatini"
                            role="tabpanel"
                            aria-labelledby="pesananbaru-tab"
                        >
                            <div class="detailorder mt-2" v-for="transaction in transactions">
                                <div class="row" v-if="transaction.status === 'pending' || transaction.status === 'acceptedByAdmin' || transaction.status === 'acceptedByMerchant' || transaction.status === 'acceptedBySystem' || transaction.status === 'readyForProcess' || transaction.status === 'waitForVerified'">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header" style="background-color: #f1f1f1">
                                                <div class="row text-muted">
                                                    <div class="col-sm-2 small">Tanggal Transaksi</div>
                                                    <div class="col-sm-1 small">Nama Toko</div>
                                                    <div class="col-sm-2 small">Total pembayaran</div>
                                                    <div class="col-sm-1 small">Kurir</div>
                                                    <div class="col-sm-2 small">No Resi Pengiriman</div>
                                                    <div class="col-sm-4 small">Status</div>
                                                </div>
                                                <div class="row detail">
                                                    <div class="col-sm-2">{{transaction.created_at }}</div>
                                                    <div class="col-sm-1">{{transaction.merchant.profile.name}}</div>
                                                    <div
                                                        class="col-sm-2 bold"
                                                        style="color: orangered"
                                                    >Rp {{ formatPrice ( getTotalPayment(transaction.payment))}}</div>
                                                    <div class="col-sm-1">{{transaction.courier}}</div>
                                                    <div class="col-sm-2">{{transaction.shipping_number}}</div>
                                                    <div class="col-sm-4">
                                                        <div class="alert alert-warning p-1" role="alert" style="font-size: x-small" v-if="transaction.status === 'pending' || transaction.status === 'acceptedByMerchant' || transaction.status === 'acceptedByAdmin'">
                                                            Menunggu Pembayaran
                                                            <a :href="'/customer/transactions/' + transaction.id" class="btn btn-sm btn-outline-action ml-30">
                                                                Upload bukti pembayaran
                                                            </a>
                                                        </div>

                                                        <div class="alert alert-warning p-1" role="alert" style="font-size: x-small" v-else-if="transaction.status === 'readyForProcess' && transaction.shipping_number !== null">
                                                            Barang dalam pengiriman
                                                            <a :href="'/customer/' + userId + '/transactions/' + transaction.id + '/tracking'" class="btn btn-sm btn-outline-action ml-30">
                                                                Lacak Pengiriman
                                                            </a>
                                                        </div>

                                                        <div class="alert alert-warning p-1" role="alert" style="font-size: x-small" v-else-if="transaction.status === 'waitForVerified'">
                                                            Sudah mengirim bukti pembayaran, menunggu verifikasi
                                                        </div>

                                                        <div class="alert alert-warning p-1" role="alert" style="font-size: x-small" v-else-if="transaction.status === 'acceptedByMerchant'">
                                                            Sudah diterima penjual
                                                        </div>

                                                        <div class="alert alert-warning p-1" role="alert" style="font-size: x-small" v-else-if="transaction.status === 'acceptedBySystem' || transaction.shipping_number === null">
                                                            Sudah dibayar, menunggu diproses penjual
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body" v-for="order in transaction.orders">
                                                <div class="row singleorderprod" style=" padding-bottom: 10px">
                                                    <div class="col-md-12 col-sm-12 col-xs-6">
                                                        <div class="row">
                                                            <div class="col-sm-2 col-xs-12">
                                                                <div class="imgwrapper pesanan" style="padding: 0px; height: auto">
                                                                    <img
                                                                        :src="'/images/' + JSON.parse(order.product.images)[0]"
                                                                        alt="Card image cap"
                                                                    >
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 col-xs-12">
                                                                <div class="keranjang-desc-prod">
                                                                    <h6>{{ order.product.name }}</h6>
                                                                    <h6
                                                                        style="color: #FF5205; display: inline;"
                                                                    >Rp {{formatPrice( order.price )}}</h6>
                                                      pesanan               >Rp {{formatPrice( order.price )}}</h6>
                                                                    <br>
                                                                    <small>Jumlah {{ order.quantity }}</small>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3 col-xs-12">
                                                                <div class="address">
                                                                    <h6>Alamat </h6>
                                                                    <p>{{transaction.address}}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div
                            class="tab-pane fade"
                            id="konfirmasi"
                            role="tabpanel"
                            aria-labelledby="Konfirmasi-tab"
                        >
                            <div class="detailorder mt-2" v-for="transaction in transactions">
                                <div class="row" v-if="transaction.status === 'orderSuccessed' || transaction.status === 'rejectedByAdmin' || transaction.status === 'rejectedByMerchant' || transaction.status === 'canceledBySistem' || transaction.status === 'invalidProofOfPayment'">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header" style="background-color: #f1f1f1">
                                                <div class="row text-muted">
                                                    <div class="col-sm-2 small">Tanggal Transaksi</div>
                                                    <div class="col-sm-1 small">Nama Toko</div>
                                                    <div class="col-sm-2 small">Total pembayaran</div>
                                                    <div class="col-sm-1 small">Kurir</div>
                                                    <div class="col-sm-2 small">No Resi Pengiriman</div>
                                                    <div class="col-sm-4 small">Status</div>
                                                </div>
                                                <div class="row detail">
                                                    <div class="col-sm-2">{{ transaction.created_at }}</div>
                                                    <div class="col-sm-1">{{transaction.merchant.profile.name}}</div>
                                                    <div
                                                        class="col-sm-2 bold"
                                                        style="color: orangered"
                                                    >Rp {{ formatPrice ( getTotalPayment(transaction.payment))}}</div>
                                                    <div class="col-sm-1">{{transaction.courier}}</div>
                                                    <div class="col-sm-2">{{transaction.shipping_number}}</div>
                                                    <div class="col-sm-4">
                                                        <div class="alert alert-warning p-1" role="alert" style="font-size: x-small" v-if="transaction.status === 'rejectedByAdmin'">
                                                            Ditolak oleh Admin
                                                        </div>

                                                        <div class="alert alert-warning p-1" role="alert" style="font-size: x-small" v-else-if="transaction.status === 'rejectedByMerchant'">
                                                            Ditolak oleh Penjual
                                                        </div>

                                                        <div class="alert alert-warning p-1" role="alert" style="font-size: x-small" v-else-if="transaction.status === 'invalidProofOfPayment'">
                                                            Ditolak oleh Admin karena bukti pembayaran tidak valid
                                                        </div>

                                                        <div class="alert alert-warning p-1" role="alert" style="font-size: x-small" v-else-if="transaction.status === 'canceledBySistem'">
                                                            Tidak melakukan pembayaran melewati batas waktu pembayaran
                                                        </div>

                                                        <div class="alert alert-warning p-1" role="alert" style="font-size: x-small" v-else-if="transaction.status === 'orderSuccessed'">
                                                            Transaksi Sukses
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body" v-for="order in transaction.orders">
                                                <div class="row singleorderprod" style=" padding-bottom: 10px">

                                                    <div class="col-md-8">
                                                        <a :href="'/customer/' + userId + '/transactions/' + transaction.id + '/tracking'">
                                                            <div class="row">
                                                                <div class="col-sm-2 col-xs-12">
                                                                    <div class="imgwrapper pesanan" style="padding: 0px; height: auto">
                                                                        <img
                                                                            :src="'/images/' + JSON.parse(order.product.images)[0]"
                                                                            alt="Card image cap"
                                                                        >
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6 col-xs-12">
                                                                    <div class="keranjang-desc-prod">
                                                                        <h6>{{ order.product.name }}</h6>
                                                                        <h6
                                                                            style="color: #FF5205; display: inline;"
                                                                        >Rp {{formatPrice(order.price)}}</h6>
                                                                        <br>
                                                                        <small>Jumlah {{ order.quantity }}</small>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4 col-xs-12">
                                                                    <div class="address">
                                                                        <h6>Alamat </h6>
                                                                        <p>{{transaction.address}}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div v-if="transaction.status === 'orderSuccessed' && transaction.confirm_user === 0">
                                                            <label for=""> Pesanan telah sampai</label><br>
                                                            <button class="btn small smallbtn" v-on:click="confirmByUser(transaction.id)">konfirmasi</button>
                                                        </div>
                                                        <div v-else-if="transaction.status === 'orderSuccessed' && transaction.confirm_user === 1">
                                                            <p> Terimakasih sudah melakukan konfirmasi</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ["userId"],
        data() {
            return {
                transactions: []
            };
        },
        methods: {

            confirmByUser(id_transaksi) {
                let confirmByUser =  {
                    data : 1
                }
                window.axios
                    .post("/api/transaction/" + id_transaksi + "/confirmByUser", confirmByUser)
                    .then(() => {
                        alert("berhasil mengkonfirmasi");
                        window.location.reload(true);
                    })
            },

            formatPrice(value) {
                let val = (value/1).toFixed().replace('.', ',')
                return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
            },
            getTransactions() {
                window.axios
                    .get("/api/customer/" + this.userId + "/transactions")
                    .then(res => {
                        this.transactions = res.data;
                        console.log(this.transactions);
                    })
                    .catch(err => {
                        console.log(err);
                    });
            },
            getTotalPayment(payment) {
                let total = 0
                total += parseInt(payment.product_cost, 10)
                total += parseInt(payment.shipping_cost, 10)
                total -= parseInt(payment.product_discount, 10)
                total -= parseInt(payment.shipping_discount, 10)

                return total;
            }
        },
        mounted() {
            this.getTransactions();
        }
    };
</script>

<style>
    .tabbable .nav-tabs {
        overflow-x: auto;
        overflow-y:hidden;
        flex-wrap: nowrap;
    }

    .tabbable .nav-tabs .nav-link {
        white-space: nowrap;
    }
</style>
