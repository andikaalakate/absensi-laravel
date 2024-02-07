<?php

use App\Http\Controllers\Api\SiswaAbsensiController;
use App\Http\Controllers\api\SiswaDataApiController;
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
Route::post('/siswa', [SiswaDataApiController::class, 'store'])->name('siswa.store');
Route::put('/siswa/{nis}', [SiswaDataApiController::class, 'update'])->name('siswa.update');
Route::delete('/siswa/{nis}', [SiswaDataApiController::class, 'destroy'])->name('siswa.destroy');
// Route::apiResource('api/siswa', SiswaDataApiController::class);

Route::get('/absensi/siswa', [SiswaAbsensiController::class, 'index'])->name('siswa.absensi.index');
Route::get('/absensi/siswa/{nis}', [SiswaAbsensiController::class, 'show'])->name('siswa.absensi.show');
Route::get('/absensi2/siswa/{nis}', [SiswaAbsensiController::class, 'show2'])->name('siswa.absensi.show2');