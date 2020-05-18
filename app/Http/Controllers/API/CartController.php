<?php

namespace App\Http\Controllers\API;

use App\Cart;
use App\User;
use App\Wishlist;
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

    
    public function addToWishlist(Request $request)
    {
        $newData = new Wishlist();
        $newData->user_id = $request->userId;
        $newData->product_id = $request->productId;
        $newData->save();
    }

    public function cekWishlist($userId, $productId) {        

        $data = Wishlist::all()->where('product_id', $productId)->where('user_id', $userId);
        return response()->json($data);
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
        // if(Auth::check()) {
            $carts = Cart::with(['product', 'product.merchant', 'product.merchant.profile'])->where('user_id', $id)->get();
            $buyer = User::with('profile')->find($id);
        
            return response()->json([
                'carts' => $carts,
                'buyer' => $buyer
            ]);
        // } else {
        //     return null;
        // }
    }
}
