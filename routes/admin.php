<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admin\HomeController;

use App\Http\Controllers\admin\ProductController;

Route::prefix('admin')->name('admin.')->group(function(){

    Route::get('login',[HomeController::class,'login'])->name('login');
    Route::post('do-login',[HomeController::class,'doLogin'])->name('do.login');

    Route::get('dashbord',[HomeController::class,'index'])->name('dashboard');

    Route::prefix('products')->name('product.')->group(function(){
        Route::get('list',[ProductController::class,'index'])->name('list');
        Route::get('add',[ProductController::class,'add'])->name('add');
    });
});
