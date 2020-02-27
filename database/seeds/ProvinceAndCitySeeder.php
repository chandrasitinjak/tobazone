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
        
        $id_provincie = 1;

        foreach($provincies as $province) {
            Province::create([
                'id' => $id_provincie,
                'name' => $province->province,                
            ]);
            
            $id_provincie++;
        }

        $string = file_get_contents("database/seeds/city.json");
        $cities = json_decode($string);
        

        $id_city = 1;
        foreach($cities as $city) {
            City::create([
                "id" => $id_city,
                "province_id" => $city->province_id,
                "type" => $city->type,
                "name" => $city->city_name,
                "postal_code" => $city->postal_code,
            ]);

            $id_city++;
        }
    }
}
