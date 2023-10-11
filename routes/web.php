<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\user\HomeController;

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

Route::get('/',[HomeController::class,'index'])->name('home');
Route::post('/add-to-wishlist',[HomeController::class,'addToWishList'])->name('add_to_wishlist');
Route::post('/customer-login',[HomeController::class,'customerLogin'])->name('customer_login');
