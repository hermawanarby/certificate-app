<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\DashboardCertificateController;
use App\Http\Controllers\DashboardHomeController;
use App\Http\Controllers\DashboardMemberController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
// Note: jika menggunakan Route POST maka akan error
Route::match(['get', 'post'], '/sertifikat', [CertificateController::class, 'verifikasi']);

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
Route::get('/dashboard/home', function() {
    return view('dashboard.home');
})->middleware('auth');

Route::resource('/dashboard/home', DashboardHomeController::class)->middleware('auth');

// Route untuk menjalankan fungsi dashboard CRUD
Route::resource('dashboard/certificates', DashboardCertificateController::class)->middleware('auth');

// Route untuk menjalankan fungsi generate sertifikat dengan import
Route::resource('dashboard/member', DashboardMemberController::class)->middleware('auth');

// Route untuk menjalankan fungsi import data
Route::post('dashboard/member', [DashboardMemberController::class, 'importData'])->name('certificate.import_data');

Route::post('dashboard/member/truncate', [DashboardMemberController::class, 'MemberTruncate'])->name('certificate.truncate');

Route::post('dashboard/member/certificate', [DashboardMemberController::class, 'getCertificate'])->name('certificate.certificate');


