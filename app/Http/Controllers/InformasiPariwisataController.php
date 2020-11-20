<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kabupaten;
use App\ObjekWisata;
use App\Event;
use App\Budaya;
use App\Kuliner;
use App\Akomodasi;

class InformasiPariwisataController extends Controller
{
    public function index(){
        $kabupatens = Kabupaten::inRandomOrder()->get();
        $objekWisatas1 = ObjekWisata::inRandomOrder()->limit(3)->get();
        $objekWisatas2 = ObjekWisata::inRandomOrder()->limit(3)->get();
        $events = Event::paginate(3);
        $objekWisatas =ObjekWisata::all();
        $kuliners = kuliner::inRandomOrder()->limit(3)->get();
        $events2 = Event::all();
        $akomodasis = Akomodasi::inRandomOrder()->limit(3)->get();
        $budayas = Budaya::all();
        return view('informasi-pariwisata.wisatawan.home',compact('kabupatens','objekWisatas1','objekWisatas2','events','objekWisatas','kuliners','events2', 'akomodasis', 'budayas'));
    }
}
