<?php

use App\Http\Controllers\Api\KelasJurusanController;
use App\Http\Controllers\Api\SiswaAbsensiController;
use App\Http\Controllers\api\SiswaDataApiController;
use App\Http\Controllers\SiswaAbsensisController;
use App\Http\Controllers\SiswaDataController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/siswa', function (Request $request) {
//     return $request->siswa();
// });
Route::get('/siswa', [SiswaDataApiController::class, 'index'])->name('siswa.index');
Route::get('/siswa/{nis}', [SiswaDataApiController::class, 'show'])->name('siswa.show');
Route::put('/siswa/{nis}', [SiswaDataController::class, 'update'])->name('siswa.update');
// Route::apiResource('api/siswa', SiswaDataApiController::class);

Route::get('/absensi/siswa', [SiswaAbsensiController::class, 'index'])->name('siswa.absensi.index');
Route::get('/absensi/siswa/{nis}', [SiswaAbsensiController::class, 'show'])->name('siswa.absensi.show');
Route::get('/absensi2/siswa/{nis}', [SiswaAbsensiController::class, 'show2'])->name('siswa.absensi.show2');

Route::get('/kelasjurusan', [KelasJurusanController::class, 'index'])->name('kelasjurusan.index');
Route::get('/kelas', [KelasJurusanController::class, 'kelas'])->name('kelas.index');
Route::get('/jurusan', [KelasJurusanController::class, 'jurusan'])->name('jurusan.index');
Route::put('/jurusan/{id}', [KelasJurusanController::class, 'update2'])->name('jurusan.update');
