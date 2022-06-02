<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\KlienController;
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

Route::get('/admin', [AdminController::class, 'dashboard']);
Route::get('/admin/contohtabel', [AdminController::class, 'tabel']);

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
