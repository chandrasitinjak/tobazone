<?php

namespace App\Http\Controllers\API;

use App\Order;
use App\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Rating;

class RatingController extends Controller
{
    public function showRating($userID, $productID)
    {
        $show = false;
        $transactions = Transaction::where('status', 'orderSuccessed')
            ->where('customer_id', $userID)
            ->get();
        if($transactions != null)
        {
            foreach ($transactions as $transaction)
            {
                $orders = Order::where('transaction_id', $transaction->id)
                    ->where('product_id', $productID)
                    ->first();

                if($orders != null)
                {
                    $show = true;
                    break;
                }

            }
        }

        return response()->json($show);
    }

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
