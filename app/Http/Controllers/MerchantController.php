<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}