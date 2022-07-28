<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function index()
    {
      $sertifikat = Certificate::all();
      return view('sertifikat', compact(['sertifikat']));
    }
}
