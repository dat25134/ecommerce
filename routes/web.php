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

Route::get('/user-profile', function () {
    return view('user-profile');
})->name('user-profile');

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::get('/admin/products', function () {
    return view('admin.products');
})->name('admin.products');

Route::get('/admin/orders', function () {
    return view('admin.orders');
})->name('admin.orders');

Route::get('/admin/customers', function () {
    return view('admin.customers');
})->name('admin.customers');

Route::get('/admin/reports', function () {
    return view('admin.reports');
})->name('admin.reports');

Route::get('/admin/settings', function () {
    return view('admin.settings');
})->name('admin.settings');

Route::get('/admin/logout', function () {
    return view('admin.logout');
})->name('logout');   