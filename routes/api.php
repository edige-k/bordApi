<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\Admin\IndexController;
use App\Http\Controllers\Api\Admin\PartnerController;
use App\Http\Controllers\Api\Admin\PermissionController;
use App\Http\Controllers\Api\Admin\RoleController;
use App\Http\Controllers\Api\Partner\OrganizationController;
use App\Http\Controllers\Api\Partner\KitchenController;
use App\Http\Controllers\Api\Partner\KindOrgController;
use App\Http\Controllers\Api\Partner\AdditionalController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//LOGIN AND REGISTER
Route::group(['prefix'=>'auth'],function() {
    Route::controller(AuthController::class)->group(function () {
        Route::post('/login', 'login');
        Route::post('/register', 'register');
        Route::get('/logout', 'logout');
        Route::post('/me', 'me')->middleware('auth:sanctum');
    });
});

//ADMIN
Route::middleware(['auth:sanctum', 'role:admin'])->name('admin.')->prefix('admin')->group(function (){
    //ADMIN INDEX
    Route::get('/', [IndexController::class, 'all'])->name('all');

    Route::get('/{admin}', [IndexController::class, 'index'])->name('index');
    Route::post('/city',[IndexController::class,'store_city'])->name('store_city');
    Route::get('/cities', [IndexController::class, 'cities'])->name('cities');

    //PARTNER

    Route::post('/partner', [PartnerController::class, 'store'])->name('partner.store');
    Route::get('/partners',[PartnerController::class,'index'])->name('partner.index');
    Route::get('/partner/{partner}',[PartnerController::class,'show'])->name('partner.show');

    //PERMISSIONS
    Route::post( '/permission', [PermissionController::class, 'store'])->name('permission.store');
    Route::get('/permissions',[PermissionController::class,'index'])->name('permission.index');
    Route::get('/permission/{permission}',[PermissionController::class,'show'])->name('permission.show');
    Route::post('/permission/{permission}/roles',[PermissionController::class,'assignRole'])->name('permission.assignrole');

    //ROLES
    Route::get('/roles',[RoleController::class,'index'])->name('role.index');
    Route::get('/role/{id}',[RoleController::class,'show'])->name('role.show');
    Route::post('/roles/{role}/permissions',[RoleController::class,'givePermission'])->name('role.givepermission');
});

//PARTNER
Route::middleware(['auth:sanctum', 'role:partner'])->name('partner.')->prefix('partner')->group(function (){
    //Organization
    Route::get('/', [OrganizationController::class, 'index'])->name('index');
    Route::post('/organize_create',[OrganizationController::class,'store'])->name('organization.store');
    Route::post('/create/kitchens',[KitchenController::class,'store'])->name('kitchen.store');
    Route::post('/select/kitchens',[KitchenController::class,'store_k_o'])->name('kitchen.select');
    Route::post('/create/kinds',[KindOrgController::class,'store'])->name('kind.store');
    Route::post('/select/kinds',[KindOrgController::class,'store_kind_org'])->name('kind.select');
    Route::post('/create/additionals',[AdditionalController::class,'store'])->name('additional.store');
    Route::post('/select/additionals',[AdditionalController::class,'store_additional_org'])->name('additional.select');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
