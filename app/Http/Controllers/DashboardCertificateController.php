<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;

class DashboardCertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // Method index berfungsi untuk menampilkan data
    public function index()
    {
        // Berfungsi untuk menampilkan data sertifikat
        return view('dashboard.certificates.index', [
            'certificates' => Certificate::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    // Method create berfungsi untuk tambah data
    public function create()
    {
        // Berfungsi untuk menampilkan data sertifikat
        return view('dashboard.certificates.create', [
            'pastisipants' => Certificate::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    // Method store berfungsi untuk menjalakan fitur tambah data
    public function store(Request $request)
    {

        // Berufungsi untuk memvalidasi data-data sertifikat sesuai yang diharapkan 
        $validatedData = $request->validate([
            'sertifikat_id' => 'required|unique:certificates|max:15',
            'nama' => 'required|max:255',
            'partisipan' => 'required',
            'tema' => 'required|max:255',
            'tanggal' => 'required'
        ]);

         // Berufungsi untuk menyimpan data ke database
        Certificate::create($validatedData);

        // Berfungsi untuk redicrect ke halaman dashboard certificates, bila berhasil tambah sertifikat akan menampilkan flash message
        return redirect('/dashboard/certificates')->with('success', 'New certificate has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */

    // Method show berfungsi untuk lihat detail data 
    public function show(Certificate $certificate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */

    // Method show berfungsi untuk ubah data
    public function edit(Certificate $certificate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */

    // Method update berfungsi untuk memproses fitur ubah data
    public function update(Request $request, Certificate $certificate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */

    // Method destroy berfungsi untuk menghapus data
    public function destroy(Certificate $certificate)
    {
        //
    }
}
