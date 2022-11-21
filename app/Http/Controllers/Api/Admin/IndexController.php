<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
class IndexController extends Controller
{
    public function __construct()
    {
        $role = $this->middleware(['role:admin']);
    }

    public function index()
    {
        $role = Role::find(1)->user;
        return response()->json($role);
    }
}
