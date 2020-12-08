<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class ObjekWisataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\ObjekWisata::insert([
            [
                'nama_objek_wisata' => 'Lumban Bulbul',
                'lokasi' => 'Lumban Bulbul, Balige, Kabupaten Toba Samosir, Sumatera Utara, Indonesia',
                'foto' => 'bulbul.jpg',
                'longitude' => '99.0732353',
                'latitude' => '2.3484022',
                'category_id' => 1,
                'kabupaten_id' => 2,
                'deskripsi' => 'Pantai Lumban Bulbul terletak di Sumatera Utara, lebih tepatnya di Desa Lumban Bulbul, Balige, Toba Samosir. Berbeda dari pantai pada umumnya, pantai air tawar ini berada di tepi sekitar Danau Toba.

Di pinggiran pantainya terdapat pasir putih yang menjadi ciri khas dari tempat wisata ini. Dari pantai ini, teman-teman dapat memandang keindahan Danau Toba, serta pemandangan bukit-bukit, dan melihat hijaunya pohon-pohon yang terlihat dari kejauhan.

Pantai Lumban Bulbul menjadi satu-satunya pantai yang berpasir putih di daerah Balige, yang mulai ramai dikunjungi wisatawan. Baik wisatawan yang berasal dari daerah itu sendiri, maupun yang berasal dari luar daerah.

Fasilitas Yang ada Di Pantai Lumban Bulbul.

Banyak terdapat wahana yang disediakan di pantai Lumban bulbul ini, seperti banana boat, solu (perahu), dan juga Kapal untuk berkeliling di danau Toba. Bukan hanya itu juga banyak juga tempat mainan untuk anak-anak, seperti ayun-ayunan dan juga luasnya daerah danau yang dapat dijangkau oleh anak-anak untuk mandi. Tidak kalah juga ada kabar dari wargasetempat bahwa di pantai Lumban bulbul ini diadakan konser oleh artis-artis Batak yaitu dua kali seminggu dengan tujuan untuk menghibur wisatawan yang hadir ke pantai tersebut.

Akses Ke Lumban Bulbul.

Pantai ini dapat ditempuh sekitar 1,5 jam dari kota  Parapat, dapat dicapai dengan menggunakan transportasi umum seperti angkot, namun jika ingin lebih nyaman dapat menggunakan transportasi pribadi seperti mobil, motor, atau bahkan sepeda jika ingin lebih santai. Pantai Bulbul ini dapat juga ditempuh sekitar 1 jam dari Bandara Silangit.',
                'member_id' => 1,
                'status' => "ready",
                'created_at' => Carbon::now('Asia/Jakarta'),
                'updated_at' => Carbon::now('Asia/Jakarta')
            ],
            [
                'nama_objek_wisata' => 'Panatapan Tarabunga',
                'lokasi' => 'Tara Bunga, Tampahan, Kabupaten Toba Samosir, Sumatera Utara, Indonesia',
                'foto' => 'tarabunga.jpg',
                'longitude' => '99.0294708',
                'latitude' => '2.3470097',
                'category_id' => 1,
                'kabupaten_id' => 2,
                'deskripsi' => 'cantik',
                'member_id' => 1,
                'status' => "ready",
                'created_at' => Carbon::now('Asia/Jakarta'),
                'updated_at' => Carbon::now('Asia/Jakarta')
            ],
            [
                'nama_objek_wisata' => 'Pakkodian Balige',
                'lokasi' => 'Danau Toba, Lintong Nihuta, Tampahan, Kabupaten Toba Samosir, Sumatera Utara 22312, Indonesia',
                'foto' => 'pakkodian.jpg',
                'longitude' => '99.0134629',
                'latitude' => '2.3396203',
                'category_id' => 1,
                'kabupaten_id' => 2,
                'deskripsi' => 'cantik',
                'member_id' => 1,
                'status' => "ready",
                'created_at' => Carbon::now('Asia/Jakarta'),
                'updated_at' => Carbon::now('Asia/Jakarta')
            ],
            [
                'nama_objek_wisata' => 'Air Terjun Siboruon',
                'lokasi' => 'Siboruon, Balige, Kabupaten Toba Samosir, Sumatera Utara 22312, Indonesia',
                'foto' => 'siboruon.jpg',
                'longitude' => '99.08199139999999',
                'latitude' => '2.280912',
                'category_id' => 1,
                'kabupaten_id' => 2,
                'deskripsi' => 'cantik',
                'member_id' => 1,
                'status' => "ready",
                'created_at' => Carbon::now('Asia/Jakarta'),
                'updated_at' => Carbon::now('Asia/Jakarta')
            ],
            [
                'nama_objek_wisata' => 'Bukit Pahoda',
                'lokasi' => 'Lumban Silintong, Balige, Kabupaten Toba Samosir, Sumatera Utara 22312, Indonesia',
                'foto' => 'pahoda.jpg',
                'longitude' => '99.0406849',
                'latitude' => '2.3475204',
                'category_id' => 1,
                'kabupaten_id' => 2,
                'deskripsi' => 'cantik',
                'member_id' => 1,
                'status' => "ready",
                'created_at' => Carbon::now('Asia/Jakarta'),
                'updated_at' => Carbon::now('Asia/Jakarta')
            ],
            [
                'nama_objek_wisata' => 'Air Terjun Situmurun (Binangalom)',
                'lokasi' => 'Jonggi Nihuta, Lumban Julu, Hatinggian, Lumban Julu, Kabupaten Toba Samosir, Sumatera Utara 22386, Indonesia',
                'foto' => 'situmurun.jpg',
                'longitude' => '99.0081719',
                'latitude' => '2.5370911',
                'category_id' => 1,
                'kabupaten_id' => 2,
                'deskripsi' => 'cantik',
                'member_id' => 1,
                'status' => "ready",
                'created_at' => Carbon::now('Asia/Jakarta'),
                'updated_at' => Carbon::now('Asia/Jakarta')
            ],
            [
                'nama_objek_wisata' => 'Pantai Agadon',
                'lokasi' => 'Sibaruang, Lumban Julu, Kabupaten Toba Samosir, Sumatera Utara 22386, Indonesia',
                'foto' => 'agadon.jpg',
                'longitude' => '99.0406237',
                'latitude' => '2.510664',
                'category_id' => 1,
                'kabupaten_id' => 2,
                'deskripsi' => 'cantik',
                'member_id' => 1,
                'status' => "ready",
                'created_at' => Carbon::now('Asia/Jakarta'),
                'updated_at' => Carbon::now('Asia/Jakarta')
            ],
            [
                'nama_objek_wisata' => 'Air Terjun Sigura-Gura',
                'lokasi' => 'Halado, Pintu Pohan Merant, Kabupaten Toba Samosir, Sumatera Utara 21274, Indonesia',
                'foto' => 'siguragura.jpg',
                'longitude' => '99.30264249999999',
                'latitude' => '2.548432',
                'category_id' => 1,
                'kabupaten_id' => 2,
                'deskripsi' => 'cantik',
                'member_id' => 1,
                'status' => "ready",
                'created_at' => Carbon::now('Asia/Jakarta'),
                'updated_at' => Carbon::now('Asia/Jakarta')
            ],
            [
                'nama_objek_wisata' => 'Pantai Meat',
                'lokasi' => 'Meat, Tampahan, Kabupaten Toba Samosir, Sumatera Utara, Indonesia',
                'foto' => 'meat.jpg',
                'longitude' => '99.0046048',
                'latitude' => '2.3106208',
                'category_id' => 1,
                'kabupaten_id' => 2,
                'deskripsi' => 'cantik',
                'member_id' => 1,
                'status' => "ready",
                'created_at' => Carbon::now('Asia/Jakarta'),
                'updated_at' => Carbon::now('Asia/Jakarta')
            ],
        ]);
    }
}
