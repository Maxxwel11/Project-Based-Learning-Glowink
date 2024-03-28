<?php

use App\Http\Controllers\addbarangController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\detailprodukController;
use App\Http\Controllers\kategoriController;
use App\Http\Controllers\logincontroller;
use App\Http\Controllers\registercontroller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function(){
    return view('dashboard');
});

Route::get('/login', function(){
    return view('login');
});
Route::get('/kategori', function(){
    return view('kategori');
});
Route::get('/view/add_barang.blade', function(){
    return view('add_barang');
});

Route::get('/login', [logincontroller::class, 'login']);
Route::get('/register', [registercontroller::class, 'login']);
Route::get('/cart', [CartController::class, 'cart']);
Route::get('/cheackout', [CheckoutController::class, 'checkout']);
Route::get('/kategori', [kategoriController::class, 'kategori' ]);
Route::get('/add_barang', [addbarangController::class, 'add_barang']);
Route::get('/detailproduk', [detailprodukController::class , 'deataiproduk']);
