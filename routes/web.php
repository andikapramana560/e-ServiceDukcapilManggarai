<?php

use App\Http\Controllers\AuthController;
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

Route::get('/', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard')->middleware('guest');
Route::get('/datatable', [AuthController::class, 'datatable'])->name('datatable')->middleware('guest');
Route::get('/form', [AuthController::class, 'form'])->name('form')->middleware('guest');
