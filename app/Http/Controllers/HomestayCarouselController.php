<?php
/**
 * Created by Sogumontar Hendra Simangunsong on $DATA.
 */

namespace App\Http\Controllers;

use App\Homestay;
use App\HomestayCarousel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\HomestayOrders;

class HomestayCarouselController extends Controller
{
    public function getCarousels() {
        return response()->json(HomestayCarousel::all());
    }
}
