<?php

use App\Http\Controllers\DesaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\RwController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();


Route::get('/home', function () {
    return redirect()->route('admin');
})->name('home');

Route::prefix('admin')->middleware('auth')->group(function () {

    Route::get("/", [HomeController::class, 'index'])->name('admin');

    Route::prefix('profile')->group(function () {
        Route::get("/", [HomeController::class, 'profile'])->name('profile');
        Route::post("store-profile", [HomeController::class, 'changeProfile'])->name('profile.change');
        Route::post("password", [HomeController::class, 'changePassword'])->name('profile.password');
    });

    Route::prefix('desa')->group(function () {
        Route::get("/", [DesaController::class, 'index'])->name('desa');
        Route::post("store/{any}", [DesaController::class, 'store'])->name('desa.store');
        Route::get("delete/{id}", [DesaController::class, 'delete'])->name('desa.delete');
    });

    Route::prefix('rw')->group(function () {
        Route::get("/", [RwController::class, 'index'])->name('rw');
        Route::post("store/{any}", [RwController::class, 'store'])->name('rw.store');
        Route::get("delete/{id}", [RwController::class, 'delete'])->name('rw.delete');
    });

    Route::prefix('penduduk')->group(function () {
        Route::get("/", [PendudukController::class, 'index'])->name('penduduk');
        Route::get("create", [PendudukController::class, 'create'])->name('penduduk.create');
        Route::get("update/{id}", [PendudukController::class, 'update'])->name('penduduk.update');
        Route::get("delete/{id}", [PendudukController::class, 'delete'])->name('penduduk.delete');
        Route::post("store/{any}", [PendudukController::class, 'store'])->name('penduduk.store');
    });
});
