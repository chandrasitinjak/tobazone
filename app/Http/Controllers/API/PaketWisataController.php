<?php

namespace App\Http\Controllers\API;

use App\PaketWisata;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaketWisataController extends Controller
{
    public function getNewPackage(){
        $data = PaketWisata::orderBy('created_at')->take(10)->get();

        return response()->json($data);
    }
}
