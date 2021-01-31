<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/products', ['App\Http\Controllers\ProductController', 'index'])->name('products');
Route::get('/products/create', ['App\Http\Controllers\ProductController', 'create']);
Route::get('/products/{product}', ['App\Http\Controllers\ProductController', 'show']);
Route::post('/products', ['App\Http\Controllers\ProductController', 'store'])->name('product_store');
