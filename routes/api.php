<?php

use App\Http\Controllers\BillController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeePositionController;
use App\Http\Controllers\ProductBrandController;
use App\Http\Controllers\ProductClassificationController;
use App\Http\Controllers\ProductFeatureController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\StatusController;
use App\Models\ProductBrand;
use App\Models\ProductFeature;

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

//Rutas auth
//http://127.0.0.1:8000/api/josast/auth/login--register--logout
Route::group(['prefix' => 'josast'], function () {
    Route::group(['prefix' => 'auth'], function ($router) {
        Route::post('login', [AuthController::class, 'login']);
        Route::post('register', [AuthController::class, 'register']);
        Route::post('logout', [AuthController::class, 'logout']);
    });
});

//http://127.0.0.1:8000/api/josast/vehicle
Route::group(['prefix' => 'josast'], function () {
    Route::group(['prefix' => 'vehicle'], function () {
        Route::get('', [VehicleController::class, 'index']);
    });
});


//http://127.0.0.1:8000/api/josast/product
Route::group(['prefix' => 'josast'], function () {
    Route::group(['prefix' => 'product'], function () {
        Route::get('all', [ProductController::class, 'index'])->middleware(["auth:api", "scope:administrador"]);
        Route::get('enabled-products', [ProductController::class, 'filterProductByEnabled'])->middleware(["auth:api", "scope:vendedor"]);
        Route::get('/{id}', [ProductController::class, 'show'])->middleware(["auth:api", "scopes:administrador,vendedor"]);
        Route::post('', [ProductController::class, 'store'])->middleware(["auth:api", "scope:administrador"]);
        Route::patch('/{id}', [ProductController::class, 'update'])->middleware(["auth:api", "scope:administrador"]);
        //Route::post('/by-productfeatures', [ProductController::class, 'products_product_features']);
    });
});

//http://127.0.0.1:8000/api/josast/employee
Route::group(['prefix' => 'josast'], function () {
    Route::group(['prefix' => 'employee'], function () {
        Route::get('all', [EmployeeController::class, 'index'])->middleware(["auth:api", "scope:administrador"]);
        Route::get('vendedores', [EmployeeController::class, 'getVendedores'])->middleware(["auth:api", "scope:vendedor"]);
        Route::get('/{id}', [EmployeeController::class, 'show'])->middleware(["auth:api", "scope:administrador"]);
        Route::post('', [EmployeeController::class, 'store'])->middleware(["auth:api", "scope:administrador"]);
        Route::patch('/{id}', [EmployeeController::class, 'update'])->middleware(["auth:api", "scope:administrador"]);
    });
});


//http://127.0.0.1:8000/api/josast/order
Route::group(['prefix' => 'josast'], function () {
    Route::group(['prefix' => 'order'], function () {
        Route::get('all', [OrderController::class, 'index']);
        Route::get('/{id}', [OrderController::class, 'show']);
        Route::post('', [OrderController::class, 'store'])->middleware(["auth:api", "scope:vendedor"]);
        Route::patch('/complete-order/{id}', [OrderController::class, 'completeOrder'])->middleware(["auth:api", "scope:vendedor"]);
        Route::post('/change-status', [OrderController::class, 'changeStatus'])->middleware(["auth:api", "scope:vendedor"]);
    });
});


//http://127.0.0.1:8000/api/josast/bill
Route::group(['prefix' => 'josast'], function () {
    Route::group(['prefix' => 'bill'], function () {
        Route::get('', [BillController::class, 'index']);
        Route::post('', [BillController::class, 'store'])->middleware(["auth:api", "scope:vendedor"]);
        Route::get('/{id}', [BillController::class, 'show'])->middleware(["auth:api", "scope:vendedor"]);
    });
});


//http://127.0.0.1:8000/api/josast/rol
Route::group(['prefix' => 'josast'], function () {
    Route::group(['prefix' => 'rol'], function () {
        Route::get('', [RolController::class, 'index']);
    });
});


//http://127.0.0.1:8000/api/josast/productfeature
Route::group(['prefix' => 'josast'], function () {
    Route::group(['prefix' => 'productfeature'], function () {
        Route::get('', [ProductFeatureController::class, 'index']);
    });
});

//http://127.0.0.1:8000/api/josast/product-classification
Route::group(['prefix' => 'josast'], function () {
    Route::group(['prefix' => 'product-classification'], function () {
        Route::get('', [ProductClassificationController::class, 'index']);
    });
});

//http://127.0.0.1:8000/api/josast/product-brand
Route::group(['prefix' => 'josast'], function () {
    Route::group(['prefix' => 'product-brand'], function () {
        Route::get('', [ProductBrandController::class, 'index']);
    });
});

//http://127.0.0.1:8000/api/josast/employee-position
Route::group(['prefix' => 'josast'], function () {
    Route::group(['prefix' => 'employee-position'], function () {
        Route::get('', [EmployeePositionController::class, 'index']);
    });
});

//http://127.0.0.1:8000/api/josast/customer
Route::group(['prefix' => 'josast'], function () {
    Route::group(['prefix' => 'customer'], function () {
        Route::get('', [CustomerController::class, 'index']);
    });
});

//http://127.0.0.1:8000/api/josast/status
Route::group(['prefix' => 'josast'], function () {
    Route::group(['prefix' => 'status'], function () {
        Route::get('', [StatusController::class, 'index']);
    });
});
