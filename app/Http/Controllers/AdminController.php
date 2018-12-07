<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use DB;

class AdminController extends Controller
{
  public function index()
  {
    $countOrder = Transaction::all()->count();

    $countMerchant = DB::table('model_has_roles')->where('role_id', 2)->count();
     
    $countCustomer = DB::table('model_has_roles')->where('role_id', 3)->count();

    return view('admin.index')
    ->with('countOrder', $countOrder)
    ->with('countMerchant', $countMerchant)
    ->with('countCustomer', $countCustomer);
         
  }
 
}