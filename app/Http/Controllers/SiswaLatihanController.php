<?php

namespace App\Http\Controllers;

use App\Latihan;
use App\SoalLatihan;
use App\JawabanLatihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class SiswaLatihanController extends Controller
{
    public function index()
    {
        $siswa = Auth::user()->siswa(Auth::user()->no_induk);
        $latihan = Latihan::where('kelas_id', $siswa->kelas_id)
            ->where('waktu_mulai', '<=', now())
            ->orderBy('waktu_mulai', 'desc')
            ->get();

        return view('siswa.latihan.index', compact('latihan'));
    }

    public function show($id)
    {
        $id = Crypt::decrypt($id);
        $latihan = Latihan::findOrFail($id);
        $siswa = Auth::user()->siswa(Auth::user()->no_induk);

        // Cek apakah latihan untuk kelas siswa
        if ($latihan->kelas_id != $siswa->kelas_id) {
            abort(403);
        }

        // Cek apakah sudah mengerjakan
        $sudahMengerjakan = JawabanLatihan::where('latihan_id', $id)
            ->where('siswa_id', $siswa->id)
            ->exists();

        return view('siswa.latihan.show', compact('latihan', 'sudahMengerjakan'));
    }

    public function kerjakan($id)
    {
        $id = Crypt::decrypt($id);
        $latihan = Latihan::findOrFail($id);
        $siswa = Auth::user()->siswa(Auth::user()->no_induk);

        // Cek apakah latihan untuk kelas siswa
        if ($latihan->kelas_id != $siswa->kelas_id) {
            abort(403);
        }

        // Cek waktu mulai dan selesai
        $waktuMulai = \Carbon\Carbon::parse($latihan->waktu_mulai);
        $waktuSelesai = \Carbon\Carbon::parse($latihan->waktu_selesai);
        $waktuSekarang = now();

        if ($waktuSekarang->lt($waktuMulai)) {
            return redirect()->back()->with('error', 'Latihan belum dimulai.');
        }

        if ($waktuSekarang->gt($waktuSelesai)) {
            return redirect()->back()->with('error', 'Waktu latihan telah berakhir.');
        }

        // Cek apakah sudah mengerjakan
        $sudahMengerjakan = JawabanLatihan::where('latihan_id', $id)
            ->where('siswa_id', $siswa->id)
            ->exists();

        if ($sudahMengerjakan) {
            return redirect()->back()->with('error', 'Anda sudah mengerjakan latihan ini.');
        }

        $soal = SoalLatihan::where('latihan_id', $id)->orderBy('id')->get();

        // Hitung waktu selesai berdasarkan durasi dari waktu sekarang (saat mulai mengerjakan)
        $waktuSelesaiDurasi = now()->addMinutes($latihan->durasi);

        // Gunakan waktu selesai yang lebih awal antara waktu_selesai field dan durasi
        $waktuBerakhir = min($waktuSelesai, $waktuSelesaiDurasi);

        return view('siswa.latihan.kerjakan', compact('latihan', 'soal', 'waktuBerakhir'));
    }

    public function simpanJawaban(Request $request, $id)
    {
        $id = Crypt::decrypt($id);
        $latihan = Latihan::findOrFail($id);
        $siswa = Auth::user()->siswa(Auth::user()->no_induk);

        // Cek apakah latihan untuk kelas siswa
        if ($latihan->kelas_id != $siswa->kelas_id) {
            abort(403);
        }

        // Cek waktu - gunakan waktu berakhir yang sama dengan yang digunakan di kerjakan()
        $waktuSelesai = \Carbon\Carbon::parse($latihan->waktu_selesai);
        $waktuSelesaiDurasi = now()->addMinutes($latihan->durasi);
        $waktuBerakhir = min($waktuSelesai, $waktuSelesaiDurasi);
        $waktuSekarang = now();

        if ($waktuSekarang->gt($waktuBerakhir)) {
            return redirect()->route('latihan.siswa')->with('error', 'Waktu latihan telah berakhir.');
        }

        // Cek apakah sudah mengerjakan
        $sudahMengerjakan = JawabanLatihan::where('latihan_id', $id)
            ->where('siswa_id', $siswa->id)
            ->exists();

        if ($sudahMengerjakan) {
            return redirect()->route('latihan.siswa')->with('error', 'Anda sudah mengerjakan latihan ini.');
        }

        $soal = SoalLatihan::where('latihan_id', $id)->get();
        $totalSkor = 0;
        $totalBobot = 0;

        foreach ($soal as $item) {
            $jawaban = $request->input('jawaban.' . $item->id);
            $isCorrect = false;

            if ($item->tipe == 'pilihan_ganda') {
                $isCorrect = strtolower($jawaban) == strtolower($item->jawaban_benar);
            } elseif ($item->tipe == 'essay') {
                // Untuk essay, simpan jawaban tapi tidak hitung skor otomatis
                $isCorrect = false;
            }

            JawabanLatihan::create([
                'latihan_id' => $id,
                'soal_latihan_id' => $item->id,
                'siswa_id' => $siswa->id,
                'jawaban' => $jawaban,
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

        // Update nilai akhir untuk semua jawaban siswa di latihan ini
        JawabanLatihan::where('latihan_id', $id)
            ->where('siswa_id', $siswa->id)
            ->update(['nilai_akhir' => $nilaiAkhir]);

        return redirect()->route('latihan.siswa')->with('success', 'Latihan berhasil diselesaikan. Nilai Anda: ' . $nilaiAkhir);
    }
}
