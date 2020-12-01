<?php
/**
 * Created by Sogumontar Hendra Simangunsong on $DATA.
 */

namespace App\Http\Controllers;

use App\Homestay;
use App\HomestayCarousel;
use App\HomestayRoomCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\HomestayOrders;

class HomestayRoomsCategoriesController extends Controller
{

    public function findAllCategories(){
        $result = HomestayRoomCategory::all();
        return view('admin.homestay.all_room_categories')->with('transactions', $result);
    }
}
