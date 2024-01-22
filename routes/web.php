<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoriController;
use App\Http\Controllers\WorkshopController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', [PublicController::class, 'index']);



Route::middleware('guest')->group(function() {

    Route::get('login', [AuthController::class, 'login'])->name('login')->middleware('guest');
    Route::post('/login', [AuthController::class, 'authenticating']);


    Route::get('registrasi', [AuthController::class, 'registrasi'])->middleware('guest');
    Route::post('registrasi', [AuthController::class, 'store'])->middleware('guest');

});




Route::middleware('auth')->group(function () {

    Route::get('/logout', [AuthController::class, 'logout']);


    Route::get('about', [PublicController::class, 'about']);


    Route::get('categories', [PublicController::class, 'categories']);
    Route::get('/categori/{id}', [PublicController::class, 'categoriesDetail']);


    Route::get('/products', [PublicController::class, 'products']);
    Route::get('product/{id}', [PublicController::class, 'productDetail']);


    Route::get('/dashboard/{id}', [DashboardController::class, 'dashboard'])->middleware(['must-admin-toko']);
    Route::get('/profile/{id}', [DashboardController::class, 'profile'])->middleware('must-user');
    Route::get('/dashboard/users/{id}', [DashboardController::class, 'users'])->middleware('must-admin');
    Route::delete('/dashboard/user/{id}', [DashboardController::class, 'userDestroy'])->middleware('must-admin');


    Route::get('/dashboard/products/{id}', [ProductController::class, 'index']);
    Route::get('dashboard/product/detail/{id}', [ProductController::class, 'detail']);
    Route::get('dashboard/product/add', [ProductController::class, 'create']);
    Route::post('dashboard/product/add', [ProductController::class, 'store']);
    Route::get('/dashboard/product/edit/{id}', [ProductController::class, 'edit']);
    Route::put('/dashboard/product/edit/{id}', [ProductController::class, 'update']);
    Route::delete('/dashboard/product/delete/{id}', [ProductController::class, 'destroy']);


    Route::get('dashboard/categories/{id}', [CategoriController::class, 'index'])->middleware('must-admin');
    Route::get('dashboard/categori/detail/{id}', [CategoriController::class, 'detail'])->middleware('must-admin');
    Route::get('/dashboard/categori/add', [CategoriController::class, 'create'])->middleware('must-admin');
    Route::post('/dashboard/categori/add', [CategoriController::class, 'store'])->middleware('must-admin');
    Route::get('/dashboard/categori/edit/{id}', [CategoriController::class, 'edit'])->middleware('must-admin');
    Route::put('/dashboard/categori/edit/{id}', [CategoriController::class, 'update'])->middleware('must-admin');
    Route::delete('/dashboard/categori/delete/{id}', [CategoriController::class, 'destroy'])->middleware('must-admin');


    Route::get('/dashboard/workshops/{id}', [WorkshopController::class, 'index']);
    Route::get('dashboard/workshop/detail/{id}', [WorkshopController::class, 'detail']);
    Route::get('/dashboard/workshop/add', [WorkshopController::class, 'create'])->middleware('must-admin');
    Route::post('/dashboard/workshop/add', [WorkshopController::class, 'store'])->middleware('must-admin');;
    Route::get('/dashboard/workshop/daftar/{id}', [WorkshopController::class, 'daftar']);
    Route::get('/dashboard/workshop-belajar/{id}', [WorkshopController::class, 'belajar']);
    Route::get('/dashboard/workshop/belajar/{id}', [WorkshopController::class, 'detailBelajar']);
    Route::delete('/dashboard/workshop/delete/{id}', [WorkshopController::class, 'destroy'])->middleware('must-admin');

});
