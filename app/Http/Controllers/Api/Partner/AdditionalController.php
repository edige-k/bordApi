<?php

namespace App\Http\Controllers\Api\Partner;

use App\Http\Controllers\Controller;
use App\Models\Additional;
use App\Models\AdditOrganization;
use Illuminate\Http\Request;
use App\Models\User;
Use Illuminate\Support\Facades\Auth;
class AdditionalController extends Controller
{
    public function store(Request $request){
        $validated= $request->validate([
            'name'=>'required|unique:additionals,name',
        ]);
        $additionals= Additional::create([
            'name' => $request->name,
        ]);
        return response()->json($additionals);
    }

    //select kitchen
    public function store_additional_org(Request $request)
    {
        $organization = User::find(Auth::user()->id)->organization;

        $validated = $request->validate([
            'additional_id' => ['required','unique:additional_organization,additional_id'],
        ]);
        $additional_org = AdditOrganization::all();
        $additional_org->additional_id= $request->additional_id;
        $additional_org->organization_id = $organization->id;
        $organization->additionals()->attach($additional_org->additional_id);

        return response()->json($additional_org);


    }
}
