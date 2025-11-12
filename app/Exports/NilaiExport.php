<?php

namespace App\Exports;

use App\NilaiTotal;
use App\NilaiAkhir;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class NilaiExport implements FromCollection, WithHeadings
{
    protected $mapel_id;

    public function __construct($mapel_id)
    {
        $this->mapel_id = $mapel_id;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $nilaiTotal = NilaiTotal::where('mapel_id', $this->mapel_id)
            ->with(['siswa', 'mapel'])
            ->get();

        return $nilaiTotal->map(function ($nilai) {
            $nilaiDetails = json_decode($nilai->nilai_details, true) ?? [];

            // Prepare row data
            $row = [
                'Nama Siswa' => $nilai->siswa->nama_siswa ?? '',
                'NIS' => $nilai->siswa->no_induk ?? '',
                'Mata Pelajaran' => $nilai->mapel->nama_mapel ?? '',
                'Rata-rata' => $nilai->rata_rata ?? 0,
            ];

            // Add individual nilai columns
            foreach ($nilaiDetails as $detail) {
                $judul = $detail['judul_nilai'] ?? 'Unknown';
                $row[$judul] = $detail['nilai'] ?? 0;
            }

            return $row;
        });
    }

    public function headings(): array
    {
        $nilaiTotal = NilaiTotal::where('mapel_id', $this->mapel_id)->first();
        $headings = ['Nama Siswa', 'NIS', 'Mata Pelajaran', 'Rata-rata'];

        if ($nilaiTotal) {
            $nilaiDetails = json_decode($nilaiTotal->nilai_details, true) ?? [];
            foreach ($nilaiDetails as $detail) {
                $headings[] = $detail['judul_nilai'] ?? 'Unknown';
            }
        }

        return $headings;
    }
}
