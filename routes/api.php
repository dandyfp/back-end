<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ItemFuelController;
use App\Http\Controllers\OrderFuelController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransactionOrderController;
use App\Http\Controllers\VehicleController;
use App\Models\TransactionOrder;
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
    Route::get('item-fuels',[ItemFuelController::class,'index']);
    Route::delete('item-fuels-delete/{fuelId}',[ItemFuelController::class,'deleteFuel']);
    Route::put('update-fuels/{fuelId}',[ItemFuelController::class,'updateFuel']);
    Route::get('detail-fuel/{fuelId}',[ItemFuelController::class,'getDetailFuel']);


    Route::post('create-fuel',[ItemFuelController::class, 'createFuel']);
    Route::get('user',[AuthController::class, 'getUser']);


    Route::post('create-order',[OrderFuelController::class, 'createOrder']);
    Route::get('detail-order',[OrderFuelController::class, 'myOrder']);
    Route::get('my-order',[OrderFuelController::class,'indexMyOrder']);
    Route::get('my-order-received',[OrderFuelController::class,'indexAllOrderReceived']);
    Route::get('my-order-on-processed',[OrderFuelController::class,'indexAllOrderOnProcess']);
    Route::put('update-status-order',[OrderFuelController::class,'updateToOnDelivery']);
    Route::get('all-order',[OrderFuelController::class,'indexAllOrder']);
    Route::put('update-order/{orderId}',[OrderFuelController::class,'updateOrder']);




    Route::post('create-transaction',[TransactionController::class, 'createTransaction']);
    Route::get('my-transaction',[TransactionController::class,'indexTransactions']);
    Route::get('all-transaction',[TransactionController::class,'indexAllTransaction']);
    Route::get('all-transaction-fuel/{idFuel}',[TransactionController::class,'indexTransactionFuel']);



    Route::get('my-transaction-order/{idOrder}',[TransactionOrderController::class,'indexTransactionsOrder']);


    Route::post('create-vehicle',[VehicleController::class,'createVehicle']);
    Route::get('my-vehicle',[VehicleController::class,'getMyVehicle']);


});
