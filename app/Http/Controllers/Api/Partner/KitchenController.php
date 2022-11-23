<?php

namespace App\Http\Controllers\Api\Partner;

use App\Http\Controllers\Controller;
use App\Models\Kitchen;
use Illuminate\Http\Request;

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

}
