<?php

namespace App\Imports;

use App\Models\Certificate;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Row;

class CertificatesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $nama = Certificate::where('nama', $row[1])->first();
        $tema = Certificate::where('nama', $row[2])->first();
        if(empty($name) || empty ($tema)){
            return new Certificate([
                //
                'sertifikat_id' => $row[0],
                'nama' => $row[1],
                'lokasi' => $row[2],
                'tema' => $row[3],
                'tanggal' => $row[4],
            ]);
        }
    }
}
