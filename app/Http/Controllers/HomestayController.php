<?php

namespace App\Http\Controllers;

use App\Homestay;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\HomestayOrders;

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
        return view('users.homestays.AfterSearchPage')->with('homestays', $homestays);
    }

    public function findAllCustomer()
    {
        $homestays = Homestay::All();
        $data = [
            'code' => 200,
            'status' => 'OK',
            'data' => [
                $homestays
            ]
        ];
        return view('users.homestay.index')->with('homestays', $homestays);
    }


    public function search(Request $request)
    {
        $homestays = Homestay::All();
        return view('users.homestay.index')->with('homestays', $homestays);
    }

    public function searchTest()
    {
        $homestays = Homestay::All();
        return view('users.homestay.after_search_page')->with('homestays', $homestays);
    }

    /**
     * Display a list of homestay orders by user id.
     *
     * @return \Illuminate\Http\Response
     */
    public function findAllCustomerOrder()
    {
        $user = Auth::user();
        if (!$user) {
            // Redirect to login page if user is not logged in.
            return redirect('/listlogin');
        }

        $homestayOrders = HomestayOrders::where('id_customer', $user->id)->get();

        return view('users.customers.homestays.index')->with('homestayOrders', $homestayOrders);
    }

    /**
     * Display the detail of a homestay order by order id.
     *
     * @return \Illuminate\Http\Response
     */
    public function findCustomerOrderByID($idOrder)
    {
        // TODO: imeplement detail findCustomerOrderByID.
        print("Under construct");
        die();
    }

    public function findById($id)
    {
        $detail = Homestay::find($id);
        return view('users.homestay.detail_homestay_page')->with('homestays', $detail);
    }

    public function stores(Request $request)
    {

        return "Sukses";
    }

    public function createDataPage()
    {
        return view('users.merchants.homestays.create_homestay');
    }

    public function store(Request $request)
    {
        $length =15;
        $rand =substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
        if ($request->image) {
            $data = explode( ',', $request->image );
            file_put_contents('images/'. $rand.'.png', base64_decode($data[1]));
        }


        $homestay = new Homestay();
        $homestay->name = ($request->get('name'));
        $homestay->price = $request->price;
        $homestay->total_room = $request->totalRoom;
        $homestay->room_available = $request->roomAvailable;
        $homestay->description = $request->description;
        $homestay->image = $rand . '.png';
        $homestay->address = $request->address;
        $homestay->status = 1;
        $homestay->kabupaten = $request->kabupaten['name'];
        $homestay->kecamatan = $request->kecamatan['city'];
        $homestay->merchant_id = Auth::user()->id;
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

    public function approvePenginapan(Request $request, $id)
    {

        $homestay_id = HomestayOrders::find($id);
        $homestay_id->status = "accepted";

        $homestay_id->update();

        return "pesanan diterima";
    }

    public function rejectedPenginapan(Request $request, $id)
    {

        $homestay_id = HomestayOrders::find($id);
        $homestay_id->status = "rejected";

        $homestay_id->update();

        return "pesanan ditolak";
    }

    public function listPesananPenginapan()
    {

        $data = HomestayOrders::all();

        return view('users.merchants.homestays.ListPesananPenginapan')->with('data', $data);
    }


    //Merchant
    public function createHomestayPage()
    {
        $merchant = $this->getAuthincatedMerchant();
        return view('users.merchants.homestays.create_homestay')->with('result', $merchant);
    }

    private function getAuthincatedMerchant()
    {
        $merchant = User::with('profile')->find(Auth::user()->id);
        $address = json_decode(json_decode($merchant->profile->address)[0]);
        $merchant->profile->address = $address;

        return $merchant;
    }

    public function getAllMerchantHomestay()
    {
        $merchant = $this->getAuthincatedMerchant();
        $homestays = Homestay::All();
        $result = [
            "merchant" => $merchant,
            "homestay" => $homestays
        ];
        //        dd($result['merchant']->profile->photo);
        return view('users.merchants.homestays.all_homestay')->with('result', $result);
    }

    public function findAllMerchantHomestay(){
        $homestays = Homestay::where('merchant_id', Auth::user()->id)->get();

        return $homestays;
    }

    public function deleteById($id)
    {
        Homestay::find($id)->delete();
        $merchant = $this->getAuthincatedMerchant();
        $homestays = Homestay::All();
        $result = [
            "merchant" => $merchant,
            "homestay" => $homestays
        ];
        return view('users.merchants.homestays.all_homestay')->with('result', $result);
    }

    public function updateHomestay($id)
    {
        $merchant = $this->getAuthincatedMerchant();
        $homestay = Homestay::find($id);
        $result = [
            "merchant" => $merchant,
            "homestay" => $homestay
        ];
        return view('users.merchants.homestays.update_homestay')->with('result', $result);
    }

    public function update(Request $request, $id)
    {
        $homestay = Homestay::find($id);
        if ($request->file('images')) {
            $image = $request->file('images');
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $homestay->image);
        }

        $homestay->name = $request->name;
        $homestay->total_room = $request->stock;
        $homestay->room_available = $request->stock_available;
        $homestay->price = $request->price;
        $homestay->description = $request->description;
        $homestay->address = $request->address;

        $homestay->image = $homestay->image;
        $homestay->update();

        return redirect('/merchant/homestay/findAll')->with('success', 'Product created successfully.');
    }

    public function findHomestayById($id)
    {
        $homestay = Homestay::find($id);
        return $homestay;
    }

    public function findAllMerchantOrders()
    {
        $orders = HomestayOrders::all();
        $merchant = $this->getAuthincatedMerchant();
        $result = [
            "merchant" => $merchant,
            "orders" => $orders
        ];
        return view('users.merchants.homestays.record_pesanan_penginapan')->with('result', $result);
    }
}
