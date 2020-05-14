<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;

class RajaOngkirController extends Controller
{
    public function getShippingCost(Request $request) {
        $client = new Client([
            'base_uri' => 'https://pro.rajaongkir.com/api/',
            'headers' => [
                "key" => env('RAJAONGKIR_API_KEY'),
                "Content-Type" => "application/x-www-form-urlencoded"
            ]
        ]);
        
        $payload = $request->all(); 

        $result = $client->request('POST', 'cost', ['form_params' => $payload]);
        
        return $result->getBody()->getContents();

        // var_dump($result->getBody()->getContents());
    }
} 
