<?php

use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;


Route::get('/', [IndexController::class , 'index']);
Route::get('/login', [IndexController::class , 'login']);
Route::get('/register', [IndexController::class , 'register']);
Route::post('/post-login', [IndexController::class, 'postLogin']);

Route::get('/contact', [IndexController::class, 'contact']);

Route::get('/view-product', [IndexController::class, 'viewProduct']);
Route::get('/list-product', [IndexController::class, 'listProduct']);
Route::get('/shopping-cart', [IndexController::class, 'shoppingCart']);
Route::get('/checkout', [IndexController::class, 'checkout']);
Route::get('/news', [IndexController::class, 'new']);
Route::get('/new-detail', [IndexController::class, 'newDetail']);

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
