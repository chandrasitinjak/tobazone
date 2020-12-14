<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(RoleAndPermissionSeeder::class);
        $this->call(ProvinceAndCitySeeder::class);
        $this->call(KabupatenTableSeeder::class);
        $this->call(HomestayRoomCategorySeeder::class);
        $this->call(HomestayRoomFacilitiesSeeder::class);
    }
}
