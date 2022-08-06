<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index');
    }

    // Method store berufungsi unutk registrasi user
    public function store(Request $request)
    {
        // Berufungsi untuk memvalidasi data-data registrasi sesuai yang diharapkan 
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:3|max:255|alpha_dash|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|confirmed|min:5|max:255'
        ]);

        // Berfungsi untuk enkripsi password
        $validatedData['password'] = Hash::make($validatedData['password']);

        // Berufungsi untuk menyimpan data ke database
        User::create($validatedData);

        // Berfungsi untuk redicrect ke halaman login, bila berhasil registrasi dengan membawa flash message
        return redirect('/login')->with('success', 'Registration successfull! Please login');
    }

}
