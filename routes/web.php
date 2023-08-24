<?php

use App\Http\Controllers\dashboardController;
use App\Http\Controllers\mahasiswaController;
use App\Http\Controllers\prodiController;
use App\Http\Controllers\pembayaranController;
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

Route::resource('/', dashboardController::class)->names([
    'index' => 'dashboard'
]);

Route::resource('mahasiswa', mahasiswaController::class)->names([
    'index' => 'mahasiswa.index',
    'create' => 'mahasiswa.create',
    'store' => 'mahasiswa.store',
    'show' => 'mahasiswa.show',
    'edit' => 'mahasiswa.edit',
    'update' => 'mahasiswa.update',
    'destroy' => 'mahasiswa.destroy',
]);

Route::resource('prodi', prodiController::class)->names([
    'index' => 'prodi.index',
    'create' => 'prodi.create',
    'store' => 'prodi.store',
    'show' => 'prodi.show',
    'edit' => 'prodi.edit',
    'update' => 'prodi.update',
    'destroy' => 'prodi.destroy',
]);

Route::resource('pembayaran', pembayaranController::class);

Route::get('/mahasiswa/search/{nim}', [mahasiswaController::class, 'searchByNIM']);

Route::get('pembayaran/{id}/cetak', [pembayaranController::class, 'cetak'])->name('cetak');

Route::post('/cetak_pdf', [pembayaranController::class, 'cetakPDF'])->name('cetak_pdf');
