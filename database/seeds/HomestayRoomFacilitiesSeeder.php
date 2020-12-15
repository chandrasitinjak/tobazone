<?php

use Illuminate\Database\Seeder;
class HomestayRoomFacilitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\HomestayRoomFacilities::insert([
            [
                'facilities_name' => 'Wifi',
                'facilities_deskripsi' => 'Memiliki wifi untuk ruangan kamar',
                'status' => 'Active',
            ],
            [
                'facilities_name' => 'Sarapan Gratis',
                'facilities_deskripsi' => 'Menyediakan sarapan gratis untuk pengunjung kamar ini',
                'status' => 'Active',
            ],
            [
                'facilities_name' => 'AC',
                'facilities_deskripsi' => 'Menyediakan Air Conditioner',
                'status' => 'Active',
            ],
            [
                'facilities_name' => 'TV',
                'facilities_deskripsi' => 'Menyediakan Televisi',
                'status' => 'Active',
            ],
            [
                'facilities_name' => 'Peralatan Mandi',
                'facilities_deskripsi' => 'Menyediakan peralatan mandi',
                'status' => 'Active',
            ],
            [
                'facilities_name' => 'Sendal kamar',
                'facilities_deskripsi' => 'Menyediakan sendal untuk digunakan di kamar',
                'status' => 'Active',
            ],
        ]);
    }
}
