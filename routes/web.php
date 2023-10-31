<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\KlasifikasiController;
use App\Http\Controllers\LaporanKeluarController;
use App\Http\Controllers\LaporanMasukController;
use App\Http\Controllers\PdfViewController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\UserController;
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


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/data-pengguna', [UserController::class, 'index'])->name('data-user');
Route::get('/data-pengguna/tambah', [UserController::class, 'create'])->name('data-user.create');
Route::get('/data-pengguna/edit/{id}', [UserController::class, 'edit'])->name('data-user.edit');
Route::get('/klasifikasi-surat', [KlasifikasiController::class, 'index'])->name('klasifikasi');
Route::get('/surat-masuk', [SuratMasukController::class, 'index'])->name('surat-masuk');
Route::get('/surat-masuk/tambah', [SuratMasukController::class, 'create'])->name('surat-masuk.create');
Route::get('/surat-masuk/edit/{id}', [SuratMasukController::class, 'edit'])->name('surat-masuk.edit');
Route::get('/surat-masuk/detail/{id}', [SuratMasukController::class, 'show'])->name('surat-masuk.detail');
Route::get('/surat-keluar', [SuratKeluarController::class, 'index'])->name('surat-keluar');
Route::get('/surat-keluar/tambah', [SuratKeluarController::class, 'create'])->name('surat-keluar.create');
Route::get('/surat-keluar/edit/{id}', [SuratKeluarController::class, 'edit'])->name('surat-keluar.edit');
Route::get('/surat-keluar/detail/{id}', [SuratKeluarController::class, 'show'])->name('surat-keluar.detail');
Route::get('/laporan-surat-keluar', [LaporanKeluarController::class, 'index'])->name('laporan-surat-keluar');
Route::get('/laporan-surat-masuk', [LaporanMasukController::class, 'index'])->name('laporan-surat-masuk');
Route::get('/role', [RoleController::class, 'index'])->name('role');
Route::get('/permission', [PermissionController::class, 'index'])->name('permission');
Route::get('/pdf-view/{filename}', [PdfViewController::class, 'pdfView'])->name('pdf.view');
