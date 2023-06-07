<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('User/index');
});
Route::get('/cart', function () {
    return view('User/cart');
});
Route::get('/all-product', function () {
    return view('User/all-product');
});
Route::get('/detail-product', function () {
    return view('User/detail-product');
});
Route::get('/account-user', function () {
    return view('User/acount-user');
});
Route::get('/login', function () {
    return view('User/Login');
});
Route::get('/registrasi', function () {
    return view('User/registrasi');
});
Route::get('/dashboard', function () {
    return view('admin/beranda');
});
Route::get('/Transaksi', function () {
    return view('admin/transaksi');
});
Route::get('/Product', function () {
    return view('admin/product');
});
