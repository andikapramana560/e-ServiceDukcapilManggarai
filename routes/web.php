<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PendudukController;
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
        // penduduk
        Route::get('/penduduk', [AdminController::class, 'penduduk'])->name('admin-penduduk');
        Route::get('/addPenduduk', [AdminController::class, 'addPenduduk'])->name('admin-addPenduduk');
        Route::post('/addPenduduk', [AdminController::class, 'storePenduduk'])->name('admin-storePenduduk');
        Route::get('/showPenduduk/{id}', [AdminController::class, 'showPenduduk'])->name('admin-showPenduduk');
        Route::post('/showPenduduk/{id}', [AdminController::class, 'activatePenduduk'])->name('admin-activatePenduduk');
        Route::get('/editPenduduk/{id}', [AdminController::class, 'editPenduduk'])->name('admin-editPenduduk');
        Route::post('/editPenduduk/{id}', [AdminController::class, 'updatePenduduk'])->name('admin-updatePenduduk');
        Route::delete('/destroyPenduduk/{id}', [AdminController::class, 'destroyPenduduk'])->name('admin-destroyPenduduk');
        // pengajuan
});
// masyarakat
Route::prefix('penduduk')
    ->middleware('auth')
    ->group(function () {
        Route::get('/dashboard', [PendudukController::class, 'index'])->name('pend-dashboard');
        // profil
        
        // pengajuan ktp
        Route::get('/pengajuanKtp', [PendudukController::class, 'pengajuanKtp'])->name('pend-pengajuanKtp');
        Route::get('/addPengajuanKtp', [PendudukController::class, 'addPengajuanKtp'])->name('pend-addPengajuanKtp');
        // pengajuan kk
        Route::get('/pengajuanKk', [PendudukController::class, 'pengajuanKk'])->name('pend-pengajuanKk');
        Route::get('/addPengajuanKk', [PendudukController::class, 'addPengajuanKk'])->name('pend-addPengajuanKk');
        // pengajuan akta kelahiran
        Route::get('/pengajuanAktaKelahiran', [PendudukController::class, 'pengajuanAktaKelahiran'])->name('pend-pengajuanAkl');
        Route::get('/addPengajuanAktaKelahiran', [PendudukController::class, 'addPengajuanAktaKelahiran'])->name('pend-addPengajuanAkl');
        // pengajuan akta kematian
        Route::get('/pengajuanAktaKematian', [PendudukController::class, 'pengajuanAktaKematian'])->name('pend-pengajuanAkm');
        Route::get('/addPengajuanAktaKematian', [PendudukController::class, 'addPengajuanAktaKematian'])->name('pend-addPengajuanAkm');
});
