<?php

use App\Http\Controllers\BackController;
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
use App\Models\Klasifikasi;
use App\Models\SuratKeluar;
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

Route::group(['middleware' => 'prevent-back-button'], function () {


    Route::get('/', function () {
        return redirect()->route('home');
    });

    Route::group(['middleware' => ['guest']], function () {
        Route::get('/login', [BackController::class, 'index'])->name('login.view');
        Route::post('/proses-login', [BackController::class, 'authenticate'])->name('login.proses');
    });

    Route::post('/logout', [BackController::class, 'logout'])->name('logout');

    Route::group(['middleware' => ['auth']], function () {
        Route::get('/', [HomeController::class, 'index'])->name('home');
        Route::group(['middleware' => ['permission:data-user (sub-menu)']], function () {
            Route::get('/data-pengguna', [UserController::class, 'index'])->name('data-user');
        });

        Route::group(['middleware' => ['permission:tambah-user']], function () {
            Route::get('/data-pengguna/tambah', [UserController::class, 'create'])->name('data-user.create');
            Route::post('/data-pengguna/tambah', [UserController::class, 'store'])->name('data-user.store');
        });
        Route::group(['middleware' => ['permission:edit-user']], function () {
            Route::get('/data-pengguna/edit/{id}', [UserController::class, 'edit'])->name('data-user.edit');
            Route::put('/data-pengguna/{id}', [UserController::class, 'update'])->name('data-pengguna.update');
        });
        Route::delete('/data-pengguna/delete/{id}', [UserController::class, 'destroy'])->name('data-user.destroy')->middleware('permission:hapus-user');
        Route::get('/profil/{id}', [UserController::class, 'profil'])->name('profil.view');
        Route::put('/profil/edit/{id}', [UserController::class, 'profil_edit'])->name('profil.update');
        Route::put('/profil/ubah-password/{id}', [UserController::class, 'ubah_password'])->name('password.update');
        Route::get('/klasifikasi-surat', [KlasifikasiController::class, 'index'])->name('klasifikasi')->middleware('permission:klasifikasi-surat (sub-menu)');
        Route::post('/klasifikasi-surat/tambah', [KlasifikasiController::class, 'store'])->name('klasifikasi.store')->middleware('permission:tambah-klasifikasi');
        Route::delete('/klasifikasi/delete/{klasifikasi}', [KlasifikasiController::class, 'destroy'])->name('klasifikasi.destroy')->middleware('permission:hapus-klasifikasi');
        Route::put('/klasifikasi-surat/update/{klasifikasi}', [KlasifikasiController::class, 'update'])->name('klasifikasi.update')->middleware('permission:edit-klasifikasi');
        Route::get('/surat-masuk', [SuratMasukController::class, 'index'])->name('surat-masuk')->middleware('permission:surat-masuk (sub-menu)');
        Route::group(['middleware' => ['permission:tambah-surat-masuk']], function () {
            Route::get('/surat-masuk/tambah', [SuratMasukController::class, 'create'])->name('surat-masuk.create');
            Route::post('surat-masuk/tambah', [SuratMasukController::class, 'store'])->name('surat-masuk.store');
        });

        Route::group(['middleware' => ['permission:edit-surat-masuk']], function () {
            Route::get('/surat-masuk/edit/{id}', [SuratMasukController::class, 'edit'])->name('surat-masuk.edit');
            Route::put('/surat-masuk/edit/{id}', [SuratMasukController::class, 'update'])->name('surat-masuk.update');
        });

        Route::group(['middleware' => ['permission:detail-surat-masuk']], function () {
            Route::get('/surat-masuk/detail/{id}', [SuratMasukController::class, 'show'])->name('surat-masuk.detail');
            Route::get('/surat-masuk/lihat-pdf/{id}', [SuratMasukController::class, 'lihatPdf'])->name('surat-masuk.lihat');
            Route::get('/surat-masuk/download/{id}', [SuratMasukController::class, 'download'])->name('surat-masuk.download');
        });

        Route::delete('/surat-masuk/delete/{id}', [SuratMasukController::class, 'destroy'])->name('surat-masuk.destroy')->middleware('permission:hapus-surat-masuk');

        Route::get('/surat-keluar', [SuratKeluarController::class, 'index'])->name('surat-keluar')->middleware('permission:surat-keluar (sub-menu)');
        Route::group(['middleware' => ['permission:tambah-surat-keluar']], function () {
            Route::get('/surat-keluar/tambah', [SuratKeluarController::class, 'create'])->name('surat-keluar.create');
            Route::post('surat-keluar/tambah', [SuratKeluarController::class, 'store'])->name('surat-keluar.store');
        });
        Route::group(['middleware' => ['permission:edit-surat-keluar']], function () {
            Route::get('/surat-keluar/edit/{id}', [SuratKeluarController::class, 'edit'])->name('surat-keluar.edit');
            Route::put('/surat-keluar/edit/{id}', [SuratKeluarController::class, 'update'])->name('surat-keluar.update');
        });

        Route::delete('/surat-keluar/delete/{id}', [SuratKeluarController::class, 'destroy'])->name('surat-keluar.destroy')->middleware('permission:hapus-surat-keluar');

        Route::group(['middleware' => ['permission:detail-surat-keluar']], function () {
            Route::get('/surat-keluar/detail/{id}', [SuratKeluarController::class, 'show'])->name('surat-keluar.detail');
            Route::get('/surat-keluar/lihat-pdf/{id}', [SuratKeluarController::class, 'lihatPdf'])->name('surat-keluar.lihat');
            Route::get('/surat-keluar/download/{id}', [SuratKeluarController::class, 'download'])->name('surat-keluar.download');
        });

        Route::group(['middleware' => ['permission:laporan-surat-masuk (sub-menu)']], function () {
            Route::get('/laporan-surat-masuk', [LaporanMasukController::class, 'index'])->name('laporan-surat-masuk');
            Route::get('/laporan-surat-masuk/print-view/{print}', [LaporanMasukController::class, 'print_view'])->name('print-masuk.view');
        });

        Route::group(['middleware' => ['permission:laporan-surat-keluar (sub-menu)']], function () {
            Route::get('/laporan-surat-keluar', [LaporanKeluarController::class, 'index'])->name('laporan-surat-keluar');
            Route::get('/laporan-surat-keluar/print-view/{print}', [LaporanKeluarController::class, 'print_view'])->name('print-keluar.view');
        });
        Route::get('/role', [RoleController::class, 'index'])->name('role')->middleware('permission:role (sub-menu)');

        Route::group(['middleware' => ['permission:tambah-role']], function () {
            Route::get('/role/tambah-role', [RoleController::class, 'create'])->name('role.create');
            Route::post('/role/tambah-role', [RoleController::class, 'store'])->name('role.store');
        });

        Route::group(['middleware' => ['permission:edit-role']], function () {
            Route::get('/role/edit/{id}', [RoleController::class, 'edit'])->name('role.edit');
            Route::put('/role/update/{id}', [RoleController::class, 'update'])->name('role.update');
        });

        Route::delete('/role/delete/{id}', [RoleController::class, 'destroy'])->name('role.destroy')->middleware('permission:hapus-role');

        Route::get('/role/{id}', [RoleController::class, 'show'])->name('role.show')->middleware('permission:detail-role');

        Route::get('/permission', [PermissionController::class, 'index'])->name('permission')->middleware('permission:hak-akses (sub-menu)');
        // Route::get('/pdf-view/{filename}', [PdfViewController::class, 'pdfView'])->name('pdf.view');
    });
});
