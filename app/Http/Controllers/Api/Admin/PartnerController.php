<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use DB;

class PartnerController extends Controller
{

        public function index(){
            $partners = User::where('role_id',3)->get();
            return response()->json($partners);
        }

    public function show($id){

        $partners = User::where('id',$id)->get();
        return response()->json($partners);
    }
        public function store(Request $request){
            $validated= $request->validate([
                'role_id'=>'required',
                'name'=>'required',
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);
            $user = User::create([
                'role_id'=>$request->role_id,
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
                $user->assignRole(['name' => 'partner']);
                return response()->json($user);



        }
}
