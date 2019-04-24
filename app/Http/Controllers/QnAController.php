<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QnAController extends Controller
{
  public function index()
  {
    //
  }

  public function show()
  {
    return view ('users.homes.carabelanja');
  }

  public function showj()
  {
    return view ('users.homes.jual');
  }
}
