<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
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

Route::get('/',  [ProductController::class, 'index'])->name('index');
Route::get('category',  [CategoryController::class, 'index'])->name('category.index');

// Route::get('/',  'ProductController@index');
// Route::get('category',  'CategoryController@index');

Route::resource('products', ProductController::class);
// Route::resource('category', CategoryController::class);