<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\KategoriProdukController;
use App\Http\Controllers\KlienController;
use App\Http\Controllers\PegawaiController;
use Illuminate\Support\Facades\Auth;
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
Route::get('/klien-beranda', [KlienController::class, 'home']);
Route::get('/klien-produk', [KlienController::class, 'produk']);
Route::get('/klien-galery', [KlienController::class, 'galery']);
Route::get('/klien-about', [KlienController::class, 'about']);
Route::get('/klien-contact', [KlienController::class, 'contact']);

Route::get('/', [AdminController::class, 'dashboard'])->name('home');
Route::get('/admin/contohtabel', [AdminController::class, 'tabel']);
Route::resource('pegawai',PegawaiController::class);
Route::resource('kategoriproduk',KategoriProdukController::class);

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
// Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('home');
// Auth::logout();
// Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
