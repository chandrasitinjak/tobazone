<?php

use Illuminate\Database\Seeder;
use App\Province;
use App\City;

class ProvinceAndCitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $string = file_get_contents("database/seeds/province.json");
        $provincies = json_decode($string);
        
        foreach($provincies as $province) {
            Province::create(['name' => $province->province]);
        }

        $string = file_get_contents("database/seeds/city.json");
        $cities = json_decode($string);
        
        foreach($cities as $city) {
            City::create([
                "province_id" => $city->province_id,
                "type" => $city->type,
                "name" => $city->city_name,
                "postal_code" => $city->postal_code,
            ]);
        }
    }
}
