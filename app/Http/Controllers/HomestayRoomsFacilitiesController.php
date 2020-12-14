<?php
/**
 * Created by Sogumontar Hendra Simangunsong on $DATA.
 */

namespace App\Http\Controllers;

use App\HomestayRoomCategory;
use App\HomestayRoomFacilities;

class HomestayRoomsFacilitiesController extends Controller
{

    public function findAllFacilities(){
        $result = HomestayRoomFacilities::all();
        return view('admin.homestay.all_room_facilities')->with('transactions', $result);
    }

    public function findAll(){
        $result = HomestayRoomFacilities::all();
        return $result;
    }

}

