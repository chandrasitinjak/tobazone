<?php

namespace App\Http\Controllers\API;

use App\Product;
use App\ProductReview;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Product::with(['merchant', 'merchant.profile'])->where('stock', '>=', 0)->inRandomOrder()->limit(12)->get());
    }

    public function getSuggest($catProduct, $productId)
    {
        return response()->json(Product::with(['merchant', 'merchant.profile'])->where('id', '!=', $productId)->where('stock', '!=', 0)->where('cat_product', $catProduct)->get());
    }

    public function getProducts($id)
    {
        return response()->json(Product::where('user_id', $id)->get());
    }

    public function searchProduct(Request $request)
    {
        $products = Product::with('merchant.profile')->where('stock', '!=', 0)->where('name', 'LIKE', '%' . $request->keyword . '%')->get();
        return response()->json($products);
    }

    public function searchUlos()
    {
        $products = Product::with('merchant.profile')->where('stock', '!=', 0)->where('cat_product', 'ulos')->get();
        return response()->json($products);
    }

    public function searchPakaian()
    {
        $products = Product::with('merchant.profile')->where('stock', '!=', 0)->where('cat_product', 'pakaian')->get();
        return response()->json($products);
    }

    public function searchMakanan()
    {
        $products = Product::with('merchant.profile')->where('stock', '!=', 0)->where('cat_product', 'makanan')->get();
        return response()->json($products);
    }

    public function searchObat()
    {
        $products = Product::with('merchant.profile')->where('stock', '!=', 0)->where('cat_product', 'obat')->get();
        return response()->json($products);
    }

    public function searchAksesoris()
    {
        $products = Product::with('merchant.profile')->where('stock', '!=', 0)->where('cat_product', 'aksesoris')->get();
        return response()->json($products);
    }

    public function addReview(Request $request, $id)
    {
        ProductReview::create([
            'user_id' => $request->userId,
            'transaction_id' => $request->transactionId,
            'product_id' => $id,
            'body' => $request->feedback
        ]);
    }

    public function getProductTerlaris()
    {
        $query = "SELECT count(orders.id) as ord, ".
            " products.id, ".
            " products.images as images, ".
            " products.name as name, ".
            " products.price as price, ".
            " profiles.name as merchant_name ".
            " from products ".
            " LEFT OUTER JOIN orders on products.id = orders.product_id ".
            " INNER JOIN profiles on profiles.user_id = products.user_id ".
            " Where products.deleted_at IS null ".
            " GROUP by products.id, products.images, products.name, products.price, profiles.name ORDER BY ord DESC LIMIT 10";
        $data = DB::select($query);

        return response()->json($data);
    }


}
