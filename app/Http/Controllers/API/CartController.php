<?php

namespace App\Http\Controllers\API;

use App\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cart = Cart::where('product_id', $request->productId)
                    ->where('user_id', $request->userId)
                    ->first();
        
        if($cart !== null) {
            $cart->total += $request->total;
            $cart->update();
        } else {
            $cart = new Cart();
            $cart->user_id = $request->userId;
            $cart->product_id = $request->productId;
            $cart->total = $request->total;
            $cart->save();
        }

        return response()->json($cart);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cart = Cart::find($id);
        $cart->total = $request->total;
        $cart->update();
        return response()->json($cart);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        $cart->delete();
    }

    public function getUserCart($id) {
        $result = Cart::with('product')->where('user_id', $id)->get();
        return response()->json($result);
    }
}
