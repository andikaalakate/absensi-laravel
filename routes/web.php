<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Api\KelasJurusanController;
use App\Http\Controllers\Api\SiswaAbsensiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SiswaAbsensisController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\api\SiswaDataApiController;
use App\Http\Controllers\SiswaDataController;
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
  Route::get('/siswa/peringkat', [SiswaController::class, 'peringkat'])->name('siswa.peringkat');
  Route::get('/siswa/statistik', [SiswaController::class, 'statistik'])->name('siswa.statistik');
  Route::get('/siswa/tampilan', [SiswaController::class, 'tampilan']);
  Route::get('/siswa/pindai-qr', [SiswaController::class, 'pindaiqr']);
  Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
  Route::post('/siswa/absensi/store', [SiswaAbsensisController::class, 'store'])->name('siswa.absensi.store');
  Route::post('/absensi/siswa/storeupdate', [SiswaAbsensisController::class, 'storeOrUpdate'])->name('siswa.absensi.storeupdate');
});

Route::middleware(['auth:admin', 'auth.session', 'auth.checkduplicate'])->group(function () {
  Route::get('/', [AdminController::class, 'home']);
  Route::get('/admin', [AdminController::class, 'home']);
  Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
  Route::get('/admin/siswa', [AdminController::class, 'siswa'])->name('admin.siswa');
  Route::get('/admin/jurusan', [AdminController::class, 'jurusan'])->name('admin.jurusan');
  Route::get('/admin/kelas', [AdminController::class, 'kelas'])->name('admin.kelas');
  Route::get('/admin/user', [AdminController::class, 'user'])->name('admin.user');
  Route::post('/admin/user/store', [AdminController::class, 'store'])->name('user.store');
  Route::put('/admin/user/update/{id}', [AdminController::class, 'update'])->name('user.update');
  Route::delete('/admin/user/destroy/{id}', [AdminController::class, 'destroy'])->name('user.destroy');
  Route::get('/admin/peringkat', [AdminController::class, 'peringkat'])->name('admin.peringkat');
  Route::get('/admin/laporan', [AdminController::class, 'laporan'])->name('admin.laporan');
  Route::get('/admin/laporan/view/pdf', [AdminController::class, 'viewLaporan'])->name('admin.view.laporan');
  Route::get('/admin/laporan/cetak/pdf', [AdminController::class, 'cetakLaporan'])->name('admin.cetak.laporan');
  Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
  Route::post('/admin/siswa/store', [SiswaDataController::class, 'store'])->name('siswa.store');
  Route::delete('/admin/siswa/destroy/{nis}', [SiswaDataApiController::class, 'destroy'])->name('siswa.destroy');
  Route::post('/admin/kelas/store', [KelasJurusanController::class, 'store1'])->name('kelas.store');
  Route::delete('/admin/kelas/destroy/{id}', [KelasJurusanController::class, 'destroy1'])->name('kelas.destroy');
  Route::post('/admin/jurusan/store', [KelasJurusanController::class, 'store2'])->name('jurusan.store');
  Route::delete('/admin/jurusan/destroy/{id}', [KelasJurusanController::class, 'destroy2'])->name('jurusan.destroy');
});