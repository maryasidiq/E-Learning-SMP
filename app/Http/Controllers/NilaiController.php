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
        ]);

        $data = $request->all();
        if (!is_array($data)) {
            $data = [$data];
        }

        foreach ($data as $item) {
            if ($item['sumber'] == 'soal') {
                // Calculate average from JawabanSoal for the soal
                $soal = Soal::where('judul', $item['soal'])->where('mapel_id', $item['mapel_id'])->first();
                if ($soal) {
                    $jawaban = JawabanSoal::where('soal_id', $soal->id)->where('siswa_id', $item['siswa_id'])->get();
                    $nilai = $jawaban->avg('nilai_akhir');
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
        $id = Crypt::decrypt($id);
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

        // Get nilai soal data for all soal in this mapel
        $soalList = Soal::where('mapel_id', $id)->get();
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

        return view('guru.nilai.nilai', compact('guru', 'mapel', 'kelas', 'siswa', 'nilaiSoal', 'existingNilai'));
    }

    /**
     * Show the form for creating a new nilai entry.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function createNilai($id)
    {
        $id = Crypt::decrypt($id);
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
            'nilai.*' => 'required|numeric|min:0|max:100',
            'bobot.*' => 'required|integer|min:1',
            'sumber.*' => 'required|in:manual,soal',
        ]);

        foreach ($request->nilai as $nilaiId => $nilai) {
            NilaiAkhir::where('id', $nilaiId)->update([
                'nilai' => $nilai,
                'bobot' => $request->bobot[$nilaiId],
                'sumber' => $request->sumber[$nilaiId],
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
        $id = Crypt::decrypt($id);
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
        $id = Crypt::decrypt($id);
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
        $request->validate([
            'nilai' => 'required|array',
            'nilai.*.*' => 'required|numeric|min:0|max:100',
            'bobot' => 'required|array',
            'bobot.*.*' => 'required|integer|min:1',
            'sumber' => 'required|array',
            'sumber.*.*' => 'required|in:manual,soal',
        ]);

        foreach ($request->nilai as $siswaId => $judulNilaiData) {
            foreach ($judulNilaiData as $judulNilai => $nilai) {
                $bobot = $request->bobot[$siswaId][$judulNilai];
                $sumber = $request->sumber[$siswaId][$judulNilai];

                NilaiAkhir::updateOrCreate(
                    [
                        'siswa_id' => $siswaId,
                        'mapel_id' => $id,
                        'judul_nilai' => $judulNilai,
                    ],
                    [
                        'nilai' => $nilai,
                        'sumber' => $sumber,
                        'bobot' => $bobot,
                    ]
                );

                // Calculate rata-rata
                $this->calculateRataRata($siswaId, $id);
            }
        }

        return redirect()->route('nilai.show', $id)->with('success', 'Nilai berhasil diperbarui!');
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
