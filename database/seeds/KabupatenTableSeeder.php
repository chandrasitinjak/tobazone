<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class KabupatenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Kabupaten::insert([
            [
                'alamat' => 'Dolok sanggul',
                'nama_kabupaten' => 'Humbang Hasundutan',
                'gambar_kabupaten' => 'https://images.unsplash.com/photo-1585371979158-0e577cf0204e?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max&ixid=eyJhcHBfaWQiOjF9',
                'longitude' => '98.7485729',
                'latitude' => '2.251991',
                'created_at' => Carbon::now('Asia/Jakarta'),
                'updated_at' => Carbon::now('Asia/Jakarta')
            ],
            [
                'alamat' => 'Balige',
                'nama_kabupaten' => 'Toba',
                'gambar_kabupaten' => 'https://images.unsplash.com/photo-1569833905347-2e8c153dcf89?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max&ixid=eyJhcHBfaWQiOjF9',
                'longitude' => '99.083252',
                'latitude' => '2.3337119',
                'created_at' => Carbon::now('Asia/Jakarta'),
                'updated_at' => Carbon::now('Asia/Jakarta')
            ],
            [
                'alamat' => 'Tarutung',
                'nama_kabupaten' => 'Tapanuli Utara',
                'gambar_kabupaten' => 'https://images.unsplash.com/photo-1569832653475-fd1028ed7eab?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max&ixid=eyJhcHBfaWQiOjF9',
                'longitude' => '98.9797712',
                'latitude' => '2.0118822',
                'created_at' => Carbon::now('Asia/Jakarta'),
                'updated_at' => Carbon::now('Asia/Jakarta')
            ],
            [
                'alamat' => 'Pematang Siantar',
                'nama_kabupaten' => 'Simalungun',
                'gambar_kabupaten' => 'https://images.unsplash.com/photo-1556100053-fdab394a0985?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max&ixid=eyJhcHBfaWQiOjF9',
                'longitude' => '99.0681668',
                'latitude' => '2.970042',
                'created_at' => Carbon::now('Asia/Jakarta'),
                'updated_at' => Carbon::now('Asia/Jakarta')
            ],
            [
                'alamat' => 'Pangururan',
                'nama_kabupaten' => 'Samosir',
                'gambar_kabupaten' => 'https://images.unsplash.com/photo-1545886290-dc80d8908b9e?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max&ixid=eyJhcHBfaWQiOjF9',
                'longitude' => '98.7150831',
                'latitude' => '2.6378061',
                'created_at' => Carbon::now('Asia/Jakarta'),
                'updated_at' => Carbon::now('Asia/Jakarta')
            ],
            [
                'alamat' => 'Berastagi',
                'nama_kabupaten' => 'Karo',
                'gambar_kabupaten' => 'https://images.unsplash.com/photo-1586703449297-0618fa522ecf?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max&ixid=eyJhcHBfaWQiOjF9',
                'longitude' => '98.504913',
                'latitude' => '3.185291',
                'created_at' => Carbon::now('Asia/Jakarta'),
                'updated_at' => Carbon::now('Asia/Jakarta')
            ],
            [
                'alamat' => 'Dairi',
                'nama_kabupaten' => 'Dairi',
                'gambar_kabupaten' => 'https://images.unsplash.com/photo-1569081562679-6d71c00aab86?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max&ixid=eyJhcHBfaWQiOjF9',
                'longitude' => '98.265058',
                'latitude' => '2.8675801',
                'created_at' => Carbon::now('Asia/Jakarta'),
                'updated_at' => Carbon::now('Asia/Jakarta')
            ],
            [
                'alamat' => 'Pakpak Barat',
                'nama_kabupaten' => 'Pakpak Barat',
                'gambar_kabupaten' => 'https://images.unsplash.com/photo-1539605481381-55a82c810663?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max&ixid=eyJhcHBfaWQiOjF9',
                'longitude' => '98.2212979',
                'latitude' => '2.5135376',
                'created_at' => Carbon::now('Asia/Jakarta'),
                'updated_at' => Carbon::now('Asia/Jakarta')
            ],
        ]);
    }
}
