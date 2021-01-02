<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Order;
use App\Pemesanan;
use App\Rating;
use App\RatingPaket;
use App\Transaction;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function showRating($userID, $productID)
    {
        $show = false;
        $transactions = Transaction::where('status', 'orderSuccessed')
            ->where('customer_id', $userID)
            ->get();
        if ($transactions != null) {
            foreach ($transactions as $transaction) {
                $orders = Order::where('transaction_id', $transaction->id)
                    ->where('product_id', $productID)
                    ->first();

                if ($orders != null) {
                    $show = true;
                    break;
                }

            }
        }

        return response()->json($show);
    }

    public function showRatingPaket($userID, $paketid)
    {
        $show = false;
        $transactions = Pemesanan::where('status', 3)
            ->where('user_id', $userID)
            ->with('getSesi')->get();

        if ($transactions != null) {
            foreach ($transactions as $transaction) {
                if ($transaction->getSesi->paket_id == $paketid) {
                    $show = true;
                    break;
                }
            }
        }

        return response()->json($show);
    }

    public function setRating(Request $request)
    {
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

    public function setRatingPaket(Request $request)
    {
        if ($request->get('user') != null && $request->get('user') != "") {
            if ($this->getPersonalRatingPaket($request->get('user'), $request->get('paket')) != null) {
                return response()->json(['message' => 'Anda telah memberikan penilaian terhadap barang ini'], 409);
            }

            $rate = new RatingPaket();
            $rate->paket_id = $request->get('paket');
            $rate->user_id = $request->get('user');
            $rate->rating = $request->get('rating');
            $rate->save();
            return response()->json($rate, 200);
        } else {
            return response()->json(['message' => 'User tidak memiliki otorisasi untuk memberikan penilaian barang'], 401);
        }
    }

    private function getPersonalRating($userID, $productID)
    {
        return Rating::where('user_id', $userID)
            ->where('product_id', $productID)
            ->first();
    }

    private function getPersonalRatingPaket($userID, $productID)
    {
        return RatingPaket::where('user_id', $userID)
            ->where('paket_id', $productID)
            ->first();
    }

    public function getRating($productID)
    {
        return Rating::where('product_id', $productID)
            ->get();
    }

    public function getRatingPaket($id)
    {
        return RatingPaket::where('paket_id', $id)
            ->get();
    }

}
