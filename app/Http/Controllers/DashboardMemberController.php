<?php

namespace App\Http\Controllers;

use GDText\Box;
use App\Imports\CertificatesImport;
use Illuminate\Http\Request;
use App\Models\Certificate;
use GDText\Color;
use Maatwebsite\Excel\Facades\Excel;

class DashboardMemberController extends Controller
{
    //
    // Method index berfungsi untuk menampilkan data
    public function index()
    {
        // Hanya admin yang bisa akses
        $this->authorize('admin');

        // Berfungsi untuk menampilkan data sertifikat
        return view('dashboard.member.index', [
            'certificates' => Certificate::latest()->paginate(5)
        ]);
    }

    // Import Excel
    public function ImportData(Request $request) 
    {
        $request->validate([
            'my_file' => 'required',
            'fungsi' => 'required',
        ]);
        
        if($request->fungsi == 1){
            //fungsi 1
            Certificate::truncate();
            Excel::import(new CertificatesImport, $request->my_file);
            return back()->with('success', 'import berhasil & data sebelumnya terhapus');
        } else if ($request->fungsi == 2){
            //fungsi 2
            Excel::import(new CertificatesImport, $request->my_file);
            return back()->with('success', 'import ditambahkan');
        } else {
            abort(404); 
        }
    }

    // fungsi import data
    public function MemberTruncate()
    {
        $truncate = Certificate::truncate();
        if($truncate){
            return back()->with('success', 'Truncate Berhasil');
        } else {
            abort(404);
        }
    }

    // fungsi sertifikat digital
    public function getCertificate(Request $request)
    {
        $user = Certificate::find($request->user_id);
        $name = $user->nama;
        $im = imagecreatefrompng('certificate/certificate-1.png');
        $font_family = public_path('fonts/Roboto-Regular.ttf');
        $box = new Box($im);
        $box->setFontFace($font_family);
        $box->setFontColor(new Color(0,0,0,0));
        $box->setFontSize(100);
        $box->setBox(
            0,
            -80,
            imagesx($im),
            imagesy($im)
        );
        $box->setTextAlign('center','center');
        $box->draw($name);

        header("content-type: image/png");
        imagepng($im);
    }
}
