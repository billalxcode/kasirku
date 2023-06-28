<?php

use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\VoucherController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1', 'as' => 'v1.'], function () {
    Route::group(['prefix' => 'product', 'as' => 'product.'], function () {
        Route::post('all', [ProductController::class, 'all'])->name('all');
        Route::post('search', [ProductController::class, 'search'])->name('search');
    });
    
    Route::group(['prefix' => 'voucher', 'as' => 'voucher.'], function () {
        Route::post('all', [VoucherController::class, 'all'])->name('all');
        Route::post('search', [VoucherController::class, 'search'])->name('search');
    });
});