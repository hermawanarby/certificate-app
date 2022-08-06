<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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

// Route untuk menampilkan login
Route::get('/login', [LoginController::class, 'index']);

// Route untuk menampilkan register
Route::get('/register', [RegisterController::class, 'index']);

// Route untuk menjalankan fungsi register
Route::post('/register', [RegisterController::class, 'store']);