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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// REGISTER
Route::get('/register/user', [App\Http\Controllers\RegisterController::class, 'register'])->name('register-user');
Route::post('/register/user/1', [App\Http\Controllers\RegisterController::class, 'store'])->name('register-store');

// PRODUCTS
Route::get('/products/index', [App\Http\Controllers\ProductController::class, 'products'])->name('product-index');
Route::get('/products/filter/category', [App\Http\Controllers\ProductController::class, 'filterCategory'])->name('product-filter-category');
Route::get('/products/search', [App\Http\Controllers\ProductController::class, 'searchProduct'])->name('product-search');
Route::get('/products/create', [App\Http\Controllers\ProductController::class, 'create'])->name('product-create');
Route::post('/product/store', [App\Http\Controllers\ProductController::class, 'store'])->name('product-store');
Route::post('/product/update/{id}', [App\Http\Controllers\ProductController::class, 'update'])->name('product-update');
Route::get('/product/edit/{id}', [App\Http\Controllers\ProductController::class, 'edit'])->name('product-edit');
Route::get('/product/delete/{id}', [App\Http\Controllers\ProductController::class, 'delete'])->name('product-delete');
Route::get('/product/image/delete/{id}', [App\Http\Controllers\ProductController::class, 'deleteImage'])->name('product-image-delete');

// // REMEMBER ME
Route::post('/user/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('user-login');