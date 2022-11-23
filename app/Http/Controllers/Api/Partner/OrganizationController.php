<?php

namespace App\Http\Controllers\Api\Partner;

use App\Http\Controllers\Controller;
use App\Models\KitchenOrganization;
use App\Models\Organization;
use App\Models\User;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation;
class OrganizationController extends Controller
{

    //construct
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'role:partner']);
    }


    //organization info
    public function index()
    {
        $organization = User::find(Auth::user()->id)->organization;
        $organization->city;
        return response()->json([$organization]);
    }


    //organization store
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'city_id' => 'required',
            'description' => 'required',
            'name' => 'required',
            'average_check' => 'required',
            'link' => 'required',
            'instagram' => 'required',
        ]);
        $organization = Organization::create([
            'partner_id' => Auth::user()->id,
            'city_id' => $request->city_id,
            'name' => $request->name,
            'description' => $request->description,
            'average_check' => $request->average_check,
            'link' => $request->link,
            'instagram' => $request->instagram,

        ]);
        return response()->json($organization);
    }

    public function store_k_o(Request $request)
    {
        $organization = User::find(Auth::user()->id)->organization;

        $validated = $request->validate([
            'kitchen_id' => ['required','unique:kitchen_organization,kitchen_id'],
        ]);
        $organizations = Organization::all();
        $kitchen_org = KitchenOrganization::all();


          $kitchen_org->kitchen_id= $request->kitchen_id;
          $kitchen_org->organization_id = $organization->id;
          $organization->kitchens()->attach($kitchen_org->kitchen_id);
          return response()->json($kitchen_org);


    }


}
