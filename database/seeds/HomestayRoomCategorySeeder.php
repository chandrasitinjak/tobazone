<?php

use Illuminate\Database\Seeder;
class HomestayRoomCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\HomestayRoomCategory::insert([
            [
                'category_name' => 'Deluxe',
                'category_deskripsi' => 'memiliki luas lebih lebar, fasilitas dan pemandangan yang lebih baik dari kamar superior.',
                'status' => 'Active',
            ],
            [
                'category_name' => 'Standard',
                'category_deskripsi' => 'tipe kamar paling dasar yang dimiliki hotel. Kamar tipe standard ditandai dengan harga kamar paling murah.',
                'status' => 'Active',
            ],
            [
                'category_name' => 'Superior',
                'category_deskripsi' => 'lebih baik dari kamar standard, baik dari segi interior maupun ukuran kamar.',
                'status' => 'Active',
            ],
        ]);
    }
}
