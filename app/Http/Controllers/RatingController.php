<?php

namespace App\Http\Controllers\API;

use App\Rating;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RatingController extends Controller
{
    public function setRating(Request $request) {
        if ($request->get('user') != null && $request->get('user') != "") {
            if ($this->getPersonalRating($request->get('user'), $request->get('product')) != null) {
                return response()->json(['message' => 'Anda telah memberikan penilaian terhadap barang ini'], 409);
            }

            $rate = new Rating();
            $rate->product_id = $request->get('product');
            $rate->user_id = $request->get('user');
            $rate->rating = $request->get('rating');
            $rate->save();
            return response()->json($rate, 200);
        } else {
            return response()->json(['message' => 'User tidak memiliki otorisasi untuk memberikan penilaian barang'], 401);
        }
    }

    private function getPersonalRating($userID, $productID) {
        return Rating::where('user_id', $userID)
            ->where('product_id', $productID)
            ->first();
    }

    public function getRating($productID) {
        return Rating::where('product_id', $productID)
            ->get();
    }
}
