<?php

namespace App\Http\Controllers;

use App\Soal;
use App\SoalDetail;
use App\JawabanSoal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class SiswaSoalController extends Controller
{
    public function index()
    {
        $siswa = Auth::user()->siswa(Auth::user()->no_induk);
        $soal = Soal::where('kelas_id', $siswa->kelas_id)
            ->where('waktu_mulai', '<=', now())
            ->orderBy('waktu_mulai', 'desc')
            ->get();

        return view('siswa.soal.index', compact('soal'));
    }

    public function show($id)
    {
        $id = Crypt::decrypt($id);
        $soal = Soal::findOrFail($id);
        $siswa = Auth::user()->siswa(Auth::user()->no_induk);

        // Cek apakah soal untuk kelas siswa
        if ($soal->kelas_id != $siswa->kelas_id) {
            abort(403);
        }

        // Cek apakah sudah mengerjakan
        $sudahMengerjakan = JawabanSoal::where('soal_id', $id)
            ->where('siswa_id', $siswa->id)
            ->exists();

        return view('siswa.soal.show', compact('soal', 'sudahMengerjakan'));
    }

    public function kerjakan($id)
    {
        $id = Crypt::decrypt($id);
        $soal = Soal::findOrFail($id);
        $siswa = Auth::user()->siswa(Auth::user()->no_induk);

        // Cek apakah soal untuk kelas siswa
        if ($soal->kelas_id != $siswa->kelas_id) {
            abort(403);
        }

        // Cek waktu mulai dan selesai
        $waktuMulai = \Carbon\Carbon::parse($soal->waktu_mulai);
        $waktuSelesai = \Carbon\Carbon::parse($soal->waktu_selesai);
        $waktuSekarang = now();

        if ($waktuSekarang->lt($waktuMulai)) {
            return redirect()->back()->with('error', 'Soal belum dimulai.');
        }

        if ($waktuSekarang->gt($waktuSelesai)) {
            return redirect()->back()->with('error', 'Waktu soal telah berakhir.');
        }

        // Cek apakah sudah mengerjakan
        $sudahMengerjakan = JawabanSoal::where('soal_id', $id)
            ->where('siswa_id', $siswa->id)
            ->exists();

        if ($sudahMengerjakan) {
            return redirect()->back()->with('error', 'Anda sudah mengerjakan soal ini.');
        }

        $soalDetail = SoalDetail::where('soal_id', $id)->orderBy('id')->get();

        // Hitung waktu selesai berdasarkan durasi dari waktu sekarang (saat mulai mengerjakan)
        $waktuSelesaiDurasi = now()->addMinutes($soal->durasi);

        // Gunakan waktu selesai yang lebih awal antara waktu_selesai field dan durasi
        $waktuBerakhir = min($waktuSelesai, $waktuSelesaiDurasi);

        return view('siswa.soal.kerjakan', compact('soal', 'soalDetail', 'waktuBerakhir'));
    }

    public function simpanJawaban(Request $request, $id)
    {
        $id = Crypt::decrypt($id);
        $soal = Soal::findOrFail($id);
        $siswa = Auth::user()->siswa(Auth::user()->no_induk);

        // Cek apakah soal untuk kelas siswa
        if ($soal->kelas_id != $siswa->kelas_id) {
            abort(403);
        }

        // Cek waktu - gunakan waktu berakhir yang sama dengan yang digunakan di kerjakan()
        $waktuSelesai = \Carbon\Carbon::parse($soal->waktu_selesai);
        $waktuSelesaiDurasi = now()->addMinutes($soal->durasi);
        $waktuBerakhir = min($waktuSelesai, $waktuSelesaiDurasi);
        $waktuSekarang = now();

        if ($waktuSekarang->gt($waktuBerakhir)) {
            return redirect()->route('soal.siswa')->with('error', 'Waktu soal telah berakhir.');
        }

        // Cek apakah sudah mengerjakan
        $sudahMengerjakan = JawabanSoal::where('soal_id', $id)
            ->where('siswa_id', $siswa->id)
            ->exists();

        if ($sudahMengerjakan) {
            return redirect()->route('soal.siswa')->with('error', 'Anda sudah mengerjakan soal ini.');
        }

        $soalDetail = SoalDetail::where('soal_id', $id)->get();
        $totalSkor = 0;
        $totalBobot = 0;

        foreach ($soalDetail as $item) {
            $jawaban = $request->input('jawaban.' . $item->id);
            $filePath = null;
            $isCorrect = false;

            if ($item->tipe == 'pilihan_ganda') {
                $isCorrect = strtolower($jawaban) == strtolower($item->jawaban_benar);
            } elseif ($item->tipe == 'essay') {
                // Untuk essay, simpan jawaban tapi tidak hitung skor otomatis
                $isCorrect = false;
            } elseif ($item->tipe == 'tugas') {
                // Untuk tugas, simpan file yang diupload
                if ($request->hasFile('file.' . $item->id)) {
                    $file = $request->file('file.' . $item->id);
                    $filePath = $file->store('tugas', 'public');
                }
                $isCorrect = false; // Tugas tidak otomatis benar
            }

            JawabanSoal::create([
                'soal_id' => $id,
                'soal_detail_id' => $item->id,
                'siswa_id' => $siswa->id,
                'jawaban' => $jawaban,
                'file' => $filePath,
                'is_correct' => $isCorrect,
                'skor' => $isCorrect ? $item->bobot : 0,
            ]);

            $totalBobot += $item->bobot;
            if ($isCorrect) {
                $totalSkor += $item->bobot;
            }
        }

        // Hitung nilai akhir (0-100)
        $nilaiAkhir = $totalBobot > 0 ? round(($totalSkor / $totalBobot) * 100, 2) : 0;

        // Update nilai akhir untuk semua jawaban siswa di soal ini
        JawabanSoal::where('soal_id', $id)
            ->where('siswa_id', $siswa->id)
            ->update(['nilai_akhir' => $nilaiAkhir]);

        return redirect()->route('soal.siswa')->with('success', 'Soal berhasil diselesaikan. Nilai Anda: ' . $nilaiAkhir);
    }
}
