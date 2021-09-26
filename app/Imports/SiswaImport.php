<?php

namespace App\Imports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\ToModel;

class SiswaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Siswa([
            'nama_siswa' => $row[1],
            'ttl' => $row[2],
            'asal_sekolah' => $row[3],
            'nama_ortu' => $row[4],
        ]);
    }
}
