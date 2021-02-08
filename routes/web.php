<?php

use App\Http\Controllers\CartController;
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
Route::resource('products', ProductController::class);

Route::get('/carts', [CartController::class, 'index']);
Route::get('/carts/add/{id}', [CartController::class, 'addItemToCart']);
Route::get('/carts/remove/{id}', [CartController::class, 'removeItem']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
