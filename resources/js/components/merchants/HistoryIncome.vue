<template>
    <div class="card-body">
        <h5>Ringkasan Statistik</h5>
        <div class="row">
            <div class="col-4 px-1">
                <div class="card products"  style="border-radius: 30px;">
                    <a href="">
                        <div class="imgwrapper">
                            <p class="card-title">Pendapatan Bersih</p>
                            <p class="card-text" style="font-size: xxx-large"><b>Rp.0</b></p>

                        </div>
                        <div class="card-body">
                            <p class="card-text left">
                                <medium class="text-muted"><b>0%</b> dari 7 hari yang lalu </medium>
                            </p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-4 px-1">
                <div class="card products" style="border-radius: 30px;">
                    <a href="">
                        <div class="imgwrapper">
                            <p class="card-title">Produk Dilihat</p>
                            <p class="card-text" style="font-size: xxx-large"><b>0</b></p>
                        </div>
                        <div class="card-body">
                            <p class="card-text left">
                                <medium class="text-muted"><b>0%</b> dari 7 hari yang lalu </medium>
                            </p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-4 px-1">
                <div class="card products" style="border-radius: 30px;">
                    <a href="">
                        <div class="imgwrapper">
                            <p class="card-title">Pesanan Baru </p>
                            <p class="card-text" style="font-size: xxx-large"><b>0</b></p>
                        </div>
                        <div class="card-body">
                            <p class="card-text left">
                                <medium class="text-muted"><b>0%</b> dari 7 hari yang lalu </medium>
                            </p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <h5>Jumlah Pendapatan</h5>
                <medium class="text-muted">cek total pendapatan bersih selama 7 hari terakhir </medium>
                <br>
                <div class="row">
                    <div class="col-12 px-1" style="size: 100px">
                        <div class="card products"  style="border-radius: 30px;">
                            <a href="">
                                <div class="card-body">
                                    <canvas id="myChart" style="max-width: 500px;"></canvas>

<!--                                    <p class="card-text left" style="font-size:medium"><b>Rp.0</b></p>-->

                                </div>
                                <div class="card-body">
                                    <p class="card-text left">
<!--                                        <medium class="text-muted"><b>0%</b> dari 7 hari yang lalu </medium>-->
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <div class="col-6 px-1">
            <div class="card products" style="border-radius: 30px;">
                <a href="">
                    <div class="imgwrapper">
                        <p class="card-title">Total  Pendapatan </p>
                        <p class="card-text" style="font-size: xxx-large"><b>Rp. 0</b></p>
                    </div>
                    <div class="card-body">
                        <p class="card-text left">
<!--                            <medium class="text-muted"><b>0%</b> dari 7 hari yang lalu </medium>-->
                        </p>
                    </div>
                </a>
            </div>
        </div>
    </div>

</template>

<script>
    export default {

        methods: {
            chart() {
                var ctx = document.getElementById("myChart").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
                        datasets: [{
                            label: '# of Votes',
                            data: [12, 19, 3, 5, 2, 3],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
            },
        }
    };


</script>
<script>

</script>

<style scoped>

</style>
