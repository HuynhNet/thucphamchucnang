<?php

use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;


Route::get('/', [IndexController::class , 'index'])->name('home');
Route::get('/login', [IndexController::class , 'login'])->name('login');
Route::get('/register', [IndexController::class , 'register']);
Route::post('/check-register', [IndexController::class, 'checkRegister']);
Route::post('/post-login', [IndexController::class, 'postLogin']);

Route::get('/contact', [IndexController::class, 'contact']);

Route::get('/view-product/{id}', [IndexController::class, 'viewProduct'])->name('viewProduct');
Route::get('/list-product', [IndexController::class, 'listProduct']);
Route::get('/shopping-cart', [IndexController::class, 'shoppingCart']);
Route::get('/checkout', [IndexController::class, 'checkout']);
Route::get('/news', [IndexController::class, 'new']);
Route::get('/new-detail', [IndexController::class, 'newDetail']);

Route::get('add-cart/{id}', [IndexController::class, 'addCart'])->name('addCart');
Route::get('add-cart-with-quantity', [IndexController::class, 'addCartWithQuantity'])->name('addCartWithQuantity');
Route::get('update-cart', [IndexController::class, 'getUpdateCart'])->name('getUpdateCart');

Route::get('delete-cart/{id}', [IndexController::class, 'getDeleteCart'])->name('getDeleteCart');

Route::post('conform-checkout', [IndexController::class, 'getCheckout'])->name('getCheckout');

Route::get('like/{productId}/{userId}', [IndexController::class, 'likeProduct'])->name('likeProduct');

Route::post('comment/{productId}/{userId}', [IndexController::class, 'comment'])->name('comment');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
