<?php


use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')
    ->name('admin.')
    ->middleware([
        'auth',
        'admin'
    ])
    ->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('dashboard');

        Route::resource('products', AdminProductController::class);

        Route::resource('categories', AdminCategoryController::class);
        Route::post('/product/category',[AdminProductController::class,'addCategory'])->name('product-add-categories');
        Route::delete('/product/category',[AdminProductController::class,'removeCategory'])->name('product-remove-categories');
        Route::delete('/product/image',[AdminProductController::class,'removeImage'])->name('product-remove-images');




    });
