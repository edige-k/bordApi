<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Partner\StoreRequest;
use App\Models\User;
use App\Services\Admin\Contracts as Contracts;
use App\Services\Admin\Dto\PartnerCreateDtoFactory;

use App\Http\Resources\Admin\UserResource;
use Illuminate\Support\Facades\Hash;

class PartnerController extends BaseController
{

    //all partners
        public function index(){
        $user= User::all();
//            return new UserCollection(User::all());
            return response()->json($user);
        }

    //one partner
    public function show($id){
        $user =new UserResource(User::findOrFail($id));
       if($user->hasRole('partner')) {
           return User::where('id',$id)->first();
       }
       else{
           return response()->json("manager");
       }
//       return  User::find($id);
    }
    //store partner
        public function store(StoreRequest $request){
            if ($request->role_id==3){
                 app(Contracts\CreateOrganization::class)->execute(
                    PartnerCreateDtoFactory::fromRequest($request)
                );
                return response()->json("Created Partner");
            }
            elseif ($request->role_id==2){
                app(CreateOrganization::class)->execute(
                    PartnerCreateDtoFactory::fromRequest($request)
                );
                return response()->json("Created Manager");
            }


//           $data= PartnerCreateDtoFactory::fromRequest($request);
//           return $this->service->store($data);
        }
}

