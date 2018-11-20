<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use Auth;
use DB;

class OrderController extends Controller
{
    public function newOrder() {
        $transactions = Transaction::with('orders')->where('status', 'pending')->get();
        return view('admin.orders.index')->with('transactions', $transactions);
      }

    public function orderconfirm($id)
    {
        $confirm = Transaction::find($id);
        $confirm->status = 'activated';

        $confirm->save();
        
        return redirect('/admin/neworder');
        
    }
}
