<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use Carbon\Carbon;

class MerchantController extends Controller
{
  public function index()
  {
    return view('users.merchants.index');
  }

  public function products()
  {
    return view('users.merchants.products');
  }

  public function orders()
  {
    return view('users.merchants.orders');
  }

  public function merchantbeforeconfirmed()
  {
    $merchants = DB::table('model_has_roles')->where('role_id', 2)
                                            ->pluck('model_id')->toArray();
    
    $users = DB::table('users')->where('email_verified_at', null)
                               ->whereIn('id', $merchants)
                               ->pluck('id')->toArray();

    $profiles = DB::table('profiles')->whereIn('user_id', $users)
                                     ->get();
    
    return view('admin.merchant.index')->with('profiles', $profiles);
  }

  public function updateConfirm($id)
  {
    $confirm = Users::find($id);
    $confirm->email_verified_at = Carbon::now();
    $confirm->save();
    return view('admin.merchant.index')->with('confirm', $confirm);
  }
}