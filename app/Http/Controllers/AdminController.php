<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Transaction;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

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

  private function getAuthincatedUser() {
    $user = User::with('profile')->find(Auth::user()->id);
    $address = json_decode(json_decode($user->profile->address)[0]);
    $user->profile->address = $address;

    return $user;
  }

  public function showProfile(){
    $user = $this->getAuthincatedUser();
    return view('admin.profiles.index')->with('user', $user);
  }

  public function editProfile(){
    $user = $this->getAuthincatedUser();
    return view('admin.profiles.edit')->with('user', $user);
  }

  public function showChangePassword(){
    $user = $this->getAuthincatedUser();
    return view('admin.profiles.edit-password')->with('user', $user);
  }
  public function editPassword(Request $request){
    $user = $this->getAuthincatedUser();

    if($request->password === $request->password_confirm){
      $user->password = bcrypt($request->password);
      $user->update();

      return redirect("/admin/profile")->with("success", "Password changed successfully");
    } else {
      return redirect()->back()->with("failed", "Password not matched");
    }

  }
 
}