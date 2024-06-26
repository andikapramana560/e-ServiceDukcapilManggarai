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
        // pengajuan ktp
        Route::get('/pengajuanKtp', [AdminController::class, 'pengajuanKtp'])->name('admin-pengajuanKtp');
        Route::get('/addPengajuanKtp', [AdminController::class, 'addPengajuanKtp'])->name('admin-addPengajuanKtp');
        Route::post('/addPengajuanKtp', [AdminController::class, 'storePengajuanKtp'])->name('admin-storePengajuanKtp');
        Route::get('/showPengajuanKtp/{id}', [AdminController::class, 'showPengajuanKtp'])->name('admin-showPengajuanKtp');
        Route::get('/editPengajuanKtp/{id}', [AdminController::class, 'editPengajuanKtp'])->name('admin-editPengajuanKtp');
        Route::post('/editPengajuanKtp/{id}', [AdminController::class, 'updatePengajuanKtp'])->name('admin-updatePengajuanKtp');
        Route::post('/showPengajuanKtp/{id}', [AdminController::class, 'processPengajuanKtp'])->name('admin-processPengajuanKtp');
        Route::delete('/destroyPengajuanKtp/{id}', [AdminController::class, 'destroyPengajuanKtp'])->name('admin-destroyPengajuanKtp');
        // pengajuan kk
        Route::get('/pengajuanKk', [AdminController::class, 'pengajuanKk'])->name('admin-pengajuanKk');
        Route::get('/showPengajuanKk/{id}', [AdminController::class, 'showPengajuanKk'])->name('admin-showPengajuanKk');
        Route::get('/showAnggotaKeluarga/{id}/{id_kk}', [AdminController::class, 'showAnggotaKeluarga'])->name('admin-showAnggotaKeluarga');
        Route::post('/showPengajuanKk/{id}', [AdminController::class, 'processPengajuanKk'])->name('admin-processPengajuanKk');
        // pengajuan akta kelahiran
        Route::get('/pengajuanAktaKelahiran', [AdminController::class, 'pengajuanAktaKelahiran'])->name('admin-pengajuanAktaKelahiran');
        Route::get('/addPengajuanAktaKelahiran', [AdminController::class, 'addPengajuanAktaKelahiran'])->name('admin-addPengajuanAktaKelahiran');
        Route::post('/addPengajuanAktaKelahiran', [AdminController::class, 'storePengajuanAktaKelahiran'])->name('admin-storePengajuanAktaKelahiran');
        Route::get('/showPengajuanAktaKelahiran/{id}', [AdminController::class, 'showPengajuanAktaKelahiran'])->name('admin-showPengajuanAktaKelahiran');
        Route::post('/showPengajuanAktaKelahiran/{id}', [AdminController::class, 'processPengajuanAktaKelahiran'])->name('admin-processPengajuanAktaKelahiran');
        Route::get('/editPengajuanAktaKelahiran/{id}', [AdminController::class, 'editPengajuanAktaKelahiran'])->name('admin-editPengajuanAktaKelahiran');
        Route::post('/editPengajuanAktaKelahiran/{id}', [AdminController::class, 'updatePengajuanAktaKelahiran'])->name('admin-updatePengajuanAktaKelahiran');
        Route::delete('/destroyPengajuanAktaKelahiran/{id}', [AdminController::class, 'destroyPengajuanAktaKelahiran'])->name('admin-destroyPengajuanAktaKelahiran');
        // pengajuan akta kematian
        Route::get('/pengajuanAktaKematian', [AdminController::class, 'pengajuanAktaKematian'])->name('admin-pengajuanAktaKematian');
        Route::get('/addPengajuanAktaKematian', [AdminController::class, 'addPengajuanAktaKematian'])->name('admin-addPengajuanAktaKematian');
        Route::post('/addPengajuanAktaKematian', [AdminController::class, 'storePengajuanAktaKematian'])->name('admin-storePengajuanAktaKematian');
        Route::get('/showPengajuanAktaKematian/{id}', [AdminController::class, 'showPengajuanAktaKematian'])->name('admin-showPengajuanAktaKematian');
        Route::get('/editPengajuanAktaKematian/{id}', [AdminController::class, 'editPengajuanAktaKematian'])->name('admin-editPengajuanAktaKematian');
        Route::post('/editPengajuanAktaKematian/{id}', [AdminController::class, 'updatePengajuanAktaKematian'])->name('admin-updatePengajuanAktaKematian');
        Route::post('/showPengajuanAktaKematian/{id}', [AdminController::class, 'processPengajuanAktaKematian'])->name('admin-processPengajuanAktaKematian');
        Route::delete('/destroyPengajuanAktaKematian/{id}', [AdminController::class, 'destroyPengajuanAktaKematian'])->name('admin-destroyPengajuanAktaKematian');
    });
// masyarakat
Route::prefix('penduduk')
    ->middleware('auth')
    ->group(function () {
        Route::get('/dashboard', [PendudukController::class, 'index'])->name('pend-dashboard');
        // pengajuan ktp
        Route::get('/pengajuanKtp', [PendudukController::class, 'pengajuanKtp'])->name('pend-pengajuanKtp');
        Route::get('/addPengajuanKtp', [PendudukController::class, 'addPengajuanKtp'])->name('pend-addPengajuanKtp');
        Route::post('/addPengajuanKtp', [PendudukController::class, 'storePengajuanKtp'])->name('pend-storePengajuanKtp');
        Route::get('/showPengajuanKtp/{id}', [PendudukController::class, 'showPengajuanKtp'])->name('pend-showPengajuanKtp');
        Route::get('/editPengajuanKtp/{id}', [PendudukController::class, 'editPengajuanKtp'])->name('pend-editPengajuanKtp');
        Route::post('/editPengajuanKtp/{id}', [PendudukController::class, 'updatePengajuanKtp'])->name('pend-updatePengajuanKtp');
        Route::delete('/destroyPengajuanKtp/{id}', [PendudukController::class, 'destroyPengajuanKtp'])->name('pend-destroyPengajuanKtp');
        // pengajuan kk
        Route::get('/pengajuanKk', [PendudukController::class, 'pengajuanKk'])->name('pend-pengajuanKk');
        Route::get('/addPengajuanKk', [PendudukController::class, 'addPengajuanKk'])->name('pend-addPengajuanKk');
        Route::post('/addPengajuanKk', [PendudukController::class, 'storePengajuanKk'])->name('pend-storePengajuanKk');
        Route::get('/showPengajuanKk/{id}', [PendudukController::class, 'showPengajuanKk'])->name('pend-showPengajuanKk');
        Route::delete('/destroyPengajuanKk/{id}', [PendudukController::class, 'destroyPengajuanKk'])->name('pend-destroyPengajuanKk');
        // pengajuan akta kelahiran
        Route::get('/pengajuanAktaKelahiran', [PendudukController::class, 'pengajuanAktaKelahiran'])->name('pend-pengajuanAkl');
        Route::get('/addPengajuanAktaKelahiran', [PendudukController::class, 'addPengajuanAktaKelahiran'])->name('pend-addPengajuanAkl');
        Route::post('/addPengajuanAktaKelahiran', [PendudukController::class, 'storePengajuanAktaKelahiran'])->name('pend-storePengajuanAkl');
        Route::get('/showPengajuanAktaKelahiran/{id}', [PendudukController::class, 'showPengajuanAktaKelahiran'])->name('pend-showPengajuanAkl');
        Route::get('/editPengajuanAktaKelahiran/{id}', [PendudukController::class, 'editPengajuanAktaKelahiran'])->name('pend-editPengajuanAkl');
        Route::post('/editPengajuanAktaKelahiran/{id}', [PendudukController::class, 'updatePengajuanAktaKelahiran'])->name('pend-updatePengajuanAkl');
        Route::delete('/destroyPengajuanAktaKelahiran/{id}', [PendudukController::class, 'destroyPengajuanAktaKelahiran'])->name('pend-destroyPengajuanAkl');
        // pengajuan akta kematian
        Route::get('/pengajuanAktaKematian', [PendudukController::class, 'pengajuanAktaKematian'])->name('pend-pengajuanAkm');
        Route::get('/addPengajuanAktaKematian', [PendudukController::class, 'addPengajuanAktaKematian'])->name('pend-addPengajuanAkm');
        Route::post('/addPengajuanAktaKematian', [PendudukController::class, 'storePengajuanAktaKematian'])->name('pend-storePengajuanAkm');
        Route::get('/showPengajuanAktaKematian/{id}', [PendudukController::class, 'showPengajuanAktaKematian'])->name('pend-showPengajuanAkm');
        Route::get('/editPengajuanAktaKematian/{id}', [PendudukController::class, 'editPengajuanAktaKematian'])->name('pend-editPengajuanAkm');
        Route::post('/editPengajuanAktaKematian/{id}', [PendudukController::class, 'updatePengajuanAktaKematian'])->name('pend-updatePengajuanAkm');
        Route::delete('/destroyPengajuanAktaKematian/{id}', [PendudukController::class, 'destroyPengajuanAktaKematian'])->name('pend-destroyPengajuanAkm');
    });
