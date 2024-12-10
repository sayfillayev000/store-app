<?php

use App\Http\Controllers\MaterialController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductIsAvailableController;
use App\Http\Controllers\ProductMaterialController;
use App\Http\Controllers\WarehouseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('product_is_available', [ProductIsAvailableController::class, 'product_is_available']);

Route::apiResources([
    'product' => ProductController::class,
    'material' => MaterialController::class,
    'warehouse' => WarehouseController::class,
    'product_material' => ProductMaterialController::class,
]);
