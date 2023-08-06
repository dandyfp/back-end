<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ItemFuelController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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



Route::middleware('auth:sanctum')->get('/', function (Request $request) {
    return $request->user();
});
Route::post('login',[AuthController::class, 'login']);
Route::post('register',[AuthController::class, 'register']);

Route::middleware('auth:sanctum')->group(function(){
    Route::get('itemFuels',[ItemFuelController::class,'index']);
    Route::get('user',[AuthController::class, 'getUser']);

});