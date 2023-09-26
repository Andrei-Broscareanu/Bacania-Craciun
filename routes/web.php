<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

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



Route::get('/',[IndexController::class,'index'])->name('homepage');
Route::get('/coming-soon',[IndexController::class,'tempIndex']);
Route::get('/shop', [ProductController::class, 'shop'])->name('shop');
Route::get('/about-us', [IndexController::class, 'aboutUs'])->name('about-us');
Route::get('/contact', [IndexController::class, 'contact'])->name('contact');
Route::get('/product-{product}',[ProductController::class, 'show'])->name('view-product');
Route::get('/cart',[CartController::class,'index'])->name('cart');
Route::get('/checkout',[CheckoutController::class,'index'])->middleware('checkoutAccess')->name('checkout');
Route::post('/checkout',[CheckoutController::class,'checkout'])->name('create-order');

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::post('/review',[ReviewController::class,'create'])->name('review.create');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
