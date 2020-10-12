<?php

use App\Http\Controllers\BillController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\ProductController;
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


//http://127.0.0.1:8000/api/josast/product
Route::group(['prefix' => 'josast'], function () {
    Route::group(['prefix' => 'product'], function () {
        Route::get('', [ProductController::class, 'index']);
    });
});

//http://127.0.0.1:8000/api/josast/employee
Route::group(['prefix' => 'josast'], function () {
    Route::group(['prefix' => 'employee'], function () {
        Route::get('', [EmployeeController::class, 'index']);
    });
});


//http://127.0.0.1:8000/api/josast/order
Route::group(['prefix' => 'josast'], function () {
    Route::group(['prefix' => 'order'], function () {
        Route::get('', [OrderController::class, 'index']);
    });
});


//http://127.0.0.1:8000/api/josast/bill
Route::group(['prefix' => 'josast'], function () {
    Route::group(['prefix' => 'bill'], function () {
        Route::get('', [BillController::class, 'index']);
    });
});
