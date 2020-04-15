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
          
        <div class="row">
            <div class="col-md-2">

            </div>
            <table>
                <tr>
                    <td>id_customer</td>
                    <center><td>address</td></center>
                    <td>tanggal konfirmasi</td>                    
                </tr>                
                <tr v-for="transaction in transactions">
                    <td> {{ transaction.orders.id }}</td>
                    <td style="width : 680px"> {{ transaction.address }}</td>
                    <td>{{ transaction.updated_at }}</td>
                </tr>
            </table>
            <div class="col-md-2">

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
            transactions : []
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
        }
    },
    mounted() {
        this.getSuccessOrders();
    }

}
</script>