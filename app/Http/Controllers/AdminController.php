<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
  public function index()
  {
    return view('admin.index');
  }

  public function countOrder()
  {
    $count = Order::where('status','=','pending')->count();

    return view('admin.index')->with('counts', $count);
  }
 
}