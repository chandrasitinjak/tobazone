<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use Auth;
use DB;

class OrderController extends Controller
{
    public function orderconfirm($id) {
        $confirm = Transaction::find($id);
        $confirm->status = 'acceptedByAdmin';

        $confirm->save();
        
        return redirect('/admin/neworder');   
    }

    public function getDetailSuccesOrdersByMerchant($id) {
        $trasactions = Transaction::with(['customer_info','orders', 'orders.product', 'payment'])
                                  ->where('id', $id)                                  
                                  ->get();  
        

        // return $trasactions;                        
        return view('users/merchants/orders/detailTransaction')->with('trasactions', $trasactions);                        
    }
}
