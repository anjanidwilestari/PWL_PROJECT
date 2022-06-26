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
use App\Http\Controllers\PengembalianController;
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

Auth::routes();
Route::group(['middleware' => 'auth'], function () {

    Route::group(['middleware' => ['isAdmin','auth']], function () {
        Route::get('/', [DashboardController::class, 'home'])->name('admin.home');
        Route::resource('user', UserController::class);
        Route::resource('pegawai', PegawaiController::class);
        Route::resource('kategoriproduk', KategoriProdukController::class);
        Route::get('getintouch', [GetInTouchController::class, 'getintouch'])->name('getintouch');
        Route::resource('member', MemberController::class);
        Route::resource('produk', ProdukController::class);
        Route::resource('peminjaman', PeminjamanController::class);
        Route::resource('pengembalian', PengembalianController::class);

        //cetakpdf&nota
        Route::get('memberpdf', [MemberController::class, 'cetak_pdf_member'])->name('member.memberpdf');
        Route::get('pegawaipdf', [PegawaiController::class, 'cetak_pdf_pegawai'])->name('pegawai.pegawaipdf');
        Route::get('kategoriprodukpdf', [KategoriProdukController::class, 'cetak_pdf_kategori'])->name('kategoriproduk.kategoriprodukpdf');
        Route::get('produkpdf', [ProdukController::class, 'cetak_pdf_produk'])->name('produk.produkpdf');
        Route::get('peminjamanpdf', [PeminjamanController::class, 'cetak_pdf_peminjaman'])->name('peminjaman.peminjamanpdf');
        Route::get('peminjaman/{id}/cetaknota', [PeminjamanController::class,'cetaknota'])->name('peminjaman.cetaknota');
        Route::get('dikembalikanpdf', [PeminjamanController::class, 'cetak_pdf_dikembalikan'])->name('peminjaman.dikembalikanpdf');
        Route::get('belumkembalipdf', [PeminjamanController::class, 'cetak_pdf_belumkembali'])->name('peminjaman.belumkembalipdf');
        Route::get('pengembalianpdf', [PengembalianController::class, 'cetak_pdf_pengembalian'])->name('pengembalian.pengembalianpdf');

        //ajax
        Route::get('getPeminjaman/{id}',[PeminjamanController::class,'getHarga']);

        //daftar-transaksi
        Route::get('peminjamanbelumkembali',[PeminjamanController::class,'belumkembali'])->name('peminjaman.belumkembali');
        Route::get('peminjamandikembalikan',[PeminjamanController::class,'dikembalikan'])->name('peminjaman.dikembalikan');
    });

    //view klien
    Route::group(['middleware' => ['isMember','auth']], function () {
        Route::get('/beranda', [KlienController::class, 'home'])->name('member.home');
        Route::get('/klien-produk', [KlienController::class, 'produk'])->name('member.produk');
        Route::get('/klien-galery', [KlienController::class, 'galery']);
        Route::get('/klien-about', [KlienController::class, 'about']);
        Route::resource('contact', GetInTouchController::class);
        
        Route::get('/buatmember', [KlienController::class, 'createmember'])->name('buatmember.create');
        Route::post('getMember',[KlienController::class,'storemember'])->name('buatmember.store');

        Route::get('/sewa', [KlienController::class, 'createsewa'])->name('sewa.create');
        Route::post('getSewa',[KlienController::class,'storesewa'])->name('sewa.store');
    });
});