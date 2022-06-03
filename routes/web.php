<?php

use App\Http\Controllers\AdminController;
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
Route::get('/', [KlienController::class, 'home']);

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('home');
Route::get('/admin/contohtabel', [AdminController::class, 'tabel']);
Route::resource('/admin/pegawai',PegawaiController::class);

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
// Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('home');
// Auth::logout();
// Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
