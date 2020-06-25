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

        <div v-if="transactions.length == 0" class="col-12 center center-block align-center text-center mt-15">
            <img src="/images/assets/search_result_empty.png" style="height: 120px; border: none; opacity: 0.5"/>
              <p class="text font-bold">
                <br>
                belum ada order saat ini
              </p>                        
        </div>

        <div class="row"  v-else-if="transactions.length != 0">            
            <div class="col-md-12">
            <table class="table">
                <thead>
                <tr>   
                    <th scope="col">#</th>                 
                    <td>nama customer</td>
                    <td>address</td>
                    <td>tanggal konfirmasi</td>                                        
                    <td>detail</td>
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