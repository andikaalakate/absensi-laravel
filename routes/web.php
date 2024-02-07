<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\api\SiswaDataApiController;
use Illuminate\Support\Facades\Artisan;
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

Route::get('/clear-cache', function () {
  Artisan::call('cache:clear');
  return "Cache is cleared";
});

Route::middleware('guest')->group(function () {
  Route::get('/', [AuthController::class, 'home']);
  Route::get('/login', [AuthController::class, 'index'])->name('login');
  Route::get('/admin/login', [AdminController::class, 'index'])->name('login');
  Route::post('/proseslogin', [AuthController::class, 'proseslogin']);
});

Route::middleware(['auth:siswa', 'auth.session'])->group(function () {
  Route::get('/', [AuthController::class, 'home']);
  Route::get('/siswa/profil', [SiswaController::class, 'index']);
  Route::get('/siswa/tentang', [SiswaController::class, 'tentang']);
  Route::get('/siswa/keamanan', [SiswaController::class, 'keamanan'])->name('siswa.keamanan');
  Route::get('/siswa/peringkat', [SiswaController::class, 'peringkat']);
  Route::get('/siswa/statistik', [SiswaController::class, 'statistik']);
  Route::get('/siswa/tampilan', [SiswaController::class, 'tampilan']);
  Route::get('/siswa/pindai-qr', [SiswaController::class, 'pindaiqr']);
  Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware(['auth:admin', 'auth.session'])->group(function () {
  Route::get('/', [AdminController::class, 'home']);
  Route::get('/admin/dashboard', [AdminController::class, 'index']);
  Route::get('/admin/logout', [AdminController::class, 'logout'])->name('logout');
});

Route::get('/siswa/create', [SiswaDataApiController::class, 'create'])->name('siswa.create');
