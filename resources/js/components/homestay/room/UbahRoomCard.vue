<template>
    <div class="card">
        <div class="card-body bg-light">
            <div class="row" v-show="isShowUbahRoomForm">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3" style="padding-right: 0%;" v-if="isShowUbahRoomForm">
                                    <picture-input
                                        ref="roomPicture"
                                        id="roomPicture"
                                        width=300
                                        height=200
                                        accept="image/jpeg,image/png"
                                        size="10"
                                        radius=2
                                        buttonClass="btn btn-primary"
                                        :removable="true"
                                        removeButtonClass="btn btn-danger"
                                        :zIndex="1"
                                        :customStrings="{
                                            upload: '<h1>Upload room picture</h1>',
                                            drag: 'Piliah gambar (.jpeg atau .png), max. 10 MB',
                                            change: 'Ubah',
                                            remove: 'Hapus'
                                        }"
                                        :prefill="roomImage"
                                        :alertOnError=false
                                        @change="onChange"></picture-input>
                                </div>
                                <div class="col-md-9">
                                    <form @keypress.enter="$event.preventDefault()">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="roomName">Nama</label>
                                                <input type="text" class="form-control input-text" :class="{'is-invalid':$v.roomName.$error, 'is-valid':!$v.roomName.$invalid }" id="roomName" v-model="roomName" placeholder="Nama kamar">
                                                <div class="text-danger" v-if="!$v.roomName.required"><small>Nama kamar tidak boleh kosong.</small></div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="roomCategory">Kategori</label>
                                                <select class="form-control input-text" :class="{'is-invalid':$v.roomCategory.$error, 'is-valid':!$v.roomCategory.$invalid }" style="height: 35px;" id="roomCategory" v-model="roomCategory">
                                                    <option disabled value="">Pilih salah satu</option>
                                                    <option v-for="roomCategoryOption in roomCategoryOptionList" :key="roomCategoryOption">{{ roomCategoryOption }}</option>
                                                </select>
                                                <div class="text-danger" v-if="!$v.roomCategory.required"><small>Kategori kamar tidak boleh kosong.</small></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="roomFacilities">Fasilitas</label>
                                            <vue-tags-input
                                                style="max-width: none; width: 100%; font-size: 16px;"
                                                id="roomFacilities"
                                                v-model="roomFacility"
                                                :tags="roomFacilities"
                                                placeholder="Fasilitas kamar"
                                                @tags-changed="newRoomFacilities => roomFacilities = newRoomFacilities"></vue-tags-input>
                                            <div class="text-danger" v-if="!$v.roomFacilities.required"><small>Fasilitas kamar tidak boleh kosong.</small></div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="roomPrice">Harga</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="inputGroupPrepend" style="height: 35px; font-size: 14px;">Rp</span>
                                                    </div>
                                                    <input type="text" aria-describedby="inputGroupPrepend" class="form-control input-text" :class="{'is-invalid':$v.roomPrice.$error, 'is-valid':!$v.roomPrice.$invalid }" id="roomPrice" v-model="roomPrice" @keypress="keypressNumber($event)" placeholder="Harga kamar">
                                                </div>
                                                <div class="text-danger" v-if="!$v.roomPrice.required"><small>Harga kamar tidak boleh kosong.</small></div>
                                                <div class="text-danger" v-if="!$v.roomPrice.minValue"><small>Harga kamar tidak boleh 0.</small></div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="roomTotalBed">Total Bed</label>
                                                <div class="form-row align-items-center">
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control input-text" :class="{'is-invalid':$v.roomTotalBed.$error, 'is-valid':!$v.roomTotalBed.$invalid }" id="roomTotalBed" v-model="roomTotalBed" @keypress="keypressNumber($event)" placeholder="Total bed">
                                                        <div class="text-danger" v-if="!$v.roomTotalBed.required"><small>Total bed tidak boleh kosong.</small></div>
                                                        <div class="text-danger" v-if="!$v.roomTotalBed.minValue"><small>Total bed tidak boleh 0.</small></div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input" id="roomExtraBed" v-model="roomExtraBed">
                                                            <label class="form-check-label" for="roomExtraBed">Extra Bed</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="roomDesc">Deskripsi</label>
                                            <textarea-autosize class="form-control" style="font-size: 14px; padding-left: 8px; padding-right: 8px;" id="roomDesc" v-model="roomDescription" :min-height="65" placeholder="Deskripsi kamar" />
                                        </div>
                                        <div class="clearfix">
                                            <div class="float-left">
                                                <button class="btn btn-primary" style="padding: 4px 0px 4px 0px; width: 100px;" type="button" @click="updateRoomDetail">Ubah</button>
                                            </div>
                                            <div class="float-right">
                                                <button class="btn btn-danger" style="padding: 4px 0px 4px 0px; width: 100px;" type="button" @click="showRoomDetail()">Batal</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" v-show="!isShowUbahRoomForm">
                <div v-if="roomDetail.image === ''" class="col-md-3"  style="padding-right: 0%;">
                    <img :src="'/images/assets/no-image.jpg'" class="card-img small-card-image" alt="">
                </div>
                <div v-else class="col-md-3" style="padding-right: 0%;">
                    <img :src="'/images/homestay/room/' + roomDetail.image" class="card-img small-card-image" alt="">
                </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col text-left">
                                    <p class="h6 text-dark font-weight-bold">{{ roomDetail.name }}</p>
                                </div>
                                <div class="col text-right">
                                    <p class="h5"><span class="badge badge-primary">{{ roomDetail.kategori }}</span></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col text-left">
                                    <div class="text-dark" v-if="roomDetail.total_extra_bed">
                                        <i class="fa fa-bed" style="margin-right: 8px;" aria-hidden="true"></i> {{ roomDetail.total_bed }} Bed With Extra Bed
                                    </div>
                                    <div class="text-dark" v-else>
                                        <i class="fa fa-bed" style="margin-right: 8px;" aria-hidden="true"></i> {{ roomDetail.total_bed }} Bed With No Extra Bed
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col col-md-8 text-left">
                                    <div
                                        class="badge badge-pill text-success"
                                        style="margin-right: 8px; margin-bottom: 8px; padding: 8px 8px; font-size: 12px; background-color: #f0f5f1;"
                                        v-for="roomFacility in getFacilityList(roomDetail.facilities)"
                                        :key="roomFacility">{{ roomFacility.trim() }}</div>
                                </div>
                                <div class="col col-md-4 text-right">
                                    <p class="h5 text-warning font-weight-bold" style="margin-bottom: 0px;">Rp {{ formatPrice(roomDetail.price) }}</p>
                                    <small class="font-weight-bold text-secondary">/ malam</small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <p class="text-dark">
                                        <i class="fa fa-info-circle" style="margin-right: 8px;" aria-hidden="true"></i>{{ roomDetail.description }}
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="float-left">
                                        <div class="btn-group-sm" role="group" aria-label="Ubah Room Button">
                                            <button type="button" class="btn btn-outline-primary" @click="showUbahRoomForm()">Ubah</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="float-right">
                                        <label for="roomStatus" class="text-secondary align-middle" style="margin-right: 8px;" >Status</label>
                                        <toggle-button
                                        id="roomStatus"
                                        :value="getRoomAvailability(roomDetail.status)"
                                        :labels="{checked: 'Available', unchecked: 'Booked'}"
                                        :color="{unchecked: 'red'}"
                                        :height=18
                                        :width=74
                                        @change="changeRoomStatus" />
                                    </div>
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
import { ToggleButton } from 'vue-js-toggle-button';
import TextareaAutozie from 'vue-textarea-autosize';
import VueTagsInput from '@johmun/vue-tags-input';
import PictureInput from 'vue-picture-input';
import { required, minValue } from 'vuelidate/lib/validators';

export default {
    data() {
        return {
            roomDetail: this.room,

            roomCategoryOptionList: ['Deluxe', 'Standard'],
            roomStatusList: ["Available", "Booked"],

            isShowUbahRoomForm: false,

            /**
             * List of v-model
             */
            roomName: '',
            roomCategory: '',
            roomFacility: '',
            roomFacilities: [],
            roomPrice: 0,
            roomTotalBed: 0,
            roomExtraBed: false,
            roomDescription: '',

            // roomImage will be set as prefill value in vue-picture-input.
            roomImage: '',
        }
    },
    props: ['room'],
    methods: {
        formatPrice(value) {
            let val = (value/1).toFixed(2).replace('.', ',')
            return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
        },
        keypressNumber(event) {
            /**
             * Block non-numeric character in input field.
             * @param event {keypress event}
             */
            event = (event) ? event : window.event;
            var charCode = (event.which) ? event.which : event.keyCode;
            if ((charCode > 31 && (charCode < 48 || charCode > 57)) && charCode !== 46) {
                return event.preventDefault();
            }

            return true;
        },
        onChange(image) {
            //
        },
        showUbahRoomForm() {
            /**
             * Change status view to swap room detail to ubah-room form.
             */
            this.isShowUbahRoomForm = true;

            if (this.roomDetail !== null) {
                this.roomName = this.roomDetail.name;
                this.roomCategory = this.roomDetail.kategori;

                this.roomFacilities = [];
                let facilities = this.getFacilityList(this.roomDetail.facilities);
                for (let i = 0; i < facilities.length; i++) {
                    this.roomFacilities.push({"text": facilities[i]})
                }

                this.roomPrice = this.roomDetail.price;
                this.roomTotalBed = this.roomDetail.total_bed;
                this.roomExtraBed = this.roomDetail.total_extra_bed;
                this.roomDescription = this.roomDetail.description;

                if (this.roomDetail.image !== '') {
                    this.roomImage = '/images/homestay/room/' + this.roomDetail.image;
                }
            }
        },
        showRoomDetail() {
            /**
             * Change status view to swap ubah-room form to room detail.
             */
            this.isShowUbahRoomForm = false;
            this.clearForm();
        },
        clearForm() {
            /**
             * Clear ubah room form.
             */
            this.roomName = '';
            this.roomCategory = '';
            this.roomFacility = '';
            this.roomFacilities = [];
            this.roomPrice = 0;
            this.roomTotalBed = 0;
            this.roomExtraBed = false;
            this.roomDescription = '';
            this.roomImage = '';
        },
        getFacilityList(roomFacilities) {
            /**
             * Separate room facilities by comma.
             * @param roomFacilities {[]string}
             */
            roomFacilities = roomFacilities + '';
            return roomFacilities.split(',');
        },
        getRoomAvailability(roomStatus) {
            /**
             * Get room availability status.
             * @param roomStatus {string}
             */
            if (roomStatus.toLowerCase().trim() === 'available') {
                return true;
            }

            return false;
        },
        async changeRoomStatus(event) {
            /**
             * Update room status.
             * @param event {Object}
             */
            let roomStatus = event.value;
            let loader = this.$loading.show()
            await window.axios
                .put(`/homestay/${this.roomDetail.id_homestay}/room/${this.roomDetail.id}/status`, { roomStatus })
                .then((res) => {
                    this.$swal.fire(
                        'Status kamar berhasil diubah!',
                        '',
                        'success'
                    );
                    this.roomDetail = res.data;
                })
                .catch((err) => {
                    if (err.response) {
                        if (err.response.status === 401) {
                            this.$swal.fire({
                                icon: 'warning',
                                title: 'Unauthorized',
                                text: 'Anda tidak diizinkan melakukan aktivitas ini!'
                            });
                        } else {
                            this.$swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Terjadi kesalahan!'
                            });
                            console.log(err);
                        }
                    }
                })
                .finally(() => {
                    loader.hide();
                });
        },
        async updateRoomDetail() {
            /**
             * Update room detail.
             */
            this.$v.$touch();
            if (this.$v.$invalid) {
                return;
            }

            let roomToUpdate = {};
            roomToUpdate.name = this.roomName;
            roomToUpdate.kategori = this.roomCategory;
            roomToUpdate.price = this.roomPrice;
            roomToUpdate.description = this.roomDescription;
            roomToUpdate.total_bed = this.roomTotalBed;
            roomToUpdate.total_extra_bed = this.roomExtraBed;

            let facilities = [];
            for (let i = 0; i < this.roomFacilities.length; i++) {
                let facility = this.roomFacilities[i].text
                facilities.push(facility.trim());
            }
            roomToUpdate.facilities = facilities;

            roomToUpdate.image = null;
            if (this.$refs.roomPicture.image) {
                // this.$refs.roomPicture.image contains string of base64 encoded image.
                roomToUpdate.image = this.$refs.roomPicture.image;
            }

            let loader = this.$loading.show()
            await window.axios
                .put(`/homestay/${this.roomDetail.id_homestay}/room/${this.roomDetail.id}`, { roomToUpdate })
                .then((res) => {
                    this.$swal.fire(
                        'Kamar berhasil diubah!',
                        '',
                        'success'
                    );
                    this.roomDetail = res.data;
                    this.showRoomDetail();
                })
                .catch((err) => {
                    if (err.response) {
                        if (err.response.status === 401) {
                            this.$swal.fire({
                                icon: 'warning',
                                title: 'Unauthorized',
                                text: 'Anda tidak diizinkan melakukan aktivitas ini!'
                            });
                        } else {
                            this.$swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Terjadi kesalahan!'
                            });
                            console.log(err);
                        }
                    }
                })
                .finally(() => {
                    loader.hide();
                })
        }
    },
    validations: {
        roomName: {
            required
        },
        roomCategory: {
            required
        },
        roomPrice: {
            required,
            minValue: minValue(1)
        },
        roomTotalBed: {
            required,
            minValue: minValue(1)
        },
        roomFacilities: {
            required
        }
    },
    components: {
        ToggleButton,
        TextareaAutozie,
        VueTagsInput,
        PictureInput
    }
}
</script>

<style scoped>
.input-text {
    height: 35px;
    font-size: 14px;
    padding-left: 8px;
    padding-right: 8px;
}

.small-card-image {
    margin-bottom: 8px;
    width: 300px;
    height: 170px;
}
</style>
