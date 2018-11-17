<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use Auth;
use DB;

class OrderController extends Controller
{
    
    public function ordercustomer()
    {
        $orders = Transaction::where('status', 'pending')
        ->get();
        return view('admin.order.orderconfirm')->with('orders', $orders);
    }

    public function orderconfirm($id)
    {
        $confirm = Transaction::find($id);
        $confirm->status = 'activated';

        $confirm->save();
        
        return redirect('/orderconfirm');
        
    }
}
