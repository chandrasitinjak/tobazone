<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

use App\Komunitas;

class CbtController extends Controller
{
    public function getCbt() {
        return response()->json(DB::table('komunitas')->get());
    }
}
