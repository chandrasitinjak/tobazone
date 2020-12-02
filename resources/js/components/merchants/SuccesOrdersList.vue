<template>
    <div class="container">
        <div class="card globalcard">
            <div class="card-body">
                <div class="row">
                    <div class="pull-right">
                        <div class="card globalcard mt-0">
                            <div class="card-header">
                                <h6>Order berhasil</h6>
                            </div>
                        </div>

                        <!--        <div v-if="transactions.length == 0" class="center center-block align-center text-center mt-15 ">            -->
                        <!--            <img src="/images/assets/search_result_empty.png" style="height: 120px; border: none; opacity: 0.5"/>-->
                        <!--              <p class="text font-bold">-->
                        <!--                <br>-->
                        <!--                belum ada order saat ini-->
                        <!--              </p>                                     -->
                        <!--        </div>-->

                        <div v-if="transactions.length == 0">
                            <div class="row" style="background-color: #edebdd">
                                <div class="col-lg-7 col-sm-12 pt-4 pl-4">
                                    <div class="row">
                                        <div class="col-4">
                                            <h6>Nama</h6>
                                        </div>
                                        <div class="col-auto">
                                            <h6>:</h6>
                                        </div>
                                        <div class="col-6">
                                            <h6>Benyamin Salamone</h6>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <h6>Check in</h6>
                                        </div>
                                        <div class="col-auto">
                                            <h6>:</h6>
                                        </div>
                                        <div class="col-auto">
                                            <h6>Sunday, 25-10-2020</h6>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <h6>Check out</h6>
                                        </div>
                                        <div class="col-auto">
                                            <h6>:</h6>
                                        </div>
                                        <div class="col-auto">
                                            <h6>Monday, 26-10-2020</h6>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <h6>Homestay</h6>
                                        </div>
                                        <div class="col-auto">
                                            <h6>:</h6>
                                        </div>
                                        <div class="col-auto">
                                            <h6>Polado Homestay</h6>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <h6>Lokasi</h6>
                                        </div>
                                        <div class="col-auto">
                                            <h6>:</h6>
                                        </div>
                                        <div class="col-auto">
                                            <h6>Jl.Melinton 129, semeru</h6>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <h6>Total</h6>
                                        </div>
                                        <div class="col-auto">
                                            <h6>:</h6>
                                        </div>
                                        <div class="col-auto">
                                            <h6>Rp. 40.000,00</h6>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-2 col-sm-12 pt-4 pb-4">
                                    <div class="row">
                                        <div class="col-auto">
                                            <h6>Resi: </h6>
                                        </div>
                                        <div class="col-auto">
                                            <img src="https://cekresi.com/images/resi-wahana-02.jpg" width="120px" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto pt-4 ml-4">
                                    <h6 class="text-success">Sudah Dibayar</h6>
                                </div>
                            </div>
                        </div>

                        <div class="row"  v-else-if="transactions.length != 0">
                            <div class="col-md-12">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <td>Nama</td>
                                        <td>Alamat</td>
                                        <td>Tanggal Konfirmasi</td>
                                        <td>Rincian</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="(transaction, index) in transactions">
                                        <th scope="col"> {{ index + 1 }}</th>
                                        <td> {{ transaction.customer_info.name }}</td>
                                        <td style="width : 25rem"> {{ transaction.address }}</td>
                                        <td>{{ transaction.updated_at }}</td>
                                        <!-- <td> <button class="btn btn-info" v-on:click="getDetailSuccesOrder(transaction.id)"> detail </button></td> -->
                                        <td> <a :href="'/merchant/detail-transaction/'+transaction.id" class="btn btn-info">detail</a></td>
                                    </tr>
                                    </tbody>
                                </table>
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
            transactions : [],
            number : 0,
            order : [],
        };
    },

    methods: {
        getSuccessOrders() {
            window.axios
            .get("/api/merchant/" + this.userId + "/success-orders")
            .then(res => {
                this.transactions = res.data;
                console.log(this.transactions);
            })
            .catch(err => {
                console.log(err);
            })
        },
        getDetailSuccesOrder(id_trans) {
            window.axios
            .get("/merchant/detail-transaction/"+id_trans)
            .then(res => {
                this.order = res.data;

            })
            .catch(err => {
                console.log(err);
            })
        }
    },
    mounted() {
        this.getSuccessOrders();
    }

}
</script>
