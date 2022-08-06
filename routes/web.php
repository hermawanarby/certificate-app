<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CertificateController;

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

// Route untuk menampilkan halaman home
Route::get('/', function () {
    return view('home');
});

// Route untuk menampilkan sertifikat
Route::get('/sertifikat', [CertificateController::class, 'search']);

// Route untuk menampilkan login, ini hanya bisa diakases oleh user yang belum terauntentikasi
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');

// Route untuk menjalankan fungsi login
Route::post('/login', [LoginController::class, 'authenticate']);

// Route untuk menjalankan fungsi logout
Route::post('/logout', [LoginController::class, 'logout']);

// Route untuk menampilkan register
Route::get('/register', [RegisterController::class, 'index']);

// Route untuk menjalankan fungsi register
Route::post('/register', [RegisterController::class, 'store']);

// Route untuk menampilkan dashboard, ini hanya bisa diakases oleh user yang sudah login
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');