<?php

use App\Http\Controllers\Operator\KehadiranController;
use App\Http\Controllers\Operator\OperatorController;
use App\Http\Controllers\Operator\PerizinanController;
use App\Http\Controllers\Operator\SiswaController;
use App\Http\Controllers\Operator\TenagaKependidikanController;
use App\Http\Controllers\Operator\TenagaPendidikController;
use App\Http\Controllers\Operator\RuanganController;
use App\Http\Controllers\Operator\Setting\PageController;
use App\Http\Controllers\Operator\Setting\TokenController;
use App\Http\Controllers\Operator\StorageController;
use App\Http\Controllers\Operator\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::group(['prefix' => 'operator', 'as' => 'operator.', 'middleware' => ['auth', 'role:operator']], function() {
    Route::get('', [OperatorController::class, 'index'])->name('home');

    Route::group(['prefix' => 'siswa', 'as' => 'siswa.'], function () {
        Route::get('', [SiswaController::class, 'index'])->name('home');
        Route::get('{siswa_id}', [SiswaController::class, 'show'])->name('show');
        Route::post('store', [SiswaController::class, 'store'])->name('store');
        Route::delete('destroy/{siswaId}', [SiswaController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => 'tenaga-pendidik', 'as' => 'tenaga-pendidik.'], function () {
        Route::get('', [TenagaPendidikController::class, 'index'])->name('home');
        Route::post('store', [TenagaPendidikController::class, 'store'])->name('store');
        Route::delete('destroy/{dataId}', [TenagaPendidikController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => 'tenaga-kependidikan', 'as' => 'tenaga-kependidikan.'], function() {
        Route::get('', [TenagaKependidikanController::class, 'index'])->name('home');
        Route::post('store', [TenagaKependidikanController::class, 'store'])->name('store');
        Route::delete('destroy/{dataId}', [TenagaKependidikanController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => 'ruangan', 'as' => 'ruangan.'], function() {
        Route::get('', [RuanganController::class, 'index'])->name('home');
        Route::get('{ruangan_id}', [RuanganController::class, 'show'])->name('show');
        Route::post('store', [RuanganController::class, 'store'])->name('store');
        Route::delete('destroy/{ruanganId}', [RuanganController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => 'kehadiran', 'as' => 'kehadiran.'], function () {
        Route::get('', [KehadiranController::class, 'index'])->name('home');
        Route::put('update/{dataId}', [KehadiranController::class, 'update'])->name('update');
    });

    Route::group(['prefix' => 'users', 'as' => 'user.'], function () {
        Route::get('', [UserController::class, 'index'])->name('home');
        Route::post('store', [UserController::class, 'store'])->name('store');
        Route::delete('destroy/{dataId}', [UserController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => 'perizinan', 'as' => 'perizinan.'], function() {
        Route::get('', [PerizinanController::class, 'index'])->name('home');
    });

    Route::group(['prefix' => 'storage', 'as' => 'storage.'], function() {
        Route::get('', [StorageController::class, 'index'])->name('home');
        Route::post('store', [StorageController::class, 'store'])->name('store');
        Route::post('download', [StorageController::class, 'show'])->name('download');
        Route::delete('destroy', [StorageController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => 'settings', 'as' => 'setting.'], function() {
        Route::group(['prefix' => 'page', 'as' => 'page.'], function() {
            Route::get('', [PageController::class, 'index'])->name('home');
            Route::post('slider', [PageController::class, 'sliderStore'])->name('slider.store');
            Route::delete('slider/{id}', [PageController::class, 'sliderDestroy'])->name('slider.destroy');
        });

        Route::group(['prefix' => 'token', 'as' => 'token.'], function() {
            Route::get('', [TokenController::class, 'index'])->name('home');
            Route::post('store', [TokenController::class, 'store'])->name('store');
            Route::delete('destroy/{token}', [TokenController::class, 'destroy'])->name('destroy');
        });
    });
});
