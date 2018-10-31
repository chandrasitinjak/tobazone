<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
  public function index()
  {
    $permissions = Permission::all();
    return view('admin.permissions.index')->with('permissions', $permissions);
  }

  public function store(Request $request)
  {
    Permission::create($request->all());
  }

  public function update(Request $request, $id)
  {
    $permission = Permission::find($id);
    $permission->name = $request->name;
    $permission->update();
  }

  public function destroy($id)
  {
    
  }
}
