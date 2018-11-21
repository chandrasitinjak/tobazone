<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transaction;
use App\Profile;
use App\Order;
use App\Payment;
use App\Cart;
use Auth;

class TransactionController extends Controller
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
        $profile = Profile::where('user_id', $request->all()['customerId'])->first();

        $customerAddress = $request->all()['customerAddress'];
        $shippingAddress = $profile->name . ", " .
                           $profile->phone . "\n" .
                           $customerAddress['detail'] . ", " .
                           $customerAddress['subdistrict_name'] . ", " .
                           $customerAddress['city_name'] . ", " .
                           $customerAddress['province_name'] . " (" .
                           $customerAddress['postal_code'] . ")";
 
        $merchants = $request->all()['merchants'];
        
        foreach($merchants as $merchant) {
            $transaction = Transaction::create([
                'customer_id' => $request->all()['customerId'],
                'merchant_id' => $merchant['id'],
                'address' => $shippingAddress,
                'additional_info' => "",
                'status' => "pending"
            ]);

            $orders = $merchant['products'];
            
            foreach($orders as $order) {
                $o = Order::create([
                    'transaction_id' => $transaction->id,
                    'product_id' => $order['productId'],
                    'quantity' => $order['quantity']
                ]);

                if($o) {
                    Cart::find($order['cartId'])->delete();
                }
            }

            Payment::create([
                'transaction_id' => $transaction->id,
                'product_cost' => $merchant['totalProductCost'],
                'shipping_cost' => $merchant['totalShippingCost'],
            ]);
        }

        return response()->json($transaction);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getCustomerTransaction($id) {
        $transaction = Transaction::with(['orders', 'orders.product', 'payment'])
                                  ->where('customer_id', $id)
                                  ->whereIn('status', ['pending', 'acceptedByMerchant'])
                                  ->get();

        return response()->json($transaction);
    }

    public function getTransaction($userId, $tranId ) {
        $transaction = Transaction::with(['customer', 'customer.profile', 'payment'])
                                  ->where('customer_id', $userId)
                                  ->where('id', $tranId)
                                  ->first();
        return response()->json($transaction);
    }

    public function updateProofOfPayment(Request $request, $id) {
        $image = $request->file('image');
        $imageName = time() . $image->getClientOriginalName();
        $destinationPath = public_path('/images/proof-of-payment');
        $image->move($destinationPath, $imageName);

        $transaction = Transaction::find($id);
        $payment = $transaction->payment;
        $payment->proof = json_encode([
            "image" => $imageName,
            "bank" => $request->bank,
            "senderName" => $request->name,
        ]);
        $payment->update();
    }
}
