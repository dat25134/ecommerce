<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/products', function () {
    return view('products');
})->name('products');

Route::get('/product-details', function () {
    return view('product-details');
})->name('product-details');    

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/order', function () {
    return view('order');
})->name('order');

Route::get('/cart', function () {
    return view('cart');
})->name('cart');

Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');

Route::get('/order-tracking', function () {
    return view('order-tracking');
})->name('order-tracking');