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
        if($certificate->count() > 0) {
            $pdf = PDF::loadView('/sertifikat.template', ['sertifikat'=>$certificate])
            ->setPaper('a4', 'landscape');
            
            return $pdf->stream();
        } else {
            return view('/sertifikat');
        }
        
    }
}
