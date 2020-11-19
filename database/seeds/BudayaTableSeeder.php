<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class BudayaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Budaya::insert([
            [
                'nama_budaya' => 'Batak Toba',
                'lokasi' => 'Jl. Siliwangi No.8, Balige, Kabupaten Toba Samosir, Sumatera Utara, Indonesia',
                'foto' => 'toba.jpg',
                'cbt_id' => 1,
                'kabupaten_id' => 2,
                'deskripsi' => 'cantik',
                'created_at' => Carbon::now('Asia/Jakarta'),
                'updated_at' => Carbon::now('Asia/Jakarta')
            ],
            [
                'nama_budaya' => 'Batak Karo',
                'lokasi' => 'Jl. Siliwangi No.8, Balige, Kabupaten Toba Samosir, Sumatera Utara, Indonesia',
                'foto' => 'Karo.jpg',
                'cbt_id' => 1,
                'kabupaten_id' => 2,
                'deskripsi' => 'cantik',
                'created_at' => Carbon::now('Asia/Jakarta'),
                'updated_at' => Carbon::now('Asia/Jakarta')
            ],
            [
                'nama_budaya' => 'Batak Pakpak',
                'lokasi' => 'Jl. pakpak No.8, Balige, Kabupaten Toba Samosir, Sumatera Utara, Indonesia',
                'foto' => 'pakpak.jpg',
                'cbt_id' => 1,
                'kabupaten_id' => 2,
                'deskripsi' => 'cantik',
                'created_at' => Carbon::now('Asia/Jakarta'),
                'updated_at' => Carbon::now('Asia/Jakarta')
            ],
        ]);
    }
}
