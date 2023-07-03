<?php

use App\Http\Controllers\GolonganController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layouts.home');
});

Route::controller(KaryawanController::class)->group(function () {
    Route::get('/karyawan', 'index')->name('karyawan.index');
    Route::get('/karyawan/create', 'create')->name('karyawan.create');
    Route::post('/karyawan', 'store')->name('karyawan.store');;
});

Route::controller(GolonganController::class)->group(function () {
    Route::get('/golongan', 'index')->name('golongan.index');
    Route::get('/golongan/create', 'create')->name('golongan.create');
    Route::post('/golongan', 'store')->name('golongan.store');
});

Route::controller(TransaksiController::class)->group(function () {
    Route::get('/transaksi', 'index')->name('transaksi.index');
    Route::get('/transaksi/print/{id}', 'print')->name('transaksi.print');
    Route::get('/transaksi/create', 'create')->name('transaksi.create');
    Route::post('/transaksi', 'store')->name('transaksi.store');
});
