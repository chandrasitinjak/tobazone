<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\User;
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
        return view('admin.orders.new-order')->with('transactions', $transactions);
    }

    public function getPaidOrder() {
        $transactions = Transaction::with('orders')->whereIn('status', ['paid', 'acceptedBySystem'])->get();
        return view('admin.orders.paid-order')->with('transactions', $transactions);
    }

    public function getUnpaidOrder() {
        $transactions = Transaction::with('orders')->whereIn('status', ['acceptedByAdmin', 'acceptedByMerchant'])->get();
        return view('admin.orders.unpaid-order')->with('transactions', $transactions);
    }

    public function getInvalidOrder() {
        $transactions = Transaction::with('orders')->whereIn('status', ['invalidProofOfPayment'])->get();
        return view('admin.orders.invalid-order')->with('transactions', $transactions);
    }

    public function getOnProcessOrder() {
        $transactions = Transaction::with('orders')->whereIn('status', ['readyForProcess'])->get();
        return view('admin.orders.onprocess-order')->with('transactions', $transactions);
    }

    public function updateStatus(Request $request, $id) {
        $transaction = Transaction::find($id);
        $transaction->status = $request->status;
        $transaction->update();

        return redirect('/admin/new-order');
    }

}
