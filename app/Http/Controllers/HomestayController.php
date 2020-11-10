<?php

namespace App\Http\Controllers;

use App\Homestay;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HomestayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function findAll()
    {
        $homestays = Homestay::All();
        $data = [
            'code' => 200,
            'status' => 'OK',
            'data' => [
                $homestays
            ]
        ];
        return view('users.merchants.homestays.index')->with('homestays', $homestays);
    }

    public function findById($id)
    {
        $detail = Homestay::find($id);
        return view('users.merchants.homestays.detail')->with('homestays', $detail);
    }

    public function stores(Request $request)
    {
        $this->validate($request, [
            'job' => 'required',
            'machine' => 'required'
        ]);
    }

    public function createDataPage()
    {
        return view('users.merchants.homestays.create_homestay');
    }

    public function store(Request $request, $id)
    {
        $uploadedImages = $request->file('images');
        $imageNames = [];

        $imageName = time() . $uploadedImages->getClientOriginalName();


        $destinationPath = public_path('/images');
        $uploadedImages->move($destinationPath, $imageName);


        $address = Profile::all()->where('user_id', Auth::user()->id)->first();
        $data = json_decode($address->address);
        $real_address = json_decode($data[0]);
        $address_merchant = $real_address->city_name;

        $product = new Product();
        $product->user_id = Auth::user()->id;

        $product->name = $request->name;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->sold = 0;
        $product->description = $request->description;

        $product->images = json_encode($imageNames);
        // $product->asal = $address_merchant;
        $product->asal = $request->product_origin;

        $product->save();

        return redirect('/merchant')->with('success', 'Product created successfully.');
    }


}
