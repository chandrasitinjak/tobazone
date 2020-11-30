<template>
    <form @submit.prevent="submit">
        <div class="row">
            <div class="col-md-8">
                <img v-bind:src="'../../images/' + homestays.image" style="height: 100%; width: 100%; object-fit: cover" alt="">
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="checkIn">Check-in</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <i class="fa fa-calendar icon fa-lg" style="color: #000000"></i>
                        </div>
                        <input
                            style="background-color: #f5f5f5"
                            type="date"
                            class="form-control"
                            id="checkIn"
                            name="checkIn"
                            v-model="checkIn"
                            v-model.trim="$v.checkIn.$model"
                            :class="{'is-invalid': $v.checkIn.$error, 'is-valid': !$v.checkIn.$invalid}"
                        />
                        <div class="invalid-feedback">
                            <span v-if="!$v.checkIn.required">Tanggal check-in tidak boleh kosong</span>
                            <span v-if="!$v.checkIn.minValue">Tanggal check-in minimal hari ini</span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="duration">Durasi</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <i class="fa fa-moon-o icon fa-lg" style="color: #000000"></i>
                        </div>
                        <input
                            style="background-color: #f5f5f5"
                            type="number"
                            class="form-control"
                            id="duration"
                            name="duration"
                            v-model="duration"
                            v-model.trim="$v.duration.$model"
                            :class="{'is-invalid': $v.duration.$error, 'is-valid': !$v.duration.$invalid}"
                        />
                        <div class="invalid-feedback">
                            <span v-if="!$v.duration.required">Durasi menginap tidak boleh kosong</span>
                            <span v-if="!$v.duration.minValue">Durasi menginap minimal 1 malam</span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="totalRoom">Jumlah Kamar</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <i class="fa fa-bed icon fa-lg" style="color: #000000"></i>
                        </div>
                        <input
                            style="background-color: #f5f5f5"
                            type="number"
                            id="totalRoom"
                            name="totalRoom"
                            class="form-control"
                            v-model="totalRoom"
                            v-model.trim="$v.totalRoom.$model"
                            :class="{'is-invalid': $v.totalRoom.$error, 'is-valid': !$v.totalRoom.$invalid}"
                        />
                        <div class="invalid-feedback">
                            <span v-if="!$v.totalRoom.required">Jumlah kamar yang dipesan tidak boleh kosong</span>
                            <span v-if="!$v.totalRoom.minValue">Jumlah kamar yang dipesan minimal 1</span>
                        </div>
                    </div>
                </div>

            <br><br>

            <button
                class="btn form-control"
                type="submit"
                style="background-color: #0b0b0b; color: white"
            >Pesan Homestay</button>

            <br><br>
        </div>
        </div>
    </form>
</template>

<style scoped>
    /* Style the form icons */
    .icon {
        padding: 10px;
        background: #F5F5F5;
        color: white;
        min-width: 50px;
        text-align: center;
    }
</style>

<script>
import { required, minValue } from "vuelidate/lib/validators";
export default {
    props: ['homestays'],
    data() {
        return {
            checkIn: new Date().toISOString().substring(0, 10),
            duration: "",
            totalRoom: "",
            submitStatus: null,
        };
    },
    methods: {
        submit() {
            var url = window.location.pathname;
            var id = url.substring(url.lastIndexOf('/') + 1);
            let payload ={
                id:id,
                checkIn: this.checkIn,
                durasi: this.duration,
                totalRoom: this.totalRoom,
            }
            this.$v.$touch();
            if (this.$v.$invalid) {
                this.submitStatus == "ERROR"
            } else {
                window.axios
                    .post("/homestay/pesan/", payload)
                    .then(() => {
                        alert("Pesan penginapan berhasil");
                        window.location = "/user/homestay/order/findAll";
                    })
            }
        }
    },
    validations: {
        checkIn: {
            required,
            minValue: function(value) {
                return value >= new Date().toISOString().substring(0, 10)
            }
        },
        duration: {
            required,
            minValue: minValue(1),
        },
        totalRoom: {
            required,
            minValue: minValue(1),
        }
    }
};
</script>
