<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
class IndexController extends Controller
{

    //construct
    public function __construct()
    {
         $this->middleware(['auth:sanctum','role:admin']);
    }
//info admin
    public function all(){
        $users = User::role('admin')->get();
        return response()->json($users);
    }

   //info admin
    public function index($id)
    {
        $user = User::where('id',$id)->get();
        return response()->json($user);
    }

  //info city
    public function cities(){
        $city = City::all();
        return response()->json($city);

    }


  //store city
    public function store_city(Request $request){

            $validated= $request->validate([

                'name'=>'required',
            ]);
            $city = City::create([

                'name' => $request->name,
            ]);
            return response()->json($city);

    }


}
