<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    // Metod index berfungsi untuk menampilkan halaman login
    public function index()
    {
        return view('login.index');
    }

    // Method authenticate berfungsi untuk menjalankan fungi login
    public function authenticate(Request $request)
    {
        // Berfungsi untuk mevalidasi data yang dimasukan oleh user saat login
        $credentials = $request->validate([
            'username' => 'required|alpha_dash',
            'password' => 'required'
        ]);


        if (Auth::attempt($credentials)) {

            // Berfungsi untuk mengenerate session
            $request->session()->regenerate();

            // Berfungsi untuk redirect ke halaman dashboard bila berhasil login
            return redirect()->intended('/dashboard');
        }

        // Berfungsi untuk mengembalikan ke halaman login bila user salah memasukan akun,
        // dan juga menampilkan pesan 'Login failed!'
        return back()->with('loginError', 'Login failed!');
    }

    // Method logout berfungsi untuk menjalankan fungi logout
    public function logout()
    {
        // Berfungsi untuk memanggil method logout
        Auth::logout();

        // Berfungsi untuk session tidak bisa dipakai
        request()->session()->invalidate();
 
        // Berfungsi untuk supaya tidak dibajak session nya
        request()->session()->regenerateToken();
    
        // Berfungsi untuk mengembalikan ke halaman utama
        return redirect('/');
    }
}
