<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DoneController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ThanksController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Menu1Controller;
use App\Http\Controllers\Menu2Controller;

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

Route::get('/', [ShopController::class, 'shopAll']); // すべてのユーザー向け

Route::get('/dashboard', [AuthController::class, 'index'])->middleware('auth'); // 認証が必要なユーザー向け

Route::get('/thanks', [ThanksController::class, 'index'])->name('thanks');

Route::get('/done', [DoneController::class, 'done']);

Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register.show');

Route::post('/register', [UserController::class, 'register'])->name('register');

Route::get('/shops/{id}', [ShopController::class, 'show'])->name('shops.show');
