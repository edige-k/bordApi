<?php

namespace App\Http\Controllers\Api\Partner;

use App\Http\Controllers\Controller;
use App\Models\KitchenOrganization;
use App\Models\Organization;
use App\Models\User;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
Use App\Models\KindOrganization;
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
        $organization->city->pluck('name');
        $organization->kitchens;
        $organization->kinds;
        $organization->additionals;

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







}
