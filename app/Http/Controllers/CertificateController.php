<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;
use PDF;

class CertificateController extends Controller
{
    public function verifikasi(Request $request)
    {
        $certificate = Certificate::all()->where('sertifikat_id','=',($request->verifikasi));
        if($certificate->count() > 0) {
            $pdf = PDF::loadView('/sertifikat.template', ['sertifikat'=>$certificate])
            ->setPaper('a4', 'landscape');
            
            return $pdf->stream();
        } else {
            return redirect('/')->with('alert','Data Not Found!');
        }
        
    }
}
