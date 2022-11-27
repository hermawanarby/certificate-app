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
        // Hanya admin yang bisa akses
        $this->authorize('admin');

        // Berfungsi untuk menampilkan data sertifikat
        return view('dashboard.certificates.index', [
            'certificates' => Certificate::all()
        ]);

        // Berfungsi untuk menampilkan data sertifikat
        return view('dashboard.member.index', []);
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
            'certificates' => Certificate::all()
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
            'sertifikat_id' => 'required|unique:certificates|max:35',
            'nama' => 'required|max:255',
            'partisipan' => 'required|max:255',
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

    // Method edit berfungsi untuk ubah data
    public function edit(Certificate $certificate)
    {
        // Berfungsi untuk menampilkan data sertifikat
        return view('dashboard.certificates.edit', [
            'certificate' => $certificate,
            'certificates' => Certificate::all()
        ]);
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
        // Berufungsi untuk memvalidasi data-data sertifikat sesuai yang diharapkan 
        $rules = [
            'nama' => 'required|max:255',
            'partisipan' => 'required|max:255',
            'tema' => 'required|max:255',
            'tanggal' => 'required'
        ];

        // Berfungsi mengecek jika sertifikat id yang baru tidak sama dengan sertifikat id yang lama maka akan divalidaasi
        if ($request->sertifikat_id != $certificate->sertifikat_id) {

            // Validasi sertifikat_id
            $rules['sertifikat_id'] = 'required|unique:certificates|max:15';
        }

        // Meyimpan fungsi validate ke valriabel $validatedData
        $validatedData = $request->validate($rules);

        // Berufungsi untuk menyimpan data ke database yang sudah di update
        Certificate::where('id', $certificate->id)
                        ->update($validatedData);

        // Berfungsi untuk redicrect ke halaman dashboard certificates, bila berhasil update sertifikat akan menampilkan flash message
        return redirect('/dashboard/certificates')->with('success', 'Certificate has been updated!');
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
        // Berufungsi untuk menghapus data
        Certificate::destroy($certificate->id);

        // Berfungsi untuk redicrect ke halaman dashboard certificates, bila berhasil hapus data akan menampilkan flash message
        return redirect('/dashboard/certificates')->with('success', 'Certificate has been deleted!');
    }
}
