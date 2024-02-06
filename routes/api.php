<?php

use App\Http\Controllers\Api\SiswaAbsensiController;
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

Route::middleware('auth:sanctum')->get('/siswa', function (Request $request) {
    return $request->siswa();
});

Route::get('/siswa/absensi', [SiswaAbsensiController::class, 'index'])->name('siswa.absensi.index');
Route::get('/siswa/absensi/{nis}', [SiswaAbsensiController::class, 'show'])->name('siswa.absensi.show');
Route::get('/siswa/absensi2/{nis}', [SiswaAbsensiController::class, 'show2'])->name('siswa.absensi.show2');