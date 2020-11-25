<?php

namespace App\Http\Controllers;

use App\Homestay;
use App\HomestayOrders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    /**
     * Display a list of homestay orders by user_id
     */
    public function findAllCustomerOrder()
    {
        $user = Auth::user();
        $homestayOrders = HomestayOrders::where('id_customer', $user->id)->get();
        return view('users.customers.homestays.index')->with('homestayOrders', $homestayOrders);
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
        $imageName = time() . $uploadedImages->getClientOriginalName();
        $destinationPath = public_path('/images');
        $uploadedImages->move($destinationPath, $imageName);

        $homestay = new Homestay();
        $homestay->user_id = Auth::user()->id;

        $homestay->name = $request->name;
        $homestay->price = $request->price;
        $homestay->total_room = $request->totalRoom;
        $homestay->room_available = $request->roomAvailable;
        $homestay->description = $request->description;
        $homestay->image = json_encode($imageName);
        $homestay->address = $request->address;
        $homestay->status = 1;
        $homestay->kabupaten = $request->kabupaten;
        $homestay->kecamatan = $request->kecamatan;
        $homestay->desa = $request->desa;
        $homestay->merchant_id = $request->merchantId;

        $homestay->save();

        return redirect('/merchant')->with('success', 'Product created successfully.');
    }


    public function bookHomestay(Request $request)
    {
            $orderHomestay = new HomestayOrders();
            $orderHomestay->id_customer = $request->idCustomer;
            $orderHomestay->id_homestay = $request->idHomestay;
            $orderHomestay->total_price = $request->totalPrice;
            $orderHomestay->check_in = $request->checkIn;
            $orderHomestay->duration = $request->duration;
            $orderHomestay->payment_method = $request->paymentMethod;
            $orderHomestay->is_paid = false;
            $orderHomestay->resi = "";
            $orderHomestay->status = "Active";

            $orderHomestay->save();
            return "Pesan penginapan berhasil";
    }

}
