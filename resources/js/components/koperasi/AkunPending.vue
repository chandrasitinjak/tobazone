<template>
    <div class="card-body">
        <table class="demo-table responsive">
            <thead>
            <tr>
                <th scope="col">Nama Lengkap</th>
                <th scope="col">Username</th>
                <th scope="col">Alamat</th>
                <th scope="col">No Telepon</th>
                <th scope="col">Email</th>
                <th scope="col">Aksi</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="value in data">
                <td class="title">{{ `${value.first_name} ${value.last_name}` }}
                </td>
                <td>
                    {{ value.username }}
                </td>
                <td>{{ value.address }}</td>
                <td>{{ value.no_telepon }}</td>
                <td>{{ value.email }}</td>
                <td>
                    <button class="btn btn-primary" @click="terima(value.id)">Aktifkan</button>
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
                const loader = this.$loading.show()
                axios.get(`${this.urlGlobalKoperasi}get-akun-pending`)
                    .then(e => {
                        this.data = e.data
                        loader.hide()
                    })
                    .catch(() => {
                        loader.hide()
                    })
            },
            terima(id) {
                const loader = this.$loading.show()
                axios.post(`${this.urlGlobalKoperasi}terimaacc`, {id})
                    .then(e => {
                        alert('Berhasil mengaktifkan akun')
                        this.getData()
                    })
                    .catch(() => {
                        loader.hide()
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
