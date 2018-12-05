<?php

namespace App\Http\Controllers\API;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return response()->json(Product::with(['merchant', 'merchant.profile'])->get());
    }

    public function getProducts($id) {
        return response()->json(Product::where('user_id', $id)->get());
    }

    public function searchProduct(Request $request) {
        $products = Product::with('merchant.profile')->where('name', 'LIKE', '%'. $request->keyword .'%')->get();
        return response()->json($products);
    }
}
