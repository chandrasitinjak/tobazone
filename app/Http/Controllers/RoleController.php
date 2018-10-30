<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
  public function index()
  {
    $roles = Role::all();
    return view('admin.roles.index')->with('roles', $roles);
  }

  public function store(Request $request)
  {
    Role::create($request->all());
  }

  public function update(Request $request, $id)
  {
    $role = Role::find($id);
    $role->name = $request->name;
    $role->update();
  }

  public function destroy(Payment $payment)
  {
        //
  }
}
