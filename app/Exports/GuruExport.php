<?php

namespace App\Exports;

use App\Guru;
use Maatwebsite\Excel\Concerns\FromCollection;

class GuruExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $guru = Guru::with('mapel')->get()->map(function ($guru) {
            return [
                'nama_guru' => $guru->nama_guru,
                'nip' => $guru->nip,
                'jk' => $guru->jk,
                'mapel' => $guru->mapel->pluck('nama_mapel')->join(', ')
            ];
        });
        return $guru;
    }
}
