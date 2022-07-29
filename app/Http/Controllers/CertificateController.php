<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function search(Request $request)
    {
        if ($request->search == null) {
            return view('/sertifikat');
        }
        $certificate = Certificate::all()->where('sertifikat_id','=',($request->search));
        return view('sertifikat',['sertifikat'=>$certificate]);
    }
}
