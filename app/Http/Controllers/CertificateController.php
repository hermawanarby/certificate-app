<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;
use PDF;
use GDText\Box;
use GDText\Color;

class CertificateController extends Controller
{
    public function verifikasi(Request $request)
    {
        $certificate = Certificate::all()->where('sertifikat_id','=',($request->verifikasi));
        if($certificate->count() > 0) {
            foreach ($certificate as $s) {
                

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
                $box->draw($s->nama);

                $box = new Box($im);
                $box->setFontFace($font_family);
                $box->setFontColor(new Color(0,0,0,0));
                $box->setFontSize(50);
                $box->setBox(
                    0,
                    -550,
                    imagesx($im),
                    imagesy($im)
                );
                $box->setTextAlign('center','center');
                $box->draw($s->sertifikat_id);

                $box = new Box($im);
                $box->setFontFace($font_family);
                $box->setFontColor(new Color(0,0,0,0));
                $box->setFontSize(50);
                $box->setBox(
                    650,
                    750,
                    imagesx($im),
                    imagesy($im)
                );
                $box->setTextAlign('left','center');
                $box->draw($s->tanggal);

                header("content-type: image/png");
                imagepng($im);
            }
            
        } else {
            return redirect('/')->with('alert','Data Not Found!');
        }
        
    }
}
