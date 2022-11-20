<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;
use PDF;

class CertificateController extends Controller
{
    public function search(Request $request)
    {
        
        if ($request->search == null) {
            return view('/sertifikat');
        }
        $certificate = Certificate::all()->where('sertifikat_id','=',($request->search));
        // return view('sertifikat',['sertifikat'=>$certificate]);
        
        $pdf = PDF::loadHTML($certificate)
        ->setPaper('a4', 'landscape');
        
        return $pdf->stream();
        
    }
}
