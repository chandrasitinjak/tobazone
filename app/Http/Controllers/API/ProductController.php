<?php

namespace App\Http\Controllers\API;

use App\Product;
use App\ProductReview;
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
        return response()->json(Product::with(['merchant', 'merchant.profile'])->inRandomOrder()->limit(15)->get());
    }

    public function getProducts($id) {
        return response()->json(Product::where('user_id', $id)->get());
    }

    public function searchProduct(Request $request) {
        $products = Product::with('merchant.profile')->where('name', 'LIKE', '%'. $request->keyword .'%')->get();
        return response()->json($products);
    }

    public function addReview(Request $request, $id) {
        ProductReview::create([
            'user_id' => $request->userId,
            'transaction_id' => $request->transactionId,
            'product_id' => $id,
            'body' => $request->feedback
        ]);
    }
}
