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
                <th scope="col">Logo Koperasi</th>
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
                <td data-header="Logo Koperasi">
                    <div v-if="value.logoKoperasi === null">Logo Tidak Ada</div>
                    <div v-else><img :src="`data:image/jpeg;base64,${value.logoKoperasi}`"></div>
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
            getData() {
                axios.get(`${this.urlGlobalKoperasi}get-koperasi-aktif`)
                    .then(e => {
                        this.data = e.data
                    })
            }
        },
        mounted() {
            this.getData()
        }
    }
</script>

<style scoped>

</style>
