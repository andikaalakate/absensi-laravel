<?php

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
  Route::post('/proseslogin', [AuthController::class, 'proseslogin']);
});

Route::middleware(['auth:siswa', 'auth.session'])->group(function () {
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
Route::middleware('api')->group(function () {
  Route::get('/api/siswa', [SiswaDataApiController::class, 'index']);
  Route::get('/api/siswa/{nis}', [SiswaDataApiController::class, 'show']);
  Route::post('/api/siswa', [SiswaDataApiController::class, 'store'])->name('siswa.store');
  Route::get('/siswa/create', [SiswaDataApiController::class, 'create'])->name('siswa.create');
  // Route::apiResource('api/siswa', SiswaDataApiController::class);
});