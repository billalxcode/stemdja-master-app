<?php

use App\Http\Controllers\Operator\KehadiranController;
use App\Http\Controllers\Operator\OperatorController;
use App\Http\Controllers\Operator\PerizinanController;
use App\Http\Controllers\Operator\SiswaController;
use App\Http\Controllers\Operator\TenagaKependidikanController;
use App\Http\Controllers\Operator\TenagaPendidikController;
use App\Http\Controllers\Operator\RuanganController;
use App\Http\Controllers\Operator\UserController;
use App\Models\TenagaKependidikan;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'operator', 'as' => 'operator.', 'middleware' => ['auth', 'role:operator']], function() {
    Route::get('', [OperatorController::class, 'index'])->name('home');

    Route::group(['prefix' => 'siswa', 'as' => 'siswa.'], function () {
        Route::get('', [SiswaController::class, 'index'])->name('home');
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
        Route::post('store', [RuanganController::class, 'store'])->name('store');
    });

    Route::group(['prefix' => 'kehadiran', 'as' => 'kehadiran.'], function () {
        Route::get('', [KehadiranController::class, 'index'])->name('home');
        Route::put('update/{dataId}', [KehadiranController::class, 'update'])->name('update');
    });

    Route::group(['prefix' => 'users', 'as' => 'user.'], function () {
        Route::get('', [UserController::class, 'index'])->name('home');
    });

    Route::group(['prefix' => 'perizinan', 'as' => 'perizinan.'], function() {
        Route::get('', [PerizinanController::class, 'index'])->name('home');
    });
});