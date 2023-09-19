<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admin\HomeController;

use App\Http\Controllers\admin\CategoryController;

use App\Http\Controllers\admin\ProductController;

Route::prefix('admin')->name('admin.')->group(function(){

    Route::get('',[HomeController::class,'login'])->name('login');
    Route::post('do-login',[HomeController::class,'doLogin'])->name('do.login');

    Route::middleware('auth:admin')->group(function(){
        Route::get('dashbord',[HomeController::class,'index'])->name('dashboard');

        Route::prefix('categories')->name('category.')->group(function(){
            Route::get('list',[CategoryController::class,'index'])->name('list');
            Route::get('add',[CategoryController::class,'add'])->name('add');
            Route::post('save_product',[CategoryController::class,'save'])->name('save');
            Route::match(['GET','POST'],'edit/{id}',[CategoryController::class,'edit'])->name('edit');
            Route::get('delete/{id}',[CategoryController::class,'delete'])->name('delete');
        });

        Route::prefix('products')->name('product.')->group(function(){
            Route::get('list',[ProductController::class,'index'])->name('list');
            Route::get('add',[ProductController::class,'add'])->name('add');
            Route::post('save_product',[ProductController::class,'save'])->name('save');
            Route::match(['GET','POST'],'edit/{id}',[ProductController::class,'edit'])->name('edit');
            Route::get('delete/{id}',[ProductController::class,'delete'])->name('delete');
        });

        Route::get('logout',[HomeController::class,'logout'])->name('logout');
    });
    
});
