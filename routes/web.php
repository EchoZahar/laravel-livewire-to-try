<?php

use App\Http\Controllers\CartController;

use \App\Http\Livewire\Products\Products;
use \App\Http\Livewire\Cart\CartList;
use App\Http\Controllers\DialController;
use Illuminate\Support\Facades\Auth;
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
/**
 * livewire routes
 */
Route::get('/', Products::class)->name('index');
Route::get('/cart', CartList::class)->name('cart');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
/**
 * laravel routes
 */
//Route::get('cart', [CartController::class, 'cartList'])->name('cart');
//Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
//Route::post('cartUpdateQuantity', [CartController::class, 'updateQuantity'])->name('cart.updateQuantity');
//Route::post('cartRemoveItem', [CartController::class, 'removeItem'])->name('cart.removeItem');
//Route::post('clear', [CartController::class, 'clearCart'])->name('cart.clearCart');

Route::post('dial', [DialController::class, 'dial'])->name('dial');
Route::put('dial/{id}/refuse', [DialController::class, 'refuseDial'])->name('dial.refuse');
//Route::get('myfunc', [App\Http\Controllers\HomeController::class, 'myfunc'])->name('myfunc');
