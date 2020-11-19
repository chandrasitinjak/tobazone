<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class CategoryAkomodasiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\CategoryAkomodasi::insert([
            [
                'nama' => 'Hotel',
                'deskripsi' => 'Hotel adalah usaha yang menggunakan suatu bangunan atau sebagian bangunan yang disediakan secara khusus, dan setiap orang dapat menginap, makan, serta memperoleh pelayanan dan fasilitas lainnya dengan pembayaran.',
                'created_at' => Carbon::now('Asia/Jakarta'),
                'updated_at' => Carbon::now('Asia/Jakarta')
            ],
            [
                'nama' => 'Boutique Hotel',
                'deskripsi' => 'Boutique Hotel ini adalah jenis hotel dengan jumlah kamar yang tidak terlalu banyak dan lebih dikhususkan untuk memanjakan tamu yang menginap.',
                'created_at' => Carbon::now('Asia/Jakarta'),
                'updated_at' => Carbon::now('Asia/Jakarta')
            ],
            [
                'nama' => 'Hostel',
                'deskripsi' => 'Hostel adalah penginapan yang budget-oriented, akomodasi yang ramah untuk para tamu menyewa tempat tidur di asrama (dorm), dimana satu kamar berisi 6-8 orang, atau bahkan ada yang 20 orang dalam kamar yang besar, dengan share kamar mandi, lounge, dan kadang-kadang dapur.',
                'created_at' => Carbon::now('Asia/Jakarta'),
                'updated_at' => Carbon::now('Asia/Jakarta')
            ],
            [
                'nama' => 'Homestay',
                'deskripsi' => 'Homestay adalah salah satu bentuk penginapan yang populer. Para pengunjung atau tamu menginap di kediaman penduduk setempat di kota tempat mereka bepergian. Lama tinggal dapat bervariasi dari satu malam hingga lebih dari setahun.',
                'created_at' => Carbon::now('Asia/Jakarta'),
                'updated_at' => Carbon::now('Asia/Jakarta')
            ],
            [
                'nama' => 'GuestHouse',
                'deskripsi' => 'guest house merupakan sejenis fasilitas akomodasi, baik milik perorangan/perusahaan yang diperuntukkan khusus bagi tamu hendak menginap.',
                'created_at' => Carbon::now('Asia/Jakarta'),
                'updated_at' => Carbon::now('Asia/Jakarta')
            ],
            [
                'nama' => 'Villa',
                'deskripsi' => 'tetetettetetasttatatatta',
                'created_at' => Carbon::now('Asia/Jakarta'),
                'updated_at' => Carbon::now('Asia/Jakarta')
            ],
            [
                'nama' => 'Cottages',
                'deskripsi' => 'tesssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss',
                'created_at' => Carbon::now('Asia/Jakarta'),
                'updated_at' => Carbon::now('Asia/Jakarta')
            ],
            [
                'nama' => 'Losmen',
                'deskripsi' => 'teseeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee',
                'created_at' => Carbon::now('Asia/Jakarta'),
                'updated_at' => Carbon::now('Asia/Jakarta')
            ],
        ]);
    }
}
