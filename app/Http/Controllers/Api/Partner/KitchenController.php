<?php

namespace App\Http\Controllers\Api\Partner;

use App\Http\Controllers\Controller;
use App\Models\Kitchen;
use App\Models\KitchenOrganization;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KitchenController extends Controller
{

    public function store(Request $request){
        $validated= $request->validate([
            'name'=>'required',
        ]);
        $kitchens= Kitchen::create([
            'name' => $request->name,
        ]);
        return response()->json($kitchens);
    }

    //select kitchen
    public function store_k_o(Request $request)
    {
        $organization = User::find(Auth::user()->id)->organization;

        $validated = $request->validate([
            'kitchen_id' => ['required','unique:kitchen_organization,kitchen_id'],
        ]);
        $kitchen_org = KitchenOrganization::all();
        $kitchen_org->kitchen_id= $request->kitchen_id;
        $kitchen_org->organization_id = $organization->id;
        $organization->kitchens()->attach($kitchen_org->kitchen_id);
        return response()->json($kitchen_org);


    }

}
