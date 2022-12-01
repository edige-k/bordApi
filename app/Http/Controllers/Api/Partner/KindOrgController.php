<?php

namespace App\Http\Controllers\Api\Partner;

use App\Http\Controllers\Controller;
use App\Models\KindOrganization;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Kind;
use Illuminate\Support\Facades\Auth;

class KindOrgController extends Controller
{

    public function store(Request $request){
        $validated= $request->validate([
            'name'=>'required',
        ]);
        $kinds= Kind::create([
            'name' => $request->name,
        ]);
//        $kinds = Kind::all();
        return response()->json($kinds);
    }

    public function store_kind_org(Request $request){
        $organization = User::find(Auth::user()->id)->organization;
        $validated = $request->validate([
            'kind_id' => ['required','unique:kind_organization,kind_id'],
        ]);
        $kind_org = KindOrganization::all();
        $kind_org->kind_id= $request->kind_id;
        $kind_org->organization_id = $organization->id;
        $organization->kinds()->attach($kind_org->kind_id);
        return response()->json($kind_org);
    }
}
