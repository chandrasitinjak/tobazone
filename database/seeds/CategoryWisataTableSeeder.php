<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CategoryWisataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\CategoryWisata::insert([
            [
                'nama_category' => 'Natural Attraction',
                'deskripsi' => 'menyediakan tempat wisata dengan nuansa alam',
                'created_at' => Carbon::now('Asia/Jakarta'),
                'updated_at' => Carbon::now('Asia/Jakarta')
            ],
            [
                'nama_category' => 'Hibrid',
                'deskripsi' => 'tedkjabsksbdksbadbasddsadsad',
                'created_at' => Carbon::now('Asia/Jakarta'),
                'updated_at' => Carbon::now('Asia/Jakarta')
            ],
            [
                'nama_category' => 'Man-made attraction',
                'deskripsi' => 'aslfnsadnlskandlsandlsnadl',
                'created_at' => Carbon::now('Asia/Jakarta'),
                'updated_at' => Carbon::now('Asia/Jakarta')
            ],
        ]);
    }
}
