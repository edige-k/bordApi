<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
class PermissionController extends Controller
{

// all permissions
    public function index(){
        $permissions = Permission::all();
//        $permission = Role::find(1)->user;


        return response()->json($permissions);
    }


    //one permission
    public function show($id){
        $permission = Permission::where('id',$id)->first();
        return response()->json($permission);
    }


    //store permission
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required'

        ]);
        $permission = Permission::create([
            'name' => $request->name,
            'guard_name' =>"web",
        ]);

        return response()->json("Created Successfully");
    }
    //assign role
    public function assignRole(Request $request, Permission $permission)
    {
        if ($permission->hasRole($request->role)) {
            return back()->with('message', 'Role exists.');
        }

        $permission->assignRole($request->role);

        return back()->with('message', 'Role assigned.');
    }

}
