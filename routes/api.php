<?php

use App\Http\Controllers\VehicleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
//http://127.0.0.1:8000/api/josast/vehicle
Route::group(['prefix' => 'josast'], function () {
    Route::group(['prefix' => 'vehicle'], function () {
        Route::get('', [VehicleController::class, 'index']);
    });
});
