<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CashierController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserMemberController;
use App\Http\Controllers\UserRoleController;
use App\Http\Controllers\VoucherController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::redirect('/', '/dashboard');
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'verify'])->name('verify');
Route::post('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::group(['prefix' => 'cashier', 'as' => 'cashier.', 'middleware' => 'auth'], function () {
    Route::get('', [CashierController::class, 'index'])->name('home');
});

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {
    Route::get('', [DashboardController::class, 'index'])->name('dashboard');

    Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
        Route::get('', [UserController::class, 'index'])->name('home');
        Route::get('create', [UserController::class, 'create'])->name('create');
        Route::post('create', [UserController::class, 'store'])->name('store');
        Route::get('destroy/{id}', [UserController::class, 'destroy'])->name('destroy');

        Route::group(['prefix' => 'role', 'as' => 'role.'], function () {
            Route::get('', [UserRoleController::class, 'index'])->name('home');
            Route::post('', [UserRoleController::class, 'store'])->name('store');
            Route::get('destroy/{id}', [UserRoleController::class, 'destroy'])->name('destroy');
        });
    });

    Route::group(['prefix' => 'customer', 'as' => 'customer.'], function () {
        Route::get('', [CustomerController::class, 'index'])->name('home');
        Route::get('create', [CustomerController::class, 'create'])->name('create');
        Route::post('create', [CustomerController::class, 'store'])->name('store');
        Route::get('destroy/{id}', [CustomerController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => 'category', 'as' => 'category.'], function () {
        Route::get('', [CategoryController::class, 'index'])->name('home');
        Route::post('', [CategoryController::class, 'store'])->name('store');
    });

    Route::group(['prefix' => 'product', 'as' => 'product.'], function () {
        Route::get('', [ProductController::class, 'index'])->name('home');
        Route::get('create', [ProductController::class, 'create'])->name('create');
        Route::post('create', [ProductController::class, 'store'])->name('store');
    });

    Route::group(['prefix' => 'supplier', 'as' => 'supplier.'], function () {
        Route::get('', [SupplierController::class, 'index'])->name('home');
        Route::get('create', [SupplierController::class, 'create'])->name('create');
        Route::post('create', [SupplierController::class, 'store'])->name('store');
        Route::get('destroy/{id}', [SupplierController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => 'voucher', 'as' => 'voucher.'], function () {
        Route::get('', [VoucherController::class, 'index'])->name('home');
        Route::get('create', [VoucherController::class, 'create'])->name('create');
        Route::post('create', [VoucherController::class, 'store'])->name('store');
        Route::get('destroy/{id}', [VoucherController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
        Route::get('', [ProfileController::class, 'index'])->name('home');
    });
});