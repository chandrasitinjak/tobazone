<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transaction;

class OrderController extends Controller
{
    public function updateOrderStatus(Request $request, $id) {
        $transaction = Transaction::find($id);
        $transaction->status = $request->status;
        $transaction->update();
    }        

    public function updateShippingNumber(Request $request, $id) {
        $transaction = Transaction::find($id);
        $transaction->shipping_number = $request->shippingNumber;
        $transaction->update();
    }

    public function getNewOrdersByMerchant($id) {
        $trasactions = Transaction::with(['orders', 'orders.product', 'payment'])
                                  ->where('merchant_id', $id)
                                  ->whereIn('status', ['acceptedByAdmin', 'acceptedBySystem'])
                                  ->get();

        return response()->json($trasactions);
    }

    public function getOnProcessOrdersByMerchant($id) {
        $trasactions = Transaction::with(['orders', 'orders.product', 'payment'])
                                  ->where('merchant_id', $id)                                  
                                  ->whereIn('status', ['readyForProcess'])
                                  ->get();

        return response()->json($trasactions);
    }

    public function getSuccesOrdersByMerchant($id) {    

        $trasactions = Transaction::with(['customer_info','orders', 'orders.product', 'payment'])
                                  ->where('merchant_id', $id)
                                  ->where('confirm_user', 1)
                                  ->whereIn('status', ['orderSuccessed'])
                                  ->get();  
                                                  
        // return response()->json($trasactions);
        return response()->json($trasactions);
    }

    
}
