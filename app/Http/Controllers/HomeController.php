<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $roles = $user->getRoleNames();

        foreach ($roles as $role) {
            if ($role === 'admin') {
                return redirect('/admin');
            } else if ($role === 'merchant') {
                return redirect('/merchant');
            }
            
        }        
        return view('users.homes.index');
    }

    public function showUnverifiedPage() {
        return view('users.merchants.unverified');
    }
}
