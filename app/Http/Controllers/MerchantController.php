<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Transaction;
use App\Profile;
use Auth;
use DB;
use App\Transaction;
use Carbon\Carbon;

class MerchantController extends Controller
{

  private function getAuthincatedMerchant() {
    $merchant = User::with('profile')->find(Auth::user()->id);
    $address = json_decode(json_decode($merchant->profile->address)[0]);
    $merchant->profile->address = $address;

    return $merchant;
  }

  public function index() {
    $merchant = $this->getAuthincatedMerchant();

    return view('users.merchants.index')->with('merchant', $merchant);
  }

  public function products() {
    return view('users.merchants.products');
  }

  public function orders($id) {
    $merchant = $this->getAuthincatedMerchant();
    
    $orders = Transaction::where('status', 'accepted')
                          ->where('merchant_id', $id)
                          ->get();
             
    return view('users.merchants.orders.index')->with('orders', $orders)
                                               ->with('merchant', $merchant);
  }

  public function newmerchant() {
    $merchants = DB::table('model_has_roles')->where('role_id', 2)
                                             ->pluck('model_id')->toArray();
    
    $users = User::where('email_verified_at', null)
                               ->whereIn('id', $merchants)
                               ->pluck('id')->toArray();

    $profiles = Profile::whereIn('user_id', $users)
                                     ->get();
    
    return view('admin.merchant.index')->with('profiles', $profiles);
  }

  public function updateConfirm($id) {
    $confirm = User::find($id);
    $confirm->email_verified_at = Carbon::now();
    $confirm->save();
    
    return redirect('/merchantconfirmed');
  }
}