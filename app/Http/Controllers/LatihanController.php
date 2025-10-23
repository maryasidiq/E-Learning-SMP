<?php

namespace App\Http\Controllers;

use Auth;
use App\Guru;
use App\Jadwal;
use App\Kelas;
use App\Mapel;
use App\Latihan;
use App\SoalLatihan;
use App\JawabanLatihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class LatihanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guru = Guru::where('id_card', Auth::user()->id_card)->first();
        $latihan = Latihan::where('guru_id', $guru->id)->orderBy('created_at', 'desc')->get();
        return view('guru.latihan.index', compact('latihan', 'guru'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $guru = Guru::where('id_card', Auth::user()->id_card)->first();
        $jadwal = Jadwal::where('guru_id', $guru->id)->with('mapel', 'kelas')->get();
        $mapelKelas = $jadwal->map(function ($j) {
            return (object) [
                'mapel_id' => $j->mapel_id,
                'kelas_id' => $j->kelas_id,
                'nama_mapel' => $j->mapel->nama_mapel,
                'nama_kelas' => $j->kelas->nama_kelas,
            ];
        });
        return view('guru.latihan.create', compact('guru', 'mapelKelas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'mapel_kelas' => 'required|string',
            'waktu_mulai' => 'required|date',
            'waktu_selesai' => 'required|date|after:waktu_mulai',
            'durasi' => 'required|integer|min:1',
            'soal' => 'nullable|array',
            'soal.*.tipe' => 'required_with:soal|in:pilihan_ganda,essay',
            'soal.*.pertanyaan' => 'required_with:soal|string',
            'soal.*.pilihan_a' => 'nullable|string',
            'soal.*.pilihan_b' => 'nullable|string',
            'soal.*.pilihan_c' => 'nullable|string',
            'soal.*.pilihan_d' => 'nullable|string',
            'soal.*.pilihan_e' => 'nullable|string',
            'soal.*.jawaban_benar' => 'nullable|string',
            'soal.*.bobot' => 'required_with:soal|integer|min:1',
        ]);

        $guru = Guru::where('id_card', Auth::user()->id_card)->first();
        list($mapel_id, $kelas_id) = explode('-', $request->mapel_kelas);

        $latihan = Latihan::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'guru_id' => $guru->id,
            'kelas_id' => $kelas_id,
            'mapel_id' => $mapel_id,
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_selesai' => $request->waktu_selesai,
            'durasi' => $request->durasi,
        ]);

        // Save soal if provided
        if ($request->has('soal') && is_array($request->soal)) {
            foreach ($request->soal as $soalData) {
                SoalLatihan::create([
                    'latihan_id' => $latihan->id,
                    'tipe' => $soalData['tipe'],
                    'pertanyaan' => $soalData['pertanyaan'],
                    'pilihan_a' => $soalData['pilihan_a'] ?? null,
                    'pilihan_b' => $soalData['pilihan_b'] ?? null,
                    'pilihan_c' => $soalData['pilihan_c'] ?? null,
                    'pilihan_d' => $soalData['pilihan_d'] ?? null,
                    'pilihan_e' => $soalData['pilihan_e'] ?? null,
                    'jawaban_benar' => $soalData['jawaban_benar'] ?? null,
                    'bobot' => $soalData['bobot'],
                ]);
            }
        }

        return redirect()->route('latihan.index')->with('success', 'Latihan berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $id = Crypt::decrypt($id);
        $latihan = Latihan::findOrFail($id);
        $soal = SoalLatihan::where('latihan_id', $id)->get();
        return view('guru.latihan.show', compact('latihan', 'soal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $id = Crypt::decrypt($id);
        $latihan = Latihan::findOrFail($id);
        $soal = SoalLatihan::where('latihan_id', $id)->get();
        $guru = Guru::where('id_card', Auth::user()->id_card)->first();
        $jadwal = Jadwal::where('guru_id', $guru->id)->with('mapel', 'kelas')->get();
        $mapelKelas = $jadwal->map(function ($j) {
            return (object) [
                'mapel_id' => $j->mapel_id,
                'kelas_id' => $j->kelas_id,
                'nama_mapel' => $j->mapel->nama_mapel,
                'nama_kelas' => $j->kelas->nama_kelas,
            ];
        });
        return view('guru.latihan.edit', compact('latihan', 'soal', 'guru', 'mapelKelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $id = Crypt::decrypt($id);
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'mapel_kelas' => 'required|string',
            'waktu_mulai' => 'required|date',
            'waktu_selesai' => 'required|date|after:waktu_mulai',
            'durasi' => 'required|integer|min:1',
            'soal' => 'nullable|array',
            'soal.*.tipe' => 'required_with:soal|in:pilihan_ganda,essay',
            'soal.*.pertanyaan' => 'required_with:soal|string',
            'soal.*.pilihan_a' => 'nullable|string',
            'soal.*.pilihan_b' => 'nullable|string',
            'soal.*.pilihan_c' => 'nullable|string',
            'soal.*.pilihan_d' => 'nullable|string',
            'soal.*.pilihan_e' => 'nullable|string',
            'soal.*.jawaban_benar' => 'nullable|string',
            'soal.*.bobot' => 'required_with:soal|integer|min:1',
            'existing_soal' => 'nullable|array',
            'existing_soal.*.id' => 'required_with:existing_soal|integer|exists:soal_latihan,id',
            'existing_soal.*.tipe' => 'required_with:existing_soal|in:pilihan_ganda,essay',
            'existing_soal.*.pertanyaan' => 'required_with:existing_soal|string',
            'existing_soal.*.pilihan_a' => 'nullable|string',
            'existing_soal.*.pilihan_b' => 'nullable|string',
            'existing_soal.*.pilihan_c' => 'nullable|string',
            'existing_soal.*.pilihan_d' => 'nullable|string',
            'existing_soal.*.pilihan_e' => 'nullable|string',
            'existing_soal.*.jawaban_benar' => 'nullable|string',
            'existing_soal.*.bobot' => 'required_with:existing_soal|integer|min:1',
            'delete_soal' => 'nullable|array',
            'delete_soal.*' => 'integer|exists:soal_latihan,id',
        ]);

        $latihan = Latihan::findOrFail($id);
        list($mapel_id, $kelas_id) = explode('-', $request->mapel_kelas);
        $latihan->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'kelas_id' => $kelas_id,
            'mapel_id' => $mapel_id,
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_selesai' => $request->waktu_selesai,
            'durasi' => $request->durasi,
        ]);

        // Handle existing soal updates
        if ($request->has('existing_soal') && is_array($request->existing_soal)) {
            foreach ($request->existing_soal as $soalData) {
                $soal = SoalLatihan::findOrFail($soalData['id']);
                $soal->update([
                    'tipe' => $soalData['tipe'],
                    'pertanyaan' => $soalData['pertanyaan'],
                    'pilihan_a' => $soalData['pilihan_a'] ?? null,
                    'pilihan_b' => $soalData['pilihan_b'] ?? null,
                    'pilihan_c' => $soalData['pilihan_c'] ?? null,
                    'pilihan_d' => $soalData['pilihan_d'] ?? null,
                    'pilihan_e' => $soalData['pilihan_e'] ?? null,
                    'jawaban_benar' => $soalData['jawaban_benar'] ?? null,
                    'bobot' => $soalData['bobot'],
                ]);
            }
        }

        // Handle new soal
        if ($request->has('soal') && is_array($request->soal)) {
            foreach ($request->soal as $soalData) {
                SoalLatihan::create([
                    'latihan_id' => $id,
                    'tipe' => $soalData['tipe'],
                    'pertanyaan' => $soalData['pertanyaan'],
                    'pilihan_a' => $soalData['pilihan_a'] ?? null,
                    'pilihan_b' => $soalData['pilihan_b'] ?? null,
                    'pilihan_c' => $soalData['pilihan_c'] ?? null,
                    'pilihan_d' => $soalData['pilihan_d'] ?? null,
                    'pilihan_e' => $soalData['pilihan_e'] ?? null,
                    'jawaban_benar' => $soalData['jawaban_benar'] ?? null,
                    'bobot' => $soalData['bobot'],
                ]);
            }
        }

        // Handle soal deletion
        if ($request->has('delete_soal') && is_array($request->delete_soal)) {
            foreach ($request->delete_soal as $soalId) {
                $soal = SoalLatihan::findOrFail($soalId);
                $soal->delete();
            }
        }

        return redirect()->route('latihan.index')->with('success', 'Latihan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $id = Crypt::decrypt($id);
        $latihan = Latihan::findOrFail($id);
        $latihan->delete();

        return redirect()->route('latihan.index')->with('success', 'Latihan berhasil dihapus!');
    }

    public function nilai(string $id)
    {
        $id = Crypt::decrypt($id);
        $latihan = Latihan::findOrFail($id);

        // Get all student answers for this latihan with student info
        $jawabanSiswa = JawabanLatihan::where('latihan_id', $id)
            ->with(['siswa', 'soalLatihan'])
            ->get()
            ->groupBy('siswa_id');

        // Calculate scores for each student
        $nilaiSiswa = collect([]);
        $nilaiArray = [];
        $lulusCount = 0;
        $remedialCount = 0;
        $tidakLulusCount = 0;

        foreach ($jawabanSiswa as $siswaId => $jawaban) {
            $siswa = $jawaban->first()->siswa;
            $nilaiAkhir = $jawaban->first()->nilai_akhir ?? 0;

            $nilaiArray[] = $nilaiAkhir;

            if ($nilaiAkhir >= 70) {
                $lulusCount++;
            } elseif ($nilaiAkhir >= 50) {
                $remedialCount++;
            } else {
                $tidakLulusCount++;
            }

            $nilaiSiswa->push([
                'siswa' => $siswa,
                'nilai_akhir' => $nilaiAkhir,
                'jumlah_soal' => $jawaban->count(),
                'jawaban' => $jawaban
            ]);
        }

        // Calculate statistics for charts
        $totalSiswa = count($nilaiArray);
        $rataRata = $totalSiswa > 0 ? array_sum($nilaiArray) / $totalSiswa : 0;
        $nilaiTertinggi = $totalSiswa > 0 ? max($nilaiArray) : 0;
        $nilaiTerendah = $totalSiswa > 0 ? min($nilaiArray) : 0;

        // Prepare chart data
        $chartData = [
            'labels' => ['Lulus (≥70)', 'Remedial (50-69)', 'Tidak Lulus (<50)'],
            'data' => [$lulusCount, $remedialCount, $tidakLulusCount],
            'backgroundColor' => ['#10B981', '#F59E0B', '#EF4444'],
            'borderColor' => ['#059669', '#D97706', '#DC2626'],
        ];

        // Score distribution for histogram (group by ranges)
        $scoreRanges = ['0-19', '20-39', '40-59', '60-69', '70-79', '80-89', '90-100'];
        $scoreDistribution = array_fill(0, 7, 0);

        foreach ($nilaiArray as $nilai) {
            if ($nilai < 20)
                $scoreDistribution[0]++;
            elseif ($nilai < 40)
                $scoreDistribution[1]++;
            elseif ($nilai < 60)
                $scoreDistribution[2]++;
            elseif ($nilai < 70)
                $scoreDistribution[3]++;
            elseif ($nilai < 80)
                $scoreDistribution[4]++;
            elseif ($nilai < 90)
                $scoreDistribution[5]++;
            else
                $scoreDistribution[6]++;
        }

        $histogramData = [
            'labels' => $scoreRanges,
            'data' => $scoreDistribution,
        ];

        return view('guru.latihan.nilai', compact(
            'latihan',
            'nilaiSiswa',
            'chartData',
            'histogramData',
            'rataRata',
            'nilaiTertinggi',
            'nilaiTerendah',
            'totalSiswa'
        ));
    }

    public function toggleNilaiVisibility(Request $request, string $id)
    {
        $id = Crypt::decrypt($id);
        $latihan = Latihan::findOrFail($id);

        // Toggle the show_nilai field
        $latihan->update([
            'show_nilai' => !$latihan->show_nilai
        ]);

        return redirect()->route('latihan.nilai', Crypt::encrypt($id))->with('success', 'Visibilitas nilai berhasil diubah!');
    }

    public function createSoal($id)
    {
        $id = Crypt::decrypt($id);
        $latihan = Latihan::findOrFail($id);
        $csrf = csrf_token();
        return view('guru.latihan.create_soal', compact('latihan', 'csrf'));
    }

    public function storeSoal(Request $request, $id)
    {
        $id = Crypt::decrypt($id);
        $request->validate([
            'soal' => 'required|array|min:1',
            'soal.*.tipe' => 'required|in:pilihan_ganda,essay',
            'soal.*.pertanyaan' => 'required|string',
            'soal.*.pilihan_a' => 'nullable|string',
            'soal.*.pilihan_b' => 'nullable|string',
            'soal.*.pilihan_c' => 'nullable|string',
            'soal.*.pilihan_d' => 'nullable|string',
            'soal.*.pilihan_e' => 'nullable|string',
            'soal.*.jawaban_benar' => 'nullable|string',
            'soal.*.bobot' => 'required|integer|min:1',
        ]);

        foreach ($request->soal as $soalData) {
            SoalLatihan::create([
                'latihan_id' => $id,
                'tipe' => $soalData['tipe'],
                'pertanyaan' => $soalData['pertanyaan'],
                'pilihan_a' => $soalData['pilihan_a'] ?? null,
                'pilihan_b' => $soalData['pilihan_b'] ?? null,
                'pilihan_c' => $soalData['pilihan_c'] ?? null,
                'pilihan_d' => $soalData['pilihan_d'] ?? null,
                'pilihan_e' => $soalData['pilihan_e'] ?? null,
                'jawaban_benar' => $soalData['jawaban_benar'] ?? null,
                'bobot' => $soalData['bobot'],
            ]);
        }

        return redirect()->route('latihan.show', Crypt::encrypt($id))->with('success', 'Soal berhasil ditambahkan!');
    }

    public function editSoal($latihan_id, $soal_id)
    {
        $latihan_id = Crypt::decrypt($latihan_id);
        $soal_id = Crypt::decrypt($soal_id);
        $latihan = Latihan::findOrFail($latihan_id);
        $soal = SoalLatihan::findOrFail($soal_id);
        return view('guru.latihan.edit_soal', compact('latihan', 'soal'));
    }

    public function updateSoal(Request $request, $latihan_id, $soal_id)
    {
        $latihan_id = Crypt::decrypt($latihan_id);
        $soal_id = Crypt::decrypt($soal_id);
        $request->validate([
            'tipe' => 'required|in:pilihan_ganda,essay',
            'pertanyaan' => 'required|string',
            'pilihan_a' => 'nullable|string',
            'pilihan_b' => 'nullable|string',
            'pilihan_c' => 'nullable|string',
            'pilihan_d' => 'nullable|string',
            'pilihan_e' => 'nullable|string',
            'jawaban_benar' => 'nullable|string',
            'bobot' => 'required|integer|min:1',
        ]);

        $soal = SoalLatihan::findOrFail($soal_id);
        $soal->update($request->all());

        return redirect()->route('latihan.show', Crypt::encrypt($latihan_id))->with('success', 'Soal berhasil diperbarui!');
    }

    public function destroySoal($latihan_id, $soal_id)
    {
        $latihan_id = Crypt::decrypt($latihan_id);
        $soal_id = Crypt::decrypt($soal_id);
        $soal = SoalLatihan::findOrFail($soal_id);
        $soal->delete();

        return redirect()->route('latihan.show', Crypt::encrypt($latihan_id))->with('success', 'Soal berhasil dihapus!');
    }

    public function generateSoalFromExcel(Request $request)
    {
        $request->validate([
            'excel_file' => 'required|file|mimes:xlsx,xls|max:10240', // 10MB max
            'jumlah_soal' => 'required|integer|min:1|max:50',
        ]);

        // Generate unique cache key
        $cacheKey = 'excel_soal_' . uniqid();

        // Store file temporarily
        $excelPath = $request->file('excel_file')->store('temp', 'local');
        $fullPath = storage_path('app/' . $excelPath);

        // Process directly without queue
        $job = new \App\Jobs\GenerateSoalFromExcel($fullPath, $request->jumlah_soal, $cacheKey);
        $job->handle();

        return response()->json([
            'success' => true,
            'cache_key' => $cacheKey,
            'message' => 'Excel sedang diproses. Silakan tunggu...',
        ]);
    }

    public function checkGenerateStatus(Request $request)
    {
        $cacheKey = $request->input('cache_key');

        if (!$cacheKey) {
            return response()->json([
                'success' => false,
                'message' => 'Cache key tidak ditemukan',
            ]);
        }

        $result = \Illuminate\Support\Facades\Cache::get($cacheKey);

        if ($result) {
            // Clear cache after retrieval
            \Illuminate\Support\Facades\Cache::forget($cacheKey);
            return response()->json($result);
        }

        return response()->json([
            'success' => false,
            'message' => 'Masih diproses...',
            'processing' => true,
        ]);
    }
}
