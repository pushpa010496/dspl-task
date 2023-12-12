<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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
Route::get('/products',[ProductController::class,'index'])->name('products.index');
Route::post('/products-sucess',[ProductController::class,'store'])->name('products.post');

Route::post('/products-post',[ProductController::class,'storeProduct'])->name('products.create');
Route::post('/products-edit',[ProductController::class,'editProduct'])->name('products.edit');
Route::post('/products-update',[ProductController::class,'update'])->name('products.update');
Route::post('/products-delete',[ProductController::class,'destroy'])->name('products.delete');
