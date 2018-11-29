<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use Auth;
use DB;

class OrderController extends Controller
{
    public function getNewOrder() {
        $transactions = Transaction::with('orders')->where('status', 'pending')->get();
        return view('admin.orders.new-order')->with('transactions', $transactions);
    }

    public function getPaidOrder() {
        $transactions = Transaction::with('orders')->where('status', 'paid')->get();
        return view('admin.orders.paid-order')->with('transactions', $transactions);
    }

    public function orderconfirm($id) {
        $confirm = Transaction::find($id);
        $confirm->status = 'acceptedByAdmin';

        $confirm->save();
        
        return redirect('/admin/neworder');
        
    }

    public function detailOrder(){
        return view('admin.orders.detail-order');
    }
}
