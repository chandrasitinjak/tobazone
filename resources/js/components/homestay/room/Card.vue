<template>
    <div class="card">
        <div class="card-body bg-light">
            <div class="row">
                <div v-if="room.image === ''" class="col-md-3"  style="padding-right:0%;">
                    <img :src="'/images/assets/no-image.jpg'" class="card-img" alt="">
                </div>
                <div v-else class="col-md-3" style="padding-right:0%;">
                    <img :src="'/images/homestay/room/' + room.image" class="card-img" alt="">
                </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h7>{{ room.name }}</h7>
                                    <h6 class="text-dark">{{ room.kategori }}</h6>
                                </div>
                                <div class="col text-right">
                                    <h7 class="text-dark">Status: <b>{{ room.status }}</b></h7>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col">
                                    <div class="text-success">{{ room.facilities }}</div>
                                    <p class="text-dark">{{ room.description }}</p>
                                </div>
                                <div class="col text-right">
                                    <h4 class="text-warning">Rp {{ formatPrice(room.price) }}</h4>
                                </div>
                            </div>
                            <div class="clearfix">
                                <div class="btn-group btn-group-sm float-right" role="group" aria-label="Edit Room Button">
                                    <button type="submit" class="btn btn-primary">Edit</button>
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
    props: ['room'],
    methods: {
        formatPrice(value) {
            let val = (value/1).toFixed(2).replace('.', ',')
            return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
        }
    }
}
</script>
