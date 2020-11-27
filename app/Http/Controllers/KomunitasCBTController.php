<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JenisLayanan;
use App\Kabupaten;
use App\LayananWisata;

class KomunitasCBTController extends Controller
{
    public function index()
    {
        $data_komunitas = \App\Komunitas::all();
        $kabupaten = Kabupaten::all();
        return view('cbt.komunitas.index',compact('data_komunitas','kabupaten'));
    }


}
