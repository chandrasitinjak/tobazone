<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use DB;
use Carbon\Carbon;

class AdminController extends Controller
{
  public function index()
  {
    $countOrder = Transaction::all()->count();

    $countMerchant = DB::table('model_has_roles')->where('role_id', 2)->count();
     
    $countCustomer = DB::table('model_has_roles')->where('role_id', 3)->count();

    // $dataPerDates = collect();
    // foreach( range( -6, 0) AS $i){
    //   $date = Carbon::now()->addDays( $i )->format('Y-m-d');
    //   $dataPerDates->put( $date, 0);
    // }

    // $OrderperDate = Transaction::where( 'created_at', '>=', $dataPerDates->keys()->first() )
    //                           ->groupBy( 'date' )
    //                           ->orderBy( 'date' )
    //                           ->get( [
    //                               DB::raw( 'DATE( created_at ) as date' ),
    //                               DB::raw( 'COUNT( * ) as "count"' )
    //                           ] )
    //                           ->pluck( 'count', 'date' );
    // dd($OrderperDate);
    return view('admin.index')
    ->with('countOrder', $countOrder)
    ->with('countMerchant', $countMerchant)
    ->with('countCustomer', $countCustomer);
         
  }
 
}