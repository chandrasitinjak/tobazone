<template>
    <div>
        <div class="card" style="background-color: #FFFAF4">
            <div>
                <div class="container">
                    <br><br>
                    <label for="lokasi">Destinasi Penginapan</label>
                    <div id="lokasi" class="input-container">
                        <i class="fa fa-map-marker icon fa-lg" style="color:#000000;"></i>
                        <input class="form-control" type="text" placeholder="Lokasi"
                               name="usrnm"  v-model="kecamatan">
                    </div>
                    <label for="check">Check In</label>
                    <div class="row" id="check">
                        <div class="input-container col-md-5">
                            <i class="fa fa-calendar icon fa-lg" style="color:#000000;"></i>
                            <input class="form-control" type="date" name="check-in">
                        </div>
                        <div class="input-container col-md-5">
                            <i class="fa fa-moon-o icon fa-lg" style="color:#000000;"></i>
                            <input class="form-control" type="number" name="durasi">
                        </div>
                    </div>
                    <label for="tamu">Tamu dan Kamar</label>
                    <div id="tamu" class="input-container ">
                        <i class="fa fa-users icon fa-lg" style="color:#000000;"></i>
                        <input class="form-control" type="number" min="1" name="check-in">
                    </div>
                    <br>
                    <div>
                        <button class="form-control"
                                style="background-color:#000000; color:#ffffff;" type="button"
                                v-on:click="search">Cari
                        </button>
                    </div>
                    <br><br>
                </div>
            </div>
        </div>
    </div>
</template>
<!--
    Created by Sogumontar Hendra Simangunsong on .
 -->

<script>
    export default {
        name: "MainPage",
        data() {
            return{
                kecamatan:''
            }
        },
        methods: {
            test(){
              alert("test");
            },
            search() {
                window.location.href="/homestays/search";

            }
        }
    }
</script>

<style scoped>
    /* Style the input container */
    .input-container {
        display: flex;
        width: 100%;
        margin-bottom: 15px;
    }

    /* Style the form icons */
    .icon {
        padding: 10px;
        background: #F5F5F5;
        color: white;
        min-width: 50px;
        text-align: center;
    }

</style>
