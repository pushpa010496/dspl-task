<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {

        Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
        Route::get('/products',[ProductController::class,'index'])->name('products.index');
        Route::post('/products-sucess',[ProductController::class,'store'])->name('products.post');

        Route::post('/products-post',[ProductController::class,'storeProduct'])->name('products.create');
        Route::post('/products-edit',[ProductController::class,'editProduct'])->name('products.edit');
        Route::post('/products-update',[ProductController::class,'update'])->name('products.update');
        Route::post('/products-delete',[ProductController::class,'destroy'])->name('products.delete');
});

Route::get('/login',[LoginController::class,'Login'])->name('login');
Route::post('/login-post',[LoginController::class,'postLogin'])->name('login.post');
Route::get('/logout',[LoginController::class,'Logout'])->name('logout');

