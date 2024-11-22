<?php

use App\Http\Controllers\Api\NilaiController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::apiResource('products', ProductController::class);
Route::apiResource('nilai', NilaiController::class);


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
