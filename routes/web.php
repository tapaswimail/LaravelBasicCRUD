<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
})->name('root');;

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');;

Route::get('/u_r_registered', function () {
    return view('u_r_registered');
});


Route::controller(ProductController::class)->group(function(){
    Route::get('/products','index')->name('products.index');
    Route::get('/products/create','create')->name('products.create');
    Route::post('/products','store')->name('products.store');
    Route::get('/products/{product}/edit','edit')->name('products.edit');
    Route::put('/products/{product}','update')->name('products.update');
    Route::delete('/products/{product}','destroy')->name('products.destroy');
    Route::post('/registeruser', 'registeruser')->name('registeruser');
    Route::post('/loginuser', 'loginuser')->name('loginuser');
});