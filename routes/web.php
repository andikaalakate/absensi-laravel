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

// Route::get('/welcome', function () {
//     return view('welcome');
// });

Route::middleware('guest')->group(function () {
    Route::get('/', [AuthController::class, 'flogin']);
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/proseslogin', [AuthController::class, 'proseslogin']);
});

Route::middleware('auth:siswa')->group(function () {
    Route::get('/', [AuthController::class, 'tlogin']);
    Route::get('/siswa/dashboard', [SiswaController::class, 'index']);
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

