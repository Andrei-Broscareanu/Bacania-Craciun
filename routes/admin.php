<?php


use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')
    ->name('admin.')
    ->middleware([
        'auth',
        'admin'
    ])
    ->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('dashboard');

//        Route::resource('products', ProductController::class);
//
//        Route::resource('users', UserController::class);


    });
