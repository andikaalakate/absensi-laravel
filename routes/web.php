<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SiswaController;
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

Route::get('/welcome', function () {
    return view('landing.home');
});

Route::middleware('guest')->group(function () {
    Route::get('/', [AuthController::class, 'home']);
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/proseslogin', [AuthController::class, 'proseslogin']);
});

Route::middleware('auth:siswa')->group(function () {
    Route::get('/', [AuthController::class, 'home']);
    Route::get('/siswa/profil', [SiswaController::class, 'index']);
    Route::get('/siswa/tentang', [SiswaController::class, 'tentang']);
    Route::get('/siswa/keamanan', [SiswaController::class, 'keamanan']);
    Route::get('/siswa/peringkat', [SiswaController::class, 'peringkat']);
    Route::get('/siswa/statistik', [SiswaController::class, 'statistik']);
    Route::get('/siswa/tampilan', [SiswaController::class, 'tampilan']);
    Route::get('/siswa/pindai-qr', [SiswaController::class, 'pindaiqr']);
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});