<?php
/**
 * Created by Sogumontar Hendra Simangunsong on .
 */


namespace App\Http\Controllers;


use App\HomestayOrders;
use App\HomestayRooms;
use App\HomestayTransactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Integer;

class HomestayTransactionController extends Controller
{

    public function bulkBookedHomestay(Request $request){
        $price =0;
        $id_homestay=0;
        echo $request->durasi;
        for( $i=0 ; $i<sizeof($request->checkbox) ; $i++){
            $rooms = HomestayRooms::find($request->checkbox[$i]);
            $id_homestay= $rooms->id_homestay;
            echo $rooms;
            $price+= $rooms->price;
        }
        $transaction = new HomestayTransactions();
        $transaction->user_id = Auth::id();
        $transaction->homestay_id = $id_homestay;
        $transaction->check_in = $request->checkIn;
        $transaction->duration = $request->durasi;
        $transaction->price = $price;
        $transaction->rooms = sizeof($request->checkbox);
        $transaction->payment_method = ' ';
        $transaction->is_paid = false;
        $transaction->resi = ' ';
        $transaction->nama_pengirim = ' ';
        $transaction->status = 'Pending';
        $transaction->save();
        for( $i=0 ; $i<sizeof($request->checkbox) ; $i++){
            $rooms = HomestayRooms::find($request->checkbox[$i]);
            $homestay_orders = new HomestayOrders();
            $homestay_orders->id_customer = Auth::id();
            $homestay_orders->id_homestay = $id_homestay;
            $homestay_orders->total_price = $rooms->price;
            $homestay_orders->check_in = $request->checkIn;
            $homestay_orders->duration = $request->durasi;
            $homestay_orders->jumlah_kamar = 1;
            $homestay_orders->payment_method = ' ';
            $homestay_orders->is_paid = 0;
            $homestay_orders->resi = ' ';
            $homestay_orders->status = 'Pending';
            $homestay_orders->id_kamar = $rooms->id;
            $trans=HomestayTransactions::where('user_id', Auth::id())->latest('created_at')->first();
            $homestay_orders->id_transaction = $trans->id;
            $homestay_orders->save();
        }
        return redirect('/user/homestay/order/findAll');
    }

}
