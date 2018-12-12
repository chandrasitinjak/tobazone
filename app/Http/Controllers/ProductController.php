<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('user_id', Auth::user()->id)->get();
        return view('users.merchants.products.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.merchants.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $uploadedImages = $request->file('images');
        $imageNames = [];

        foreach ($uploadedImages as $image) {
            $imageName = time() . $image->getClientOriginalName();

            array_push($imageNames, $imageName);

            $destinationPath = public_path('/images');
            $image->move($destinationPath, $imageName);
        }

        $product = new Product();
        $product->user_id = Auth::user()->id;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->sold = 0;
        $product->category = $request->category;
        $product->specification = json_encode([
            'dimention' => $request->dimention,
            'weight' => $request->weight
        ]);
        $product->description = $request->description;
        $product->color = $request->color;
        $product->images = json_encode($imageNames);
        $product->save();

        return redirect('/merchant')->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::with(['reviews', 'reviews.customer', 'reviews.customer.profile'])->where('id',$id)->first();
        return view('users.merchants.products.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('users.merchants.products.edit')->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $newImageNames = [];

        if ($request->file('images')) {
            $uploadedImages = $request->file('images');

            foreach ($uploadedImages as $image) {
                $imageName = time() . $image->getClientOriginalName();

                array_push($newImageNames, $imageName);

                $destinationPath = public_path('/images');
                $image->move($destinationPath, $imageName);
            }
        }

        $product = Product::find($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->category = $request->category;
        $product->specification = json_encode([
            'dimention' => $request->dimention,
            'weight' => $request->weight
        ]);
        $product->color = $request->color;

        $imageNames = json_decode($product->images);
        $deletedImages = explode(",", $request->deletedImages);

        foreach ($deletedImages as $image) {
            if (false !== $key = array_search($image, $imageNames)) {
                unset($imageNames[$key]);
            }
        }

        $finalImageNames = array_merge($newImageNames, $imageNames);

        $product->images = json_encode($finalImageNames);
        $product->update();

        return redirect('products/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id)->delete();
        return redirect('/products');
    }

    public function searchProduct(Request $request) {
        return view('users.homes.search');
    }
}
