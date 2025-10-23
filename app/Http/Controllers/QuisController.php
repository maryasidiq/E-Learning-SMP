<?php

namespace App\Http\Controllers;

use Auth;
use App\Guru;
use App\Jadwal;
use App\Kelas;
use App\Mapel;
use App\Quis;
use App\SoalQuis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class QuisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guru = Guru::where('id_card', Auth::user()->id_card)->first();
        $quis = Quis::where('guru_id', $guru->id)->orderBy('created_at', 'desc')->get();
        return view('guru.quis.index', compact('quis', 'guru'));
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
        return view('guru.quis.create', compact('guru', 'mapelKelas'));
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

        $quis = Quis::create([
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
                SoalQuis::create([
                    'quis_id' => $quis->id,
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

        return redirect()->route('quis.index')->with('success', 'Quis berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $id = Crypt::decrypt($id);
        $quis = Quis::findOrFail($id);
        $soal = SoalQuis::where('quis_id', $id)->get();
        return view('guru.quis.show', compact('quis', 'soal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $id = Crypt::decrypt($id);
        $quis = Quis::findOrFail($id);
        $soal = SoalQuis::where('quis_id', $id)->get();
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
        return view('guru.quis.edit', compact('quis', 'soal', 'guru', 'mapelKelas'));
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
            'existing_soal.*.id' => 'required_with:existing_soal|integer|exists:soal_quis,id',
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
            'delete_soal.*' => 'integer|exists:soal_quis,id',
        ]);

        $quis = Quis::findOrFail($id);
        list($mapel_id, $kelas_id) = explode('-', $request->mapel_kelas);
        $quis->update([
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
                $soal = SoalQuis::findOrFail($soalData['id']);
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
                SoalQuis::create([
                    'quis_id' => $id,
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
                $soal = SoalQuis::findOrFail($soalId);
                $soal->delete();
            }
        }

        return redirect()->route('quis.index')->with('success', 'Quis berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $id = Crypt::decrypt($id);
        $quis = Quis::findOrFail($id);
        $quis->delete();

        return redirect()->route('quis.index')->with('success', 'Quis berhasil dihapus!');
    }

    public function createSoal($id)
    {
        $id = Crypt::decrypt($id);
        $quis = Quis::findOrFail($id);
        return view('guru.quis.create_soal', compact('quis'));
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
            SoalQuis::create([
                'quis_id' => $id,
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

        return redirect()->route('quis.show', Crypt::encrypt($id))->with('success', 'Soal berhasil ditambahkan!');
    }

    public function editSoal($quis_id, $soal_id)
    {
        $quis_id = Crypt::decrypt($quis_id);
        $soal_id = Crypt::decrypt($soal_id);
        $quis = Quis::findOrFail($quis_id);
        $soal = SoalQuis::findOrFail($soal_id);
        return view('guru.quis.edit_soal', compact('quis', 'soal'));
    }

    public function updateSoal(Request $request, $quis_id, $soal_id)
    {
        $quis_id = Crypt::decrypt($quis_id);
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

        $soal = SoalQuis::findOrFail($soal_id);
        $soal->update($request->all());

        return redirect()->route('quis.show', Crypt::encrypt($quis_id))->with('success', 'Soal berhasil diperbarui!');
    }

    public function destroySoal($quis_id, $soal_id)
    {
        $quis_id = Crypt::decrypt($quis_id);
        $soal_id = Crypt::decrypt($soal_id);
        $soal = SoalQuis::findOrFail($soal_id);
        $soal->delete();

        return redirect()->route('quis.show', Crypt::encrypt($quis_id))->with('success', 'Soal berhasil dihapus!');
    }

    public function generateSoalFromPDF(Request $request)
    {
        $request->validate([
            'pdf_file' => 'required|file|mimes:pdf|max:10240', // 10MB max
            'jumlah_soal' => 'required|integer|min:1|max:50',
        ]);

        // Generate unique cache key
        $cacheKey = 'pdf_soal_' . uniqid();

        // Store file temporarily
        $pdfPath = $request->file('pdf_file')->store('temp', 'local');
        $fullPath = storage_path('app/' . $pdfPath);

        // Dispatch job
        \App\Jobs\GenerateSoalFromPDF::dispatch($fullPath, $request->jumlah_soal, $cacheKey, 'quis');

        return response()->json([
            'success' => true,
            'cache_key' => $cacheKey,
            'message' => 'PDF sedang diproses. Silakan tunggu...',
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
