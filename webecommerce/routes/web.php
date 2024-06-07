<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\AuthController;



Route::get('/', function () {
    return view('welcome');
});
Route::resource('kategori', KategoriController::class);
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::resource('produk', ProdukController::class);
Route::resource('user', UserController::class);
Route::resource('pesanan', PesananController::class);


// Route untuk Order
Route::get('/order', [OrderController::class, 'index'])->name('order.index');
Route::get('/order/{id}', [OrderController::class, 'show'])->name('order.show');

// Route untuk OrderDetail
Route::get('/order/{orderId}/detail', [OrderDetailController::class, 'index'])->name('orderDetail.index');


// Home route
Route::get('/', function () {
    return view('home');
})->name('home');





Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
// Route::get('/home', function () {
//     return view('home');
// })->name('home')->middleware('auth');

// Logout route
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


