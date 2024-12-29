<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EtalaseController;
use App\Http\Controllers\BarangTerjualController;
use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return view('Auth.Login');
})->middleware('guest')->name('login');
Route::post('/login-proses', [LoginController::class, 'login'])->name('loginproccess');


Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('Admin.Dashboard');
    });

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::get('/', function () {
    return view('Auth/login');
});

Route::get('/etalase', [EtalaseController::class, 'index'])->name('etalase.index');
Route::post('/etalase/store', [EtalaseController::class, 'store'])->name('etalase.store');
Route::post('/etalase/update/{id}', [EtalaseController::class, 'update'])->name('etalase.update');
Route::get('/etalase/destroy/{id}', [EtalaseController::class, 'destroy'])->name('etalase.destroy');

Route::get('barang-terjual', [BarangTerjualController::class, 'index'])->name('barang-terjual.index');
Route::post('barang-terjual', [BarangTerjualController::class, 'store'])->name('barang-terjual.store');
Route::post('barang-terjual/{id}/update', [BarangTerjualController::class, 'update'])->name('barang-terjual.update');
Route::get('barang-terjual/{id}/delete', [BarangTerjualController::class, 'destroy'])->name('barang-terjual.destroy');
