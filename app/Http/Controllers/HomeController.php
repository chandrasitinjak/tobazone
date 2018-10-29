<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Role::create(['name'=>'costumer']);
        // Permission::create(['name'=>'see the product']);
        // $role = Role::findById(3);
        // $permission = Permission::findById(2);

        // $role->revokePermissionTo($permission);
        auth()->user()->assignRole('costumer');
        // return auth()->user()->permissions;
        return view('home');
    }
}
