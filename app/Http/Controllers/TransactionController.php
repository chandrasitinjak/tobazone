<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\User;
use App\Order;
use App\Product;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function show($id)
    {
        $transaction = Transaction::find($id);
        return view('users.payments.index')->with('transaction', $transaction);
    }

    public function getTransactionByUser($id) {
        $user = User::with('profile')->where("id", $id)->first();
        return view('users.orders.index')->with('user', $user);
    }

    public function getTransactionDetail($id) {
        $transaction = Transaction::with(['orders', 'customer', 'payment', 'customer.profile'])->where('id', $id)->first();
        return view('admin.orders.new-order-detail')->with('transaction', $transaction);
    }

    public function getPaidTransactionDetail($id) {
        $transaction = Transaction::with(['orders', 'customer', 'payment', 'customer.profile'])->where('id', $id)->first();
        return view('admin.orders.paid-order-detail')->with('transaction', $transaction);
    }

    public function getUnpaidTransactionDetail($id){
        $transaction = Transaction::with(['orders', 'customer', 'payment', 'customer.profile'])->where('id', $id)->first();
        return view('admin.orders.unpaid-order-detail')->with('transaction', $transaction);
    }

    public function getNewOrder() {
        $transactions = Transaction::with(['orders', 'merchant', 'customer', 'customer.profile'])->where('status', 'pending')->get();
        //test
        // $transactions = Transaction::with('orders')->where('status', 'pending')->get();
        return response()->json($transactions);
        // return view('admin.orders.new-order')->with('transactions', $transactions);
    }

    public function getPaidOrder() {
        $transactions = Transaction::with('orders')->whereIn('status', ['paid', 'acceptedBySystem'])->get();
        return view('admin.orders.paid-order')->with('transactions', $transactions);
    }

    public function getUnpaidOrder() {
        $transactions = Transaction::with('orders')->whereIn('status', ['acceptedByAdmin', 'acceptedByMerchant'])->get();
        return view('admin.orders.unpaid-order')->with('transactions', $transactions);
    }

    public function getSuccessedOrder() {
        $transactions = Transaction::with('orders')->where('status', 'orderSuccessed')->get();
        return view('admin.orders.successed-order')->with('transactions', $transactions);
    }

    public function getInvalidOrder() {
        $transactions = Transaction::with('orders')->whereIn('status', ['invalidProofOfPayment'])->get();
        return view('admin.orders.invalid-order')->with('transactions', $transactions);
    }

    public function getOnProcessOrder() {
        $transactions = Transaction::with('orders')->whereIn('status', ['readyForProcess'])->get();
        return view('admin.orders.onprocess-order')->with('transactions', $transactions);
    }

    public function getRejectedOrder() {
        $transactions = Transaction::with('orders')->where('status', 'rejectedByMerchant')->where('status', 'rejectedByMerchant')->get();
        return view('admin.orders.rejected-order')->with('transactions', $transactions);
    }

    public function getRejectedOrderDetail($id) {
        $transaction = Transaction::with(['orders', 'customer', 'payment', 'customer.profile'])->where('id', $id)->first();        
        return view('admin.orders.rejected-order-detail')->with('transaction', $transaction);
    }

    public function getInvalidOrderDetail($id) {
        $transaction = Transaction::with(['orders', 'customer', 'payment', 'customer.profile'])->where('id', $id)->first();
        return view('admin.orders.invalid-order-detail')->with('transaction', $transaction);
    }

    public function getSuccessOrderDetail($id) {
        $transaction = Transaction::with(['orders', 'customer', 'payment', 'customer.profile'])->where('id', $id)->first();
        return view('admin.orders.successed-order-detail')->with('transaction', $transaction);
    }

    public function getOnProcessOrderDetail($id) {
        $transaction = Transaction::with(['orders', 'customer', 'payment', 'customer.profile'])->where('id', $id)->first();
        return view('admin.orders.onprocess-order-detail')->with('transaction', $transaction);
    }

    public function updateStatus(Request $request, $id) {
        $transaction = Transaction::find($id);
        $transaction->status = $request->status;
        $transaction->update();

        $order = Order::all()->where('transaction_id', $id);    

        $data_order;

        // $i = 0;
        foreach($order as $ordr) {
            // $data_order[$i]['id_produk'] = $ordr['product_id'];  
            // $data_order[$i]['quantity'] = $ordr['quantity'];

            $data_produk = Product::find($ordr['product_id']);
            $data_produk->stock = $data_produk->stock - $ordr['quantity'];
            $data_produk->sold =  $ordr['quantity'];
            $data_produk->update();
            // $i++;
        }        
        return redirect('/admin/new-order');
    }

    public function getTrackingInfo($userId, $transactionId) {
        $user = User::with('profile')->where('id', $userId)->first();
        return view('users.orders.tracking')->with('user', $user);
    }
}
