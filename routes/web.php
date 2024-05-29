<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Dashboard\BarangController;
use App\Http\Controllers\Dashboard\IndexController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'loginStore'])->name('login.store');

Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/register', [RegisterController::class, 'registerStore'])->name('register.store');



Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [IndexController::class, 'dashboard'])->name('dashboard');

    Route::get('/dashboard/barang', [BarangController::class, 'barang'])->name('dashboard.barang.index');
    Route::get('/dashboard/barang/create', [BarangController::class, 'create'])->name('dashboard.barang.create');
    Route::post('/dashboard/barang/create', [BarangController::class, 'store'])->name('dashboard.barang.store');
    Route::get('/dashboard/barang/{id}/edit', [BarangController::class, 'edit'])->name('dashboard.barang.edit');
    Route::put('/dashboard/barang/{id}/edit', [BarangController::class, 'update'])->name('dashboard.barang.update');
    Route::get('/dashboard/barang/{id}/delete', [BarangController::class, 'delete'])->name('dashboard.barang.delete');
    Route::delete('/dashboard/barang/{id}/delete', [BarangController::class, 'destroy'])->name('dashboard.barang.destroy');

    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
});
