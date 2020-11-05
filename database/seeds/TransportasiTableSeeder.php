<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class TransportasiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Transportasi::insert([
            [
                'nama_transportasi' => 'Kapal ferry',
                'jenis_transportasi' => 'Kapal',
                'alamat' => 'Samosir',
                'foto' => 'ferry.jpg',
                'cbt_id' => 1,
                'kabupaten_id' => 2,
                'deskripsi' => 'cantik',
                'created_at' => Carbon::now('Asia/Jakarta'),
                'updated_at' => Carbon::now('Asia/Jakarta')
            ],
            [
                'nama_transportasi' => 'Angkot Balige',
                'jenis_transportasi' => 'Mobil',
                'alamat' => 'Balige',
                'foto' => 'angkot.jpg',
                'cbt_id' => 1,
                'kabupaten_id' => 2,
                'deskripsi' => 'cantik',
                'created_at' => Carbon::now('Asia/Jakarta'),
                'updated_at' => Carbon::now('Asia/Jakarta')
            ],
            [
                'nama_transportasi' => 'Kapal Danau Toba',
                'jenis_transportasi' => 'Kapal',
                'alamat' => 'Samosir',
                'foto' => 'kapal.jpg',
                'cbt_id' => 1,
                'kabupaten_id' => 2,
                'deskripsi' => 'cantik',
                'created_at' => Carbon::now('Asia/Jakarta'),
                'updated_at' => Carbon::now('Asia/Jakarta')
            ]
        ]);
    }
}
