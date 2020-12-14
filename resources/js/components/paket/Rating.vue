<template>
    <div class="card">
        <div class="card-body">
            <div class="row" style="margin-bottom: 5px;">
                <div class="col-md-6">
                    <star-rating v-show="showRating" v-model="rating" :increment="0.5" :star-size="30" text-class="custom-text" :read-only="rating > 0"></star-rating>
                </div>
            </div>
            <button @click="setRating" class="btn btn-primary btn-sm" v-show="showRating">Rate</button>
            <hr style="border:3px solid #f1f1f1">

            <div class="row">
                <div class="col-xs-12 col-md-2 text-center">
                    <div v-if="totalrate > 0">
                        <h1 class="rating-num">{{ totalrate }}</h1>
                    </div>
                    <div v-else>
                        <h1 class="rating-num">0</h1>
                    </div>
                    <div class="rating">
                        <star-rating :inline="true" :read-only="true" :show-rating="false" :star-size="20" v-model="totalrate" :increment="0.1" active-color="#000000"></star-rating>
                    </div>
                    <div>
                        <span class="fa fa-user"></span> {{ totaluser }} total
                    </div>
                </div>
                <div class="col-xs-12 col-md-6">
                    <div class="side">
                        <div>5 star</div>
                    </div>
                    <div class="middle">
                        <div class="bar-container">
                            <div class="bar-5" style="width: 0%;"></div>
                        </div>
                    </div>
                    <div class="side right">
                        <div>{{ bar5 }}</div>
                    </div>
                    <div class="side">
                        <div>4 star</div>
                    </div>
                    <div class="middle">
                        <div class="bar-container">
                            <div class="bar-4" style="width: 0%;"></div>
                        </div>
                    </div>
                    <div class="side right">
                        <div>{{ bar4 }}</div>
                    </div>
                    <div class="side">
                        <div>3 star</div>
                    </div>
                    <div class="middle">
                        <div class="bar-container">
                            <div class="bar-3" style="width: 0%;"></div>
                        </div>
                    </div>
                    <div class="side right">
                        <div>{{ bar3 }}</div>
                    </div>
                    <div class="side">
                        <div>2 star</div>
                    </div>
                    <div class="middle">
                        <div class="bar-container">
                            <div class="bar-2" style="width: 0%;"></div>
                        </div>
                    </div>
                    <div class="side right">
                        <div>{{ bar2 }}</div>
                    </div>
                    <div class="side">
                        <div>1 star</div>
                    </div>
                    <div class="middle">
                        <div class="bar-container">
                            <div class="bar-1" style="width: 0%;"></div>
                        </div>
                    </div>
                    <div class="side right">
                        <div>{{ bar1 }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style>
/* Three column layout */
.side {
    float: left;
    width: 15%;
    margin-top: 10px;
}

.middle {
    float: left;
    width: 70%;
    margin-top: 10px;
}

/* Place text to the right */
.right {
    text-align: right;
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}

/* The bar container */
.bar-container {
    width: 100%;
    background-color: #f1f1f1;
    text-align: center;
    color: white;
}

/* Individual bars */
.bar-5 {height: 18px; background-color: #4CAF50;}
.bar-4 {height: 18px; background-color: #2196F3;}
.bar-3 {height: 18px; background-color: #00bcd4;}
.bar-2 {height: 18px; background-color: #ff9800;}
.bar-1 {height: 18px; background-color: #f44336;}

/* Responsive layout - make the columns stack on top of each other instead of next to each other */
@media (max-width: 400px) {
    .side, .middle {
        width: 100%;
    }
    /* Hide the right column on small screens */
    .right {
        display: none;
    }
}
</style>

<script>
export default {
    props: ["paket", "user", "rating"],
    data() {
        return {
            ratings: 0,
            totalrate: 0,
            totaluser: 0,
            bar1: 0,
            bar2: 0,
            bar3: 0,
            bar4: 0,
            bar5: 0,
            showRating: false
        };
    },
    created() {
        this.getRating();
        this.setDefaultRating();
    },

    methods: {
        showRatings(){
            axios.get(`/api/paket/rating/${this.user}/${this.paket}`)
                .then(response => {
                    this.showRating = response.data
                })
                .catch(error => {
                    alert(error);
                    console.log(error)
                });
        },
        setDefaultRating() {
            rating = this.rating;
        },
        getRating() {
            axios.get(`/api/paket/rating/${this.paket}`)
                .then(response => {
                    var data = response.data
                    this.totaluser = data.length;

                    var sum = 0;
                    for (var i = 0; i< data.length; i++) {
                        sum += parseFloat(data[i]['rating']);
                    }

                    var avg = sum/data.length;
                    this.totalrate = parseFloat(avg.toFixed(1));

                    for (var j = 0; j < data.length; j++) {
                        if (parseInt(data[j]['rating']) == '1') {
                            this.bar1 += 1
                        }
                        if (parseInt(data[j]['rating']) == '2') {
                            this.bar2 += 1
                        }
                        if (parseInt(data[j]['rating']) == '3') {
                            this.bar3 += 1
                        }
                        if (parseInt(data[j]['rating']) == '4') {
                            this.bar4 += 1
                        }
                        if (parseInt(data[j]['rating']) == '5') {
                            this.bar5 += 1
                        }
                    }
                    window.$('.bar-1').css('width', parseFloat((this.bar1/data.length).toFixed(1)) + '%');
                    window.$('.bar-2').css('width', parseFloat((this.bar2/data.length).toFixed(1)) + '%');
                    window.$('.bar-3').css('width', parseFloat((this.bar3/data.length).toFixed(1)) + '%');
                    window.$('.bar-4').css('width', parseFloat((this.bar4/data.length).toFixed(1)) + '%');
                    window.$('.bar-5').css('width', parseFloat((this.bar5/data.length).toFixed(1)) + '%');
                })
                .catch(error => {
                    alert(error);
                    console.log(error)
                });
        },
        setRating() {
            let payload = {
                paket: this.paket,
                user: this.user,
                rating: this.rating
            };

            axios.post("/api/paket/rating", payload)
                .then(response => {
                    if (response.status == 200) {
                        this.$swal.fire(
                            'Success!',
                            'Terima kasih, penilaian Anda telah kami simpan',
                            'success',
                        );
                        this.getRating();
                    }
                })
                .catch(error => {
                    let errMessage = "Gagal memberikan penilaian, silahkan coba lagi"
                    if (error.response.data.message != "") {
                        errMessage = error.response.data.message
                    }
                    this.$swal.fire(
                        'Error!',
                        errMessage,
                        'error',
                    );
                    console.log(error)
                });
        },
    },

    mounted() {
        this.showRatings()
    }
}
</script>
