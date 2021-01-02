<template>
    <div class="card-body">
        <table class="demo-table responsive">
            <thead>
            <tr>
                <th scope="col">Nama Koperasi</th>
                <th scope="col">Jenis Koperasi</th>
                <th scope="col">Nama Pendiri</th>
                <th scope="col">Alamat Koperasi</th>
                <th scope="col">Tahun Berdiri Koperasi</th>
                <th scope="col">Email Koperasi</th>
                <th scope="col">No Izin Koperasi</th>
                <th scope="col">Biaya Layanan</th>
                <th scope="col">Bukti Bayar</th>
                <th scope="col">Aksi</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="value in data">
                <td data-header="Nama Koperasi" class="title">{{ value.namaKoperasi }}</td>
                <td data-header="Jenis Koperasi">
                    {{ (value.jenisKoperasi === 1? 'Koperasi Serba Usaha(KSU)': 'Koperasi Simpan Pinjam') }}
                </td>
                <td data-header="Nama Pendiri">{{ value.namaPendiri }}</td>
                <td data-header="Alamat Koperasi">{{ value.alamatKoperasi }}</td>
                <td data-header="Tahun Berdiri Koperasi">{{ value.tahunBerdiriKoperasi }}</td>
                <td data-header="Email Koperasi">{{ value.email }}</td>
                <td data-header="No Izin Koperasi">{{ value.noIzinKoperasi }}</td>
                <td data-header="No Izin Koperasi">Rp.500.000,-</td>
                <td data-header="Logo Koperasi">
                    <div v-if="value.logoKoperasi === null">Logo Tidak Ada</div>
                    <div v-else><img :src="`data:image/jpeg;base64,${value.buktiBayar}`"></div>
                </td>
                <td>
                    <label class="switch">
                        <input type="checkbox" @input="changeStatus(value.id,value.haveKoperasi === 3)"
                               :checked="value.haveKoperasi === 3">
                        <span class="slider round"></span>
                    </label>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                data: []
            }
        },
        methods: {
            change(id, state) {
                const loader = this.$loading.show()
                axios.post(`${this.urlGlobalKoperasi}aktifkan-koperasi`, {
                    id: id,
                    state: state,
                })
                    .then(() => {
                        loader.hide()
                        this.$swal.fire(
                            'Success!',
                            'Status Koperasi berhasil diubah',
                            'success',
                        );
                    })
                    .catch(() => {
                        loader.hide()
                        this.$swal.fire(
                            'Error!',
                            'Terjadi kesalahan, refresh(F5)',
                            'error',
                        );
                    });
            },
            changeStatus(id, status) {
                this.$swal.fire({
                    title: 'Anda yakin?',
                    text: `Ingin ${status ? 'nonaktifkan' : 'mengaktifkan'} koperasi ini?`,
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: `Ya, ${status ? 'nonaktifkan' : 'aktifkan'}!`,
                })
                    .then((result) => {
                        if (result.value) {
                            this.change(id, status);
                        } else {
                            this.data = []
                            this.getData()
                        }
                    });
            },
            getData() {
                const loader = this.$loading.show()
                axios.get(`${this.urlGlobalKoperasi}layanan-koperasi`)
                    .then(e => {
                        this.data = e.data
                        loader.hide()
                    })
                .catch(()=>{
                    loader.hide()
                })
            }
        },
        mounted() {
            this.getData()
        }
    }
</script>

<style>
    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked + .slider {
        background-color: #2196F3;
    }

    input:focus + .slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }
</style>
