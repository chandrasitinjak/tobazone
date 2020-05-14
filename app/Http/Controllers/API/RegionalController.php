<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use DB;

class RegionalController extends Controller
{
    public function getProvinces() {
        return response()->json(DB::table('provincies')->get());
    }

    public function getCities(Request $request) {
        return response()->json(DB::table('cities')->where('province_id', $request->pro_id)->get());
    }

    public function getSubdistricts(Request $request) {
        
        $client = new Client([
            'base_uri' => 'https://pro.rajaongkir.com/api/',
            'headers' => [
                "key" => env("RAJAONGKIR_API_KEY")
            ]
        ]);

        $result = $client->request('GET', 'subdistrict?city=' . $request->city_id);
        
        return $result->getBody()->getContents();
    }
}
