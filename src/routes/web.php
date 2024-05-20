<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DoneController;
use App\Http\Controllers\ThanksController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ReservationController;

Route::get('/', [ShopController::class, 'shopAll']); // すべてのユーザー向け

Route::get('/dashboard', [AuthController::class, 'index'])->middleware('auth'); // 認証が必要なユーザー向け

Route::get('/thanks', [ThanksController::class, 'index'])->name('thanks');

Route::get('/done', [DoneController::class, 'done']);

Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register.show');
Route::post('/register', [UserController::class, 'register'])->name('register');

Route::get('/detail/{shop_id}', [ShopController::class, 'show'])->name('shop');

// お気に入り機能のルート
Route::post('/favorite/add/{shop}', [FavoriteController::class, 'add'])->name('favorite.add');
Route::delete('/favorite/{shop}', [FavoriteController::class, 'remove'])->name('favorite.remove');

// 検索機能のルート
Route::get('/shopall/search', [ShopController::class, 'search'])->name('shop.search');

// ログアウト機能のルート
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::post('/reservation', [ReservationController::class, 'store'])->name('reservation.store');
