<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use Illuminate\Support\Facades\Auth;

class ShippingController extends Controller
{
    public function index() {
        $carts = Cart::with('product')->where('user_id', Auth::user()->id)->get();
        return view('users.shippings.index')->with('carts', $carts);
    }
}
