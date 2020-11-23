<template>
   <div>
       <br><br><br>
       <div  class="d-flex justify-content-center">
           <h2>Selamat Datang</h2><br>
       </div>
       <div  class="d-flex justify-content-center">
           <p>Silahkan pilih tipe akun untuk memulai</p>
       </div>
       <center>
       <div class="card-login">
           <div class="card"  data-toggle="modal" onclick="setCustomer()" data-target="#loginModal">
               <div class="card-body">
                   <div class="col-xs-12 col-md-12">
                       <div class="row">
                           <div class="col-xs-2 col-md-2">
                               <img src="images/icon-login/customer.jpeg" id="icon-login1">
                           </div>
                           <div class="col-xs-8 col-md-8">
                               <div class="row d-flex flex-row">
                                   <div class="col"><h4>Customer</h4></div>
                               </div>
                           </div>
                           <div class="col-xs-2 col-md-2">
                               <img src="https://img.icons8.com/metro/344/arrow.png" id="arrow">
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div><br><br>
           <div class="card-login">
               <div class="card"  data-toggle="modal" onclick="setMerchant()" data-target="#loginModal">
                   <div class="card-body">
                       <div class="col-xs-12 col-md-12">
                           <div class="row">
                               <div class="col-xs-2 col-md-2">
                                   <img src="images/icon-login/merchant.jpeg" id="icon-login1">
                               </div>
                               <div class="col-xs-8 col-md-8">
                                   <div class="row d-flex flex-row">
                                       <div class="col"><h4>Merchant</h4></div>
                                   </div>
                               </div>
                               <div class="col-xs-2 col-md-2">
                                   <img src="https://img.icons8.com/metro/344/arrow.png" id="arrow">
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
           <br><br>
           <div class="card-login">
               <div class="card"  data-toggle="modal" onclick="setCbt()" data-target="#loginModal3">
                   <div class="card-body">
                       <div class="col-xs-12 col-md-12">
                           <div class="row">
                               <div class="col-xs-2 col-md-2">
                                   <img src="images/icon-login/cbt.jpeg" id="icon-login1">
                               </div>
                               <div class="col-xs-8 col-md-8">
                                   <div class="row d-flex flex-row">
                                       <div class="col"><h4>CBT</h4></div>
                                   </div>
                               </div>
                               <div class="col-xs-2 col-md-2">
                                   <img src="https://img.icons8.com/metro/344/arrow.png" id="arrow">
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
           <br><br>
           <div class="card-login">
               <div class="card"  data-toggle="modal" onclick="setAdmin()" data-target="#loginModal">
                   <div class="card-body">
                       <div class="col-xs-12 col-md-12">
                           <div class="row">
                               <div class="col-xs-2 col-md-2">
                                   <img src="images/icon-login/admin.png" id="icon-login1">
                               </div>
                               <div class="col-xs-8 col-md-8">
                                   <div class="row d-flex flex-row">
                                       <div class="col"><h4>Admin</h4></div>
                                   </div>
                               </div>
                               <div class="col-xs-2 col-md-2">
                                   <img src="https://img.icons8.com/metro/344/arrow.png" id="arrow">
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
           <br><br><br><br>
       </center>


   </div>
</template>

<style>
    body {
        background-color: #F1F1F1;
    }
    .card-login{
        width: 500px;
    }
    #arrow{
        width: 20px;
    }
    @media screen and (max-width: 600px) {
        .card-login{
            width: 300px;
            height: 200px;
        }
        #arrow{
            width: 20px;
        }
        #icon-login1{
            width: 50px;
        }
    }
</style>
