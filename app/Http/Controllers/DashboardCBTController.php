<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardCBTController extends Controller
{
    public function index() {

        return view('cbt.dashboard');
    }

}
