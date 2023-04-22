<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Api;
use App\Http\Middleware\Role;
use App\Http\Middleware\RoleApi;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::group(['middleware' => 'Api','prefix'=>'auth'],
//     function($router){

    Route::get('alluser',[UserController::class,'alluser'])->middleware('Api','Role');
    Route::post('adduser',[UserController::class,'addid'])->middleware('Api','RoleApi');
    Route::get('user/{id}',[UserController::class,'showbyid'])->middleware('Api','RoleApi');
    Route::put('userupdate/{id}',[UserController::class,'updatebyid'])->middleware('Api','RoleApi');
    Route::delete('deleteuser/{id}',[UserController::class,'delete'])->middleware('Api','RoleApi');
    Route::get('list',[UserController::class,'listuser'])->middleware('Api','RoleApi');
    Route::get('listproject',[UserController::class,'listproject'])->middleware('Api','RoleApi');
    Route::post('login',[UserController::class,'loginUser']);

// });
