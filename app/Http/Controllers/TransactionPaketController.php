<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;

class TransactionPaketController extends Controller
{
    public function show()
    {
        $transaction = Transaction::find(1);
        return view('payment.upload-bukti-pembayaran')->with('transaction', $transaction);
    }
}
