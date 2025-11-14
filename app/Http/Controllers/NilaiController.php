<?php

namespace App\Http\Controllers;

use Auth;
use App\Guru;
use App\Siswa;
use App\Kelas;
use App\Jadwal;
use App\Nilai;
use App\NilaiAkhir;
use App\NilaiTotal;
use App\Soal;
use App\JawabanSoal;
use App\Exports\NilaiExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource. (Mapel selection)
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guru = Guru::where('id_card', Auth::user()->id_card)->first();
        $jadwal = Jadwal::where('guru_id', $guru->id)->orderBy('mapel_id')->get();
        $mapel = $jadwal->groupBy('mapel_id');
        return view('guru.nilai.mapel', compact('mapel', 'guru'));
    }

    /**
     * Show the form for creating a new resource. (Kelas selection)
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::orderBy('nama_kelas')->get();
        return view('admin.nilai.home', compact('kelas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            '*.siswa_id' => 'required',
            '*.mapel_id' => 'required',
            '*.judul_nilai' => 'required|string',
            '*.nilai' => 'nullable|numeric|min:0|max:100',
            '*.sumber' => 'required|in:manual,soal',
            '*.bobot' => 'required|integer|min:1',
            '*.soal' => 'nullable|integer',
        ]);

        $data = $request->all();
        if (!is_array($data)) {
            $data = [$data];
        }

        foreach ($data as $item) {
            if ($item['sumber'] == 'soal') {
                if (!isset($item['soal']) || empty($item['soal'])) {
                    return response()->json(['error' => 'Soal harus dipilih!']);
                }
                // Calculate average from JawabanSoal for the soal
                $soal = Soal::find($item['soal']);
                if ($soal) {
                    $jawaban = JawabanSoal::where('soal_id', $soal->id)->where('siswa_id', $item['siswa_id'])->get();
                    $nilai = $jawaban->avg('nilai_akhir') ?? 0;
                } else {
                    return response()->json(['error' => 'Soal tidak ditemukan!']);
                }
            } else {
                $nilai = $item['nilai'];
            }

            NilaiAkhir::updateOrCreate(
                [
                    'siswa_id' => $item['siswa_id'],
                    'mapel_id' => $item['mapel_id'],
                    'judul_nilai' => $item['judul_nilai'],
                ],
                [
                    'nilai' => $nilai,
                    'sumber' => $item['sumber'],
                    'bobot' => $item['bobot'],
                    'soal_id' => $item['soal'] ?? null,
                ]
            );

            // Calculate rata-rata
            $this->calculateRataRata($item['siswa_id'], $item['mapel_id']);
        }

        return response()->json(['success' => 'Nilai berhasil disimpan!']);
    }

    /**
     * Display the specified resource. (Nilai entry for mapel)
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $mapel_id = Crypt::decrypt($id);
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            $mapel_id = $id;
        }
        $guru = Guru::where('id_card', Auth::user()->id_card)->first();
        $mapel = Jadwal::where('guru_id', $guru->id)->where('mapel_id', $mapel_id)->first();
        if (!$mapel) {
            abort(404, 'Mapel tidak ditemukan atau tidak diajarkan oleh guru ini.');
        }
        $kelas = Kelas::whereHas('jadwal', function ($query) use ($guru, $mapel_id) {
            $query->where('guru_id', $guru->id)->where('mapel_id', $mapel_id);
        })->with('guru')->get();
        $siswa = Siswa::whereIn('kelas_id', $kelas->pluck('id'))->get();

        // Get existing nilai data for this mapel
        $existingNilai = NilaiAkhir::where('mapel_id', $mapel_id)->get()->groupBy(['judul_nilai', 'siswa_id']);

        // Get nilai soal data for all soal in this mapel
        $soalList = Soal::where('mapel_id', $mapel_id)->get();
        $nilaiSoal = [];
        foreach ($soalList as $soal) {
            $jawaban = JawabanSoal::where('soal_id', $soal->id)->get();
            foreach ($jawaban as $j) {
                $nilaiSoal[] = [
                    'judul' => $soal->judul,
                    'siswa_id' => $j->siswa_id,
                    'nilai' => $j->nilai_akhir
                ];
            }
        }

        // Get soal map for display
        $soalMap = Soal::where('mapel_id', $mapel_id)->pluck('judul', 'id')->toArray();

        return view('guru.nilai.nilai', compact('guru', 'mapel', 'kelas', 'siswa', 'nilaiSoal', 'existingNilai', 'soalMap'));
    }

    /**
     * Show the form for creating a new nilai entry.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function createNilai($id)
    {
        try {
            $id = Crypt::decrypt($id);
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            // If decryption fails, assume $id is already plain
        }
        $guru = Guru::where('id_card', Auth::user()->id_card)->first();
        $mapel = Jadwal::where('guru_id', $guru->id)->where('mapel_id', $id)->first();
        if (!$mapel) {
            abort(404, 'Mapel tidak ditemukan atau tidak diajarkan oleh guru ini.');
        }
        $kelas = Kelas::whereHas('jadwal', function ($query) use ($guru, $id) {
            $query->where('guru_id', $guru->id)->where('mapel_id', $id);
        })->with('guru')->get();
        $siswa = Siswa::whereIn('kelas_id', $kelas->pluck('id'))->get();

        return view('guru.nilai.tambah', compact('guru', 'mapel', 'kelas', 'siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($siswa_id, $mapel_id)
    {
        $siswa = Siswa::findOrFail($siswa_id);
        $mapel = Jadwal::where('mapel_id', $mapel_id)->firstOrFail();
        $existingNilai = NilaiAkhir::where('siswa_id', $siswa_id)->where('mapel_id', $mapel_id)->get()->groupBy('judul_nilai');
        return view('guru.nilai.edit', compact('siswa', 'mapel', 'existingNilai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $siswa_id)
    {
        $request->validate([
            'nilai.*' => 'nullable|numeric|min:0|max:100',
            'bobot.*' => 'required|integer|min:1',
            'sumber.*' => 'nullable|in:manual,soal',
            'soal.*' => 'nullable|integer',
        ]);

        foreach ($request->nilai as $nilaiId => $nilai) {
            // Get current nilai record to preserve sumber and soal_id if not provided
            $currentNilai = NilaiAkhir::find($nilaiId);
            if (!$currentNilai) {
                continue;
            }

            $sumber = $request->sumber[$nilaiId] ?? $currentNilai->sumber;
            $soalId = $request->soal[$nilaiId] ?? $currentNilai->soal_id;

            if ($sumber == 'soal') {
                if (!$soalId) {
                    return response()->json(['error' => 'Soal harus dipilih untuk sumber soal!']);
                }
                // Calculate average from JawabanSoal for the soal
                $soal = Soal::find($soalId);
                if ($soal) {
                    $jawaban = JawabanSoal::where('soal_id', $soal->id)->where('siswa_id', $siswa_id)->get();
                    $nilai = $jawaban->avg('nilai_akhir') ?? 0;
                } else {
                    return response()->json(['error' => 'Soal tidak ditemukan!']);
                }
            } else {
                $nilai = $nilai ?? 0;
            }

            NilaiAkhir::where('id', $nilaiId)->update([
                'nilai' => $nilai,
                'bobot' => $request->bobot[$nilaiId],
                'sumber' => $sumber,
                'soal_id' => $soalId,
            ]);
        }

        // Recalculate rata-rata
        $nilaiAkhir = NilaiAkhir::where('siswa_id', $siswa_id)->first();
        if ($nilaiAkhir) {
            $this->calculateRataRata($siswa_id, $nilaiAkhir->mapel_id);
        }

        return response()->json(['success' => 'Nilai berhasil diperbarui!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $request->validate([
            'judul_nilai' => 'required|string',
        ]);

        $judulNilai = $request->judul_nilai;

        // Delete nilai entries with the specified judul_nilai and mapel_id
        NilaiAkhir::where('judul_nilai', $judulNilai)->where('mapel_id', $id)->delete();

        // Recalculate rata-rata for all affected siswa
        $affectedSiswa = NilaiAkhir::where('mapel_id', $id)->distinct('siswa_id')->pluck('siswa_id');
        foreach ($affectedSiswa as $siswaId) {
            $this->calculateRataRata($siswaId, $id);
        }

        return redirect()->route('nilai.show', $id)->with('success', 'Nilai berhasil dihapus!');
    }

    public function mapel()
    {
        $guru = Guru::where('id_card', Auth::user()->id_card)->first();
        $jadwal = Jadwal::where('guru_id', $guru->id)->orderBy('mapel_id')->get();
        $mapel = $jadwal->groupBy('mapel_id');
        return view('guru.nilai.mapel', compact('mapel', 'guru'));
    }

    /**
     * Show the form for deleting nilai entries.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function hapusNilai($id)
    {
        try {
            $id = Crypt::decrypt($id);
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            // If decryption fails, assume $id is already plain
        }
        $guru = Guru::where('id_card', Auth::user()->id_card)->first();
        $mapel = Jadwal::where('guru_id', $guru->id)->where('mapel_id', $id)->first();
        if (!$mapel) {
            abort(404, 'Mapel tidak ditemukan atau tidak diajarkan oleh guru ini.');
        }
        $kelas = Kelas::whereHas('jadwal', function ($query) use ($guru, $id) {
            $query->where('guru_id', $guru->id)->where('mapel_id', $id);
        })->with('guru')->get();
        $siswa = Siswa::whereIn('kelas_id', $kelas->pluck('id'))->get();

        // Get existing nilai data for this mapel
        $existingNilai = NilaiAkhir::where('mapel_id', $id)->get()->groupBy(['judul_nilai', 'siswa_id']);

        return view('guru.nilai.hapus', compact('guru', 'mapel', 'kelas', 'siswa', 'existingNilai'));
    }

    /**
     * Show the form for editing all nilai entries.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editAllNilai($id)
    {
        try {
            $id = Crypt::decrypt($id);
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            // If decryption fails, assume $id is already plain
        }
        $guru = Guru::where('id_card', Auth::user()->id_card)->first();
        $mapel = Jadwal::where('guru_id', $guru->id)->where('mapel_id', $id)->first();
        if (!$mapel) {
            abort(404, 'Mapel tidak ditemukan atau tidak diajarkan oleh guru ini.');
        }
        $kelas = Kelas::whereHas('jadwal', function ($query) use ($guru, $id) {
            $query->where('guru_id', $guru->id)->where('mapel_id', $id);
        })->with('guru')->get();
        $siswa = Siswa::whereIn('kelas_id', $kelas->pluck('id'))->get();

        // Get existing nilai data for this mapel
        $existingNilai = NilaiAkhir::where('mapel_id', $id)->get()->groupBy(['judul_nilai', 'siswa_id']);

        return view('guru.nilai.edit.all', compact('guru', 'mapel', 'kelas', 'siswa', 'existingNilai'));
    }

    /**
     * Update all nilai entries in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function updateAllNilai(Request $request, $id)
    {
        $data = $request->all();

        if (!is_array($data)) {
            return response()->json(['error' => 'Format data tidak valid'], 400);
        }

        try {
            foreach ($data as $item) {
                $siswaId = $item['siswa_id'] ?? null;
                $judulLama = $item['judul_lama'] ?? null;
                $judulBaru = $item['judul_nilai'] ?? null;
                $nilai = $item['nilai'] ?? 0;
                $sumber = $item['sumber'] ?? 'manual';
                $bobot = $item['bobot'] ?? 1;
                $soalId = $item['soal'] ?? null;

                if (!$siswaId || !$judulLama) {
                    continue;
                }

                // Jika sumber nilai dari soal, ambil dari jawaban soal
                if ($sumber === 'soal') {
                    if (!$soalId) {
                        return response()->json(['error' => 'Soal harus dipilih untuk sumber soal!'], 400);
                    }

                    $jawaban = \App\JawabanSoal::where('soal_id', $soalId)
                        ->where('siswa_id', $siswaId)
                        ->get();

                    $nilai = $jawaban->avg('nilai_akhir') ?? 0;
                }

                // Update existing record by judul_lama
                \App\NilaiAkhir::where('siswa_id', $siswaId)
                    ->where('mapel_id', $id)
                    ->where('judul_nilai', $judulLama)
                    ->update([
                        'judul_nilai' => $judulBaru,
                        'nilai' => $nilai,
                        'sumber' => $sumber,
                        'bobot' => $bobot,
                        'soal_id' => $soalId,
                    ]);

                $this->calculateRataRata($siswaId, $id);
            }

            return response()->json(['success' => 'Semua nilai berhasil diperbarui!']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    /**
     * Display nilai for siswa.
     *
     * @return \Illuminate\Http\Response
     */
    public function siswa()
    {
        $siswa = Siswa::where('no_induk', Auth::user()->no_induk)->first();
        $nilaiTotal = NilaiTotal::where('siswa_id', $siswa->id)->with('mapel')->get();
        return view('siswa.nilai.index', compact('nilaiTotal', 'siswa'));
    }

    /**
     * Show detail nilai for siswa.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detailNilai($id)
    {
        $siswa = Siswa::where('no_induk', Auth::user()->no_induk)->first();
        $nilaiTotal = NilaiTotal::where('id', $id)->where('siswa_id', $siswa->id)->with('mapel')->first();

        if (!$nilaiTotal) {
            abort(404, 'Nilai tidak ditemukan');
        }

        $nilaiDetails = json_decode($nilaiTotal->nilai_details, true) ?? [];

        return view('siswa.nilai.detail', compact('nilaiTotal', 'nilaiDetails'));
    }

    /**
     * Show mapel selection for admin/operator.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminMapel()
    {
        $gurus = \App\Guru::with(['jadwals.mapel', 'jadwals.kelas'])->get();
        return view('admin.nilai.mapel', compact('gurus'));
    }

    /**
     * Show nilai for admin/operator (readonly).
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function adminShow($id)
    {
        try {
            $id = Crypt::decrypt($id);
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            // If decryption fails, assume $id is already plain
        }

        $mapel = \App\Mapel::findOrFail($id);
        $kelas = \App\Kelas::whereHas('jadwal', function ($query) use ($id) {
            $query->where('mapel_id', $id);
        })->with('guru')->get();
        $siswa = \App\Siswa::whereIn('kelas_id', $kelas->pluck('id'))->get();

        // Get existing nilai data for this mapel
        $existingNilai = \App\NilaiAkhir::where('mapel_id', $id)->get()->groupBy(['judul_nilai', 'siswa_id']);

        return view('admin.nilai.show', compact('mapel', 'kelas', 'siswa', 'existingNilai'));
    }

    /**
     * Export nilai to Excel for admin/operator.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function export($id)
    {
        try {
            $id = Crypt::decrypt($id);
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            // If decryption fails, assume $id is already plain
        }

        $mapel = \App\Mapel::findOrFail($id);
        $filename = 'nilai_' . $mapel->nama_mapel . '_' . date('Y-m-d') . '.xlsx';

        return Excel::download(new NilaiExport($id), $filename);
    }

    /**
     * Export nilai to Excel for guru.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function guruExport($id)
    {
        try {
            $id = Crypt::decrypt($id);
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            // If decryption fails, assume $id is already plain
        }

        $guru = Guru::where('id_card', Auth::user()->id_card)->first();
        $mapel = Jadwal::where('guru_id', $guru->id)->where('mapel_id', $id)->first();
        if (!$mapel) {
            abort(404, 'Mapel tidak ditemukan atau tidak diajarkan oleh guru ini.');
        }

        $mapelData = \App\Mapel::findOrFail($id);
        $filename = 'nilai_' . $mapelData->nama_mapel . '_' . date('Y-m-d') . '.xlsx';

        return Excel::download(new NilaiExport($id), $filename);
    }

    private function calculateRataRata($siswa_id, $mapel_id)
    {
        $nilaiAkhir = NilaiAkhir::where('siswa_id', $siswa_id)->where('mapel_id', $mapel_id)->get();
        $totalBobot = $nilaiAkhir->sum('bobot');
        $totalNilai = $nilaiAkhir->sum(function ($item) {
            return $item->nilai * $item->bobot;
        });
        $rataRata = $totalBobot > 0 ? $totalNilai / $totalBobot : 0;

        // Prepare nilai_details as JSON
        $nilaiDetails = $nilaiAkhir->map(function ($item) {
            return [
                'judul_nilai' => $item->judul_nilai,
                'nilai' => $item->nilai,
                'bobot' => $item->bobot,
                'sumber' => $item->sumber,
            ];
        })->toArray();

        NilaiTotal::updateOrCreate(
            ['siswa_id' => $siswa_id, 'mapel_id' => $mapel_id],
            [
                'rata_rata' => $rataRata,
                'nilai_details' => json_encode($nilaiDetails)
            ]
        );
    }
}
