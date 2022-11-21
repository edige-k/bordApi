<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\Admin\IndexController;
use App\Http\Controllers\Api\Admin\PartnerController;
use App\Http\Controllers\Api\Admin\PermissionController;
use App\Http\Controllers\Api\Admin\RoleController;



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
Route::group(['prefix'=>'auth'],function() {
    Route::controller(AuthController::class)->group(function () {
        Route::post('/login', 'login');
        Route::post('/register', 'register');
        Route::post('/logout', 'logout');
        Route::post('/me', 'me')->middleware('auth:sanctum');
    });
});
Route::middleware(['auth:sanctum', 'role:admin'])->name('admin.')->prefix('admin')->group(function (){
    //ADMIN INDEX
    Route::get('/', [IndexController::class, 'index'])->name('index');

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
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
