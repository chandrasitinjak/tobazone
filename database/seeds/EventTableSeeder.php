<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Event::insert([
            [
                'nama_event' => 'Pesta Danau Toba',
                'tgl_awal' => '10 September 2020',
                'tgl_akhir' => '12 Desember 2020',
                'lokasi' => 'Jl. Siliwangi No.8, Balige, Kabupaten Toba Samosir, Sumatera Utara, Indonesia',
                'foto' => 'pesta.jpg',
                'cbt_id' => 1,
                'kabupaten_id' => 2,
                'deskripsi' => 'cantik',
                'created_at' => Carbon::now('Asia/Jakarta'),
                'updated_at' => Carbon::now('Asia/Jakarta')
            ],
            [
                'nama_event' => 'Karnaval Danau Toba',
                'tgl_awal' => '10 September 2020',
                'tgl_akhir' => '12 Desember 2020',
                'lokasi' => 'Jl. Siliwangi No.8, Balige, Kabupaten Toba Samosir, Sumatera Utara, Indonesia',
                'foto' => 'karnaval.jpg',
                'cbt_id' => 1,
                'kabupaten_id' => 2,
                'deskripsi' => 'cantik',
                'created_at' => Carbon::now('Asia/Jakarta'),
                'updated_at' => Carbon::now('Asia/Jakarta')
            ],
            [
                'nama_event' => 'Pesta Danau Toba',
                'tgl_awal' => '10 September 2020',
                'tgl_akhir' => '12 Desember 2020',
                'lokasi' => 'Jl. Siliwangi No.8, Balige, Kabupaten Toba Samosir, Sumatera Utara, Indonesia',
                'foto' => 'festival.jpg',
                'cbt_id' => 1,
                'kabupaten_id' => 2,
                'deskripsi' => 'cantik',
                'created_at' => Carbon::now('Asia/Jakarta'),
                'updated_at' => Carbon::now('Asia/Jakarta')
            ]
        ]);
    }
}
