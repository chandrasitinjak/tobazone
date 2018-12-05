<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Transaction;
use App\Profile;
use Auth;
use DB;
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

  public function getNewOrders($id) {
    $merchant = $this->getAuthincatedMerchant();
             
    return view('users.merchants.orders.new-order')->with('merchant', $merchant);
  }

  public function getOngoingOrders($id) {
    $merchant = $this->getAuthincatedMerchant();
             
    return view('users.merchants.orders.ongoing-order')->with('merchant', $merchant);
  }

  public function newMerchant() {
    $merchants = DB::table('model_has_roles')->where('role_id', 2)
                                             ->pluck('model_id')->toArray();
    
    $users = User::where('email_verified_at', null)
                               ->whereIn('id', $merchants)
                               ->pluck('id')->toArray();

    $profiles = Profile::whereIn('user_id', $users)->get();

    foreach($profiles as $profile) {
      $profile->address = json_decode(json_decode($profile->address)[0]);
    }
    
    return view('admin.merchant.index')->with('profiles', $profiles);
  }

  public function updateConfirm($id) {
    $confirm = User::find($id);
    $confirm->email_verified_at = Carbon::now();
    $confirm->save();
    
    return redirect('/admin/new-merchant');
  }

  public function listMerchant(){
    $merchants = DB::table('model_has_roles')->where('role_id', 2)
                                             ->pluck('model_id')->toArray();

    $users = User::whereIn('id', $merchants)
                          ->pluck('id')->toArray();

    $profiles = Profile::whereIn('user_id', $users)->get();

    foreach($profiles as $profile) {
      $profile->address = json_decode(json_decode($profile->address)[0]);
    }

    return view('admin.merchant.list')->with('profiles', $profiles);
  }

  public function detailMerchant($id){
    $merchants = DB::table('model_has_roles')->where('role_id', 2)
    ->pluck('model_id')->toArray();
    
    $users = User::whereIn('id', $merchants)
                          ->pluck('id')->toArray();
                          
    $profiles = Profile::whereIn('user_id', $users)->get();
  
    $profile = $profiles->find($id);
    
    dd($profile);
    
    foreach($profiles as $profile) {
      $profile->address = json_decode(json_decode($profile->address)[0]);
    }

    return view('admin.merchant.detail-merchant')->with('profiles', $profiles);

  }
}