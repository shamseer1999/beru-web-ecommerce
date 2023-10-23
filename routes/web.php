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
Route::get('logout-customer',[HomeController::class,'logoutCustomer'])->name('logout_customer');

Route::get('/wishlist',[HomeController::class,'wishlist'])->name('wishlist');
Route::get('/remove_wishlist/{id}',[HomeController::class,'remove_wishlist'])->name('remove_wishlist');

Route::post('/add-to-cart',[HomeController::class,'addToCart'])->name('add_to_cart');
Route::get('/cart',[HomeController::class,'cart'])->name('cart');
Route::get('/remove-cart-item/{id}',[HomeController::class,'removeCartItem'])->name('remove-cart-item');
Route::post('/add-more-items',[HomeController::class,'addMoreItems'])->name('add_more_items');
