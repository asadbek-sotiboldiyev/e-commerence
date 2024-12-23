<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ShopController;

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

Route::get('/', [PagesController::class, 'home'])->name('home');

Route::prefix('/auth')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginStore'])->name('loginStore');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerStore'])->name('registerStore');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::prefix('/profile')->middleware('auth')->group(function () {
    Route::get('/', [UserController::class, 'showProfile'])->name('profile');
});

Route::prefix('/seller')->middleware('auth')->group(function () {
    Route::get('/', [SellerController::class, 'main'])->name('seller');
    Route::get('/about', [SellerController::class, 'about'])->name('sellerAbout');
    Route::get('/register', [SellerController::class, 'register'])->name('sellerRegister');
    Route::post('/register', [SellerController::class, 'registerStore'])->name('sellerRegisterStore');
});
Route::prefix('/shops')->group(function () {
    Route::get('/', [ShopController::class, 'index'])->name('shopIndex');
    Route::get('/mine', [ShopController::class, 'mine'])->name('shopMine');
    Route::get('/create', [ShopController::class, 'create'])->name('shopCreate');
    Route::post('/create', [ShopController::class, 'store'])->name('shopStore');
    Route::get('/{id}', [ShopController::class, 'show'])->name('shopShow');
});