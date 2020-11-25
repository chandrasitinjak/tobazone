<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class KulinerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Kuliner::insert([
            [
                'nama_kuliner' => 'Smile Coffee',
                'jenis_kuliner' => 'Restorant',
                'longitude' => '99.0623847',
                'foto' => 'smile.jpg',
                'latitude' => '2.3359193',
                'lokasi' => 'Jl. Siliwangi No.8, Balige, Kabupaten Toba Samosir, Sumatera Utara, Indonesia',
                'member_id' => 2,
                'status' => 'ready',
                'kabupaten_id' => 2,
                'deskripsi' => 'cantik',
                'created_at' => Carbon::now('Asia/Jakarta'),
                'updated_at' => Carbon::now('Asia/Jakarta')
            ],
            [
                'nama_kuliner' => 'DBrands Cafe Balige',
                'jenis_kuliner' => 'Restorant',
                'longitude' => '99.06685039999999',
                'foto' => 'dbrands.jpg',
                'latitude' => '2.3297723',
                'lokasi' => 'Jl. Siliwangi No.8, Balige, Kabupaten Toba Samosir, Sumatera Utara, Indonesia',
                'member_id' => 2,
                'status' => 'ready',
                'kabupaten_id' => 2,
                'deskripsi' => 'cantik',
                'created_at' => Carbon::now('Asia/Jakarta'),
                'updated_at' => Carbon::now('Asia/Jakarta')
            ],
            [
                'nama_kuliner' => 'Pizza Andaliman',
                'jenis_kuliner' => 'Restorant',
                'longitude' => '99.0541291',
                'foto' => 'pizza.jpg',
                'latitude' => '2.329186',
                'lokasi' => 'Jl. Siliwangi No.8, Balige, Kabupaten Toba Samosir, Sumatera Utara, Indonesia',
                'member_id' => 2,
                'status' => 'ready',
                'kabupaten_id' => 2,
                'deskripsi' => 'cantik',
                'created_at' => Carbon::now('Asia/Jakarta'),
                'updated_at' => Carbon::now('Asia/Jakarta')
            ],
            [
                'nama_kuliner' => 'Hutanta Cafe',
                'jenis_kuliner' => 'Restorant',
                'longitude' => '99.081209',
                'foto' => 'hutanta.jpg',
                'latitude' => '2.338114',
                'lokasi' => 'Jl. P. Siantar No.KM 2, Sibola Hotangsas, Balige, Kabupaten Toba Samosir, Sumatera Utara 22312, Indonesia',
                'member_id' => 2,
                'status' => 'ready',
                'kabupaten_id' => 2,
                'deskripsi' => 'cantik',
                'created_at' => Carbon::now('Asia/Jakarta'),
                'updated_at' => Carbon::now('Asia/Jakarta')
            ],
            [
                'nama_kuliner' => 'Cantik Daijo Cafe',
                'jenis_kuliner' => 'Restorant',
                'longitude' => '99.11763169999999',
                'foto' => 'cantik.jpg',
                'latitude' => '2.35191',
                'lokasi' => 'Jl. Sisingamangaraja, Aruan, Lagu Boti, Kabupaten Toba Samosir, Sumatera Utara 22381, Indonesia',
                'member_id' => 2,
                'status' => 'ready',
                'kabupaten_id' => 2,
                'deskripsi' => 'cantik',
                'created_at' => Carbon::now('Asia/Jakarta'),
                'updated_at' => Carbon::now('Asia/Jakarta')
            ],

        ]);
    }
}
