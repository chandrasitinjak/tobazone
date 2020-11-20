<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ObjekWisata;
use App\Akomodasi;
use App\Kuliner;

class MapController extends Controller
{
    public function displayMap(){
        	$objekWisatas = ObjekWisata::all();
        	$akomodasis = Akomodasi::all();
        	$kuliners = Kuliner::all();

        	return view('informasi-pariwisata.wisatawan.Map.index',compact('objekWisatas','akomodasis','kuliners'));
        }

        public function displayObjek(){
        	$objekWisatas = ObjekWisata::all();

        	return view('informasi-pariwisata.wisatawan.Map.objek_map',compact('objekWisatas'));
        }

    	public function displayAkomodasi(){
        	$akomodasis = Akomodasi::all();

        	return view('informasi-pariwisata.wisatawan.Map.akomodasi_map',compact('akomodasis'));
        }
    	public function displayKuliner(){
        	$kuliners = Kuliner::all();

        	return view('informasi-pariwisata.wisatawan.Map.kuliner_map',compact('kuliners'));
        }
}
