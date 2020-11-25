<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class AkomodasiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Akomodasi::insert([
            [
                'nama_akomodasi' => 'Hotel Nabasa',
                'lokasi' => 'Jl. Siliwangi No.8, Balige, Kabupaten Toba Samosir, Sumatera Utara, Indonesia',
                'foto' => 'nabasa.jpg',
                'member_id' => 2,
                'kabupaten_id' => 2,
                'category_akomodasi_id' => 1,
                'deskripsi' => 'cantik',
                'longitude' => '99.0623847',
                'latitude' => '2.3359193',
                'status' => 'ready',
                'created_at' => Carbon::now('Asia/Jakarta'),
                'updated_at' => Carbon::now('Asia/Jakarta')
            ],
            [
                'nama_akomodasi' => 'GM Marsaringar Hotel',
                'lokasi' => 'Balige III, Balige, Kabupaten Toba Samosir, Sumatera Utara, Indonesia',
                'foto' => 'marsaringar.jpg',
                'member_id' => 2,
                'kabupaten_id' => 2,
                'category_akomodasi_id' => 1,
                'deskripsi' => 'cantik',
                'longitude' => '99.06708859999999',
                'latitude' => '2.3287113',
                'status' => 'ready',
                'created_at' => Carbon::now('Asia/Jakarta'),
                'updated_at' => Carbon::now('Asia/Jakarta')
            ],
            [
                'nama_akomodasi' => 'Mutiara Hotel Balige',
                'lokasi' => 'Sibola Hotangsas, Balige, Kabupaten Toba Samosir, Sumatera Utara, Indonesia',
                'foto' => 'mutiara.jpg',
                'member_id' => 2,
                'kabupaten_id' => 2,
                'category_akomodasi_id' => 1,
                'deskripsi' => 'cantik',
                'longitude' => '99.0588186',
                'latitude' => '2.333485',
                'status' => 'ready',
                'created_at' => Carbon::now('Asia/Jakarta'),
                'updated_at' => Carbon::now('Asia/Jakarta')
            ],
            [
                'nama_akomodasi' => 'OYO 1095 Rap Hotel',
                'lokasi' => 'Jl. Siborong Borong - Parapat No.57, Pardede Onan, Balige, Kabupaten Toba Samosir, Sumatera Utara 22312, Indonesia',
                'foto' => 'raphotel.jpg',
                'member_id' => 2,
                'kabupaten_id' => 2,
                'category_akomodasi_id' => 1,
                'deskripsi' => 'cantik',
                'longitude' => '99.05957169999999',
                'latitude' => '2.33342',
                'status' => 'ready',
                'created_at' => Carbon::now('Asia/Jakarta'),
                'updated_at' => Carbon::now('Asia/Jakarta')
            ],
            [
                'nama_akomodasi' => 'Hotel Grand Toba',
                'lokasi' => '8B, Jl. Bukit Barisan No.8A, Balige, Kabupaten Toba Samosir, Sumatera Utara 22312, Indonesia',
                'foto' => 'grandtoba.jpg',
                'member_id' => 2,
                'kabupaten_id' => 2,
                'category_akomodasi_id' => 1,
                'deskripsi' => 'cantik',
                'longitude' => '99.0630609',
                'latitude' => '2.3385977',
                'status' => 'ready',
                'created_at' => Carbon::now('Asia/Jakarta'),
                'updated_at' => Carbon::now('Asia/Jakarta')
            ],
            [
                'nama_akomodasi' => 'Ompu Herti Hotel',
                'lokasi' => 'Jl. Pemandian No.02, Tobasa, Sangkar Nihuta, Balige, Sumatera Utara 22312, Indonesia',
                'foto' => 'ompuherti.jpg',
                'member_id' => 2,
                'kabupaten_id' => 2,
                'category_akomodasi_id' => 1,
                'deskripsi' => 'cantik',
                'longitude' => '99.05563479999999',
                'latitude' => '2.3343228',
                'status' => 'ready',
                'created_at' => Carbon::now('Asia/Jakarta'),
                'updated_at' => Carbon::now('Asia/Jakarta')
            ],
            [
                'nama_akomodasi' => 'Sapadia Villa Balige',
                'lokasi' => 'Jalan Sutomo Kel. Sangkar Nihuta, Samping Kantor Bupati, Danau Toba, Balige, Toba Samosir Regency, North Sumatra 22312, Indonesia',
                'foto' => 'sapadia.jpg',
                'member_id' => 2,
                'kabupaten_id' => 2,
                'category_akomodasi_id' => 1,
                'deskripsi' => 'cantik',
                'longitude' => '99.0521644',
                'latitude' => '2.3306318',
                'status' => 'ready',
                'created_at' => Carbon::now('Asia/Jakarta'),
                'updated_at' => Carbon::now('Asia/Jakarta')
            ],
            [
                'nama_akomodasi' => 'Ita Soposurung',
                'lokasi' => 'Jl. Lintas Tengah Sumatera No.16, Hinalang Bagasan, Balige, Kabupaten Toba Samosir, Sumatera Utara 22312, Indonesia',
                'foto' => 'ita.jpg',
                'member_id' => 2,
                'kabupaten_id' => 2,
                'category_akomodasi_id' => 1,
                'deskripsi' => 'cantik',
                'longitude' => '99.0500794',
                'latitude' => '2.3270777',
                'status' => 'ready',
                'created_at' => Carbon::now('Asia/Jakarta'),
                'updated_at' => Carbon::now('Asia/Jakarta')
            ],
            [
                'nama_akomodasi' => 'Hotel Nusantara',
                'lokasi' => 'Jalan By Pass Soekarno - Hatta, Sukabumi Indah, Kec. Sukabumi, Kota Bandar Lampung, Lampung 35122, Indonesia',
                'foto' => 'nusantara.jpg',
                'member_id' => 2,
                'kabupaten_id' => 2,
                'category_akomodasi_id' => 1,
                'deskripsi' => 'cantik',
                'longitude' => '105.2902439',
                'latitude' => '-5.396077099999999',
                'status' => 'ready',
                'created_at' => Carbon::now('Asia/Jakarta'),
                'updated_at' => Carbon::now('Asia/Jakarta')
            ],
            [
                'nama_akomodasi' => 'Hotel Mezra',
                'lokasi' => 'Jl. Sisingamangaraja No.24, Napitupulu Bagasan, Balige, Kabupaten Toba Samosir, Sumatera Utara 22312, Indonesia',
                'foto' => 'mezra.jpg',
                'member_id' => 2,
                'kabupaten_id' => 2,
                'category_akomodasi_id' => 1,
                'deskripsi' => 'cantik',
                'longitude' => '99.06504369999999',
                'latitude' => '2.3346844',
                'status' => 'ready',
                'created_at' => Carbon::now('Asia/Jakarta'),
                'updated_at' => Carbon::now('Asia/Jakarta')
            ],
            [
                'nama_akomodasi' => 'Homestay Ita Pagar Batu',
                'lokasi' => 'Silalahi Pagar Batu, Balige, Kabupaten Toba Samosir, Sumatera Utara 22312, Indonesia',
                'foto' => 'homestayita.jpg',
                'member_id' => 2,
                'kabupaten_id' => 2,
                'category_akomodasi_id' => 1,
                'deskripsi' => 'cantik',
                'longitude' => '99.0493353',
                'latitude' => '2.331531',
                'status' => 'ready',
                'created_at' => Carbon::now('Asia/Jakarta'),
                'updated_at' => Carbon::now('Asia/Jakarta')
            ]

        ]);
    }
}
