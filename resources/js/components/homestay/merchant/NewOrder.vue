<template>
    <div class="card globalcard">
        <div class="card-body">
            <div class="row">
                <div class="pull-right">
                    <div class="card globalcard mt-0">
                        <div class="card-header">
                            <h6>Order berhasil</h6>
                        </div>
                    </div>

                    <div v-if="transactions.length == 0" class="center center-block align-center text-center mt-15 ">
                        <img src="/images/assets/search_result_empty.png" style="height: 120px; border: none; opacity: 0.5"/>
                        <p class="text font-bold">
                            <br>
                            belum ada order saat ini
                        </p>
                    </div>

                    <div class="row" v-else>
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <td>Nama Pemesan</td>
                                    <td>Nama Homestay</td>
                                    <td>Alamat</td>
                                    <td>Check in</td>
                                    <td>Durasi</td>
                                    <td>Tanggal Konfirmasi</td>
                                    <td>Resi</td>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(transaction, index) in transactions">
                                    <th scope="col"> {{ index + 1 }}</th>
                                    <td> {{transaction.username}}</td>
                                    <td> {{transaction.name}}</td>
                                    <td> {{transaction.address}}</td>
                                    <td > {{ transaction.check_in }}</td>
                                    <td > {{ transaction.duration }}</td>
                                    <td>{{ transaction.updated_at }}</td>
                                    <td>
                                        <a href="'/images/' + transaction.resi">
                                        <img :src="'/images/' + transaction.resi" alt="Card image cap"
                                                        style='object-fit: cover'>
                                    </a>
                                    </td>
                                    <!-- <td> <button class="btn btn-info" v-on:click="getDetailSuccesOrder(transaction.id)"> detail </button></td> -->
                                    <!--                    <td> <a :href="'/merchant/detail-transaction/'+transaction.id" class="btn btn-info">detail</a></td>-->
                                </tr>
                                </tbody>
                            </table>
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
                    .get("/merchant/homestay/get-paid-order")
                    .then(res => {
                        this.transactions = res.data.data;
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
            this.transaction = ['asd','asd'];
            this.getSuccessOrders();
        }

    }
</script>
