<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MasyarakatController;
use Illuminate\Support\Facades\Route;

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

// auth
Route::get('/', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/', [AuthController::class, 'authenticate'])->name('authenticate');
Route::get('/registerAdm', [AuthController::class, 'registerAdm'])->name('registerAdm')->middleware('guest');
Route::post('/registerAdm', [AuthController::class, 'storeRegisterAdm'])->name('doRegisterAdm');
Route::get('/registerMsy', [AuthController::class, 'registerMsy'])->name('registerMsy')->middleware('guest');
Route::post('/registerMsy', [AuthController::class, 'storeRegisterMsy'])->name('doRegisterMsy');
Route::post('/logout', [AuthController::class, 'logout']);

// admin
Route::prefix('admin')
    ->middleware('auth')
    ->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('admin-dashboard');
});
// masyarakat
Route::prefix('masyarakat')
    ->middleware('auth')
    ->group(function () {
        Route::get('/dashboard', [MasyarakatController::class, 'index'])->name('msy-dashboard');
});
