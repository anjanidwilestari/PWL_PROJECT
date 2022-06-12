<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GetInTouchController;
use App\Http\Controllers\KategoriProdukController;
use App\Http\Controllers\KlienController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/login', [LoginController::class, 'index']);
// Route::post('/login', [LoginController::class, 'authenticate']);

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('home');
    Route::resource('user', UserController::class);
    Route::resource('pegawai', PegawaiController::class);
    Route::resource('kategoriproduk', KategoriProdukController::class);
    Route::get('getintouch', [GetInTouchController::class, 'getintouch'])->name('getintouch');
    Route::resource('member', MemberController::class);
    Route::resource('produk', ProdukController::class);
    Route::resource('peminjaman', PeminjamanController::class);

    Route::get('memberpdf', [PdfController::class, 'cetak_pdf_member'])->name('member.memberpdf');
    Route::get('pegawaipdf', [PdfController::class, 'cetak_pdf_pegawai'])->name('pegawai.pegawaipdf');
    Route::get('kategoriprodukpdf', [PdfController::class, 'cetak_pdf_kategori'])->name('kategoriproduk.kategoriprodukpdf');
    Route::get('produkpdf', [PdfController::class, 'cetak_pdf_produk'])->name('produk.produkpdf');
    Route::get('peminjamanpdf', [PdfController::class, 'cetak_pdf_peminjaman'])->name('peminjaman.peminjamanpdf');
});

Route::get('/klien-beranda', [KlienController::class, 'home']);
Route::get('/klien-produk', [KlienController::class, 'produk']);
Route::get('/klien-galery', [KlienController::class, 'galery']);
Route::get('/klien-about', [KlienController::class, 'about']);
Route::resource('contact', GetInTouchController::class);
