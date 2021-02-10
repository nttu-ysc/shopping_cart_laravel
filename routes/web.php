<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\http\Controllers\ProductController;
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

Route::get('/', [ProductController::class, 'index']);

Route::get('/products/admin', [ProductController::class, 'admin'])->middleware('auth');
Route::get('/products/show/{id}', [ProductController::class, 'showByAdmin'])->middleware('auth');
Route::get('/products/search', [ProductController::class, 'search']);
Route::get('/products/category/{category}', [ProductController::class, 'indexWithCategory']);
Route::post('/products/price', [ProductController::class, 'priceFilter']);
Route::resource('products', ProductController::class);

Route::get('/carts', [CartController::class, 'index']);
Route::get('/carts/add/{id}', [CartController::class, 'addItemToCart']);
Route::get('/carts/remove/{id}', [CartController::class, 'removeItem']);
Route::get('/carts/increase/{id}', [CartController::class, 'increaseByOne']);
Route::get('/carts/decrease/{id}', [CartController::class, 'decreaseByOne']);
Route::post('/carts/update/{id}', [CartController::class, 'updateQuantity']);
Route::post('/carts/add-quantity/{id}', [CartController::class, 'addQuantity']);

Route::resource('categories', CategoryController::class)->except('show')->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
