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

Route::middleware(['auth.check', 'guest'])->group(function () {
  Route::get('/login', [AuthController::class, 'index'])->name('login');
  Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
});

Route::middleware('guest')->group(function () {
  Route::get('/', [AuthController::class, 'login']);
  Route::get('/siswa', [AuthController::class, 'home']);
  Route::get('/admin', [AdminController::class, 'home']);
  Route::post('/proseslogin', [AuthController::class, 'proseslogin']);
  Route::post('/admin/proseslogin', [AdminController::class, 'proseslogin']);
});

Route::middleware(['auth:siswa', 'auth.session', 'auth.checkduplicate'])->group(function () {
  Route::get('/', [AuthController::class, 'home']);
  Route::get('/siswa', [AuthController::class, 'home']);
  Route::get('/siswa/profil', [SiswaController::class, 'index']);
  Route::get('/siswa/tentang', [SiswaController::class, 'tentang']);
  Route::get('/siswa/keamanan', [SiswaController::class, 'keamanan'])->name('siswa.keamanan');
  Route::get('/siswa/peringkat', [SiswaController::class, 'peringkat']);
  Route::get('/siswa/statistik', [SiswaController::class, 'statistik']);
  Route::get('/siswa/tampilan', [SiswaController::class, 'tampilan']);
  Route::get('/siswa/pindai-qr', [SiswaController::class, 'pindaiqr']);
  Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware(['auth:admin', 'auth.session', 'auth.checkduplicate'])->group(function () {
  Route::get('/', [AdminController::class, 'home']);
  Route::get('/admin', [AdminController::class, 'home']);
  Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
  Route::get('/admin/siswa', [AdminController::class, 'siswa']);
  Route::get('/admin/jurusan', [AdminController::class, 'jurusan']);
  Route::get('/admin/kelas', [AdminController::class, 'kelas']);
  Route::get('/admin/user', [AdminController::class, 'user']);
  Route::get('/admin/peringkat', [AdminController::class, 'peringkat']);
  Route::get('/admin/laporan', [AdminController::class, 'laporan']);
  Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
});

Route::get('/siswa/create', [SiswaDataApiController::class, 'create'])->name('siswa.create');
