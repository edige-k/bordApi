<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RoleController extends Controller
{


    public function index(){
        $roles = Role::all();
        return response()->json($roles);
    }
    public function show($id){
        $roles = Role::find($id);
        return response()->json($roles->permissions);
    }

    public function givePermission(Request $request, Role $role)
    {
        if($role->id==1){
            $permission = Permission::all();
            $role->givePermissionTo($permission);
            return response()->json($role);
        }
        $permission = Permission::find($request->id);
        $role->givePermissionTo($permission);
        return response()->json($role);

    }

}
