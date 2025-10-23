<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class GenerateSoalFromExcel
{
    use Queueable;

    protected $excelPath;
    protected $jumlahSoal;
    protected $cacheKey;
    /**
     * Create a new job instance.
     */
    public function __construct($excelPath, $jumlahSoal, $cacheKey)
    {
        $this->excelPath = $excelPath;
        $this->jumlahSoal = $jumlahSoal;
        $this->cacheKey = $cacheKey;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            // Parse Excel file
            $data = Excel::toArray([], $this->excelPath);

            // Assume first sheet contains the data
            $sheet = $data[0] ?? [];

            // Skip header row (assuming first row is headers)
            $rows = array_slice($sheet, 1);

            $soalData = [];
            $rowNumber = 2; // Start from row 2 (after header)

            foreach ($rows as $row) {
                // Skip empty rows
                if (empty(array_filter($row))) {
                    continue;
                }

                // Expected columns: tipe, pertanyaan, pilihan_a, pilihan_b, pilihan_c, pilihan_d, pilihan_e, jawaban_benar, bobot
                $tipe = trim($row[0] ?? '');
                $pertanyaan = trim($row[1] ?? '');
                $pilihan_a = trim($row[2] ?? '');
                $pilihan_b = trim($row[3] ?? '');
                $pilihan_c = trim($row[4] ?? '');
                $pilihan_d = trim($row[5] ?? '');
                $pilihan_e = trim($row[6] ?? '');
                $jawaban_benar = trim($row[7] ?? '');
                $bobot = intval($row[8] ?? 1);

                // Validate required fields
                if (empty($tipe) || empty($pertanyaan)) {
                    Log::warning("Skipping row {$rowNumber}: Missing required fields (tipe or pertanyaan)");
                    $rowNumber++;
                    continue;
                }

                // Validate tipe
                if (!in_array($tipe, ['pilihan_ganda', 'essay'])) {
                    Log::warning("Skipping row {$rowNumber}: Invalid tipe '{$tipe}'. Must be 'pilihan_ganda' or 'essay'");
                    $rowNumber++;
                    continue;
                }

                // For pilihan_ganda, ensure at least 2 options and correct answer
                if ($tipe === 'pilihan_ganda') {
                    $options = array_filter([$pilihan_a, $pilihan_b, $pilihan_c, $pilihan_d, $pilihan_e]);
                    if (count($options) < 2) {
                        Log::warning("Skipping row {$rowNumber}: Pilihan ganda must have at least 2 options");
                        $rowNumber++;
                        continue;
                    }
                    if (empty($jawaban_benar) || !in_array(strtolower($jawaban_benar), ['a', 'b', 'c', 'd', 'e'])) {
                        Log::warning("Skipping row {$rowNumber}: Invalid jawaban_benar '{$jawaban_benar}'. Must be a, b, c, d, or e");
                        $rowNumber++;
                        continue;
                    }
                }

                // Build soal data
                $soal = [
                    'tipe' => $tipe,
                    'pertanyaan' => $pertanyaan,
                    'bobot' => $bobot > 0 ? $bobot : 1,
                ];

                if ($tipe === 'pilihan_ganda') {
                    $soal['pilihan_a'] = $pilihan_a;
                    $soal['pilihan_b'] = $pilihan_b;
                    $soal['pilihan_c'] = $pilihan_c;
                    $soal['pilihan_d'] = $pilihan_d;
                    if (!empty($pilihan_e)) {
                        $soal['pilihan_e'] = $pilihan_e;
                    }
                    $soal['jawaban_benar'] = strtolower($jawaban_benar);
                }

                $soalData[] = $soal;
                $rowNumber++;

                // Limit to requested jumlah_soal
                if (count($soalData) >= $this->jumlahSoal) {
                    break;
                }
            }

            if (empty($soalData)) {
                throw new \Exception('Tidak ada soal valid yang ditemukan dalam file Excel. Pastikan format sesuai dengan template.');
            }

            // Cache the result for 1 hour
            Cache::put($this->cacheKey, [
                'success' => true,
                'soal' => $soalData,
            ], 3600);

            // Clean up uploaded file
            if (file_exists($this->excelPath)) {
                unlink($this->excelPath);
            }

        } catch (\Exception $e) {
            Log::error('GenerateSoalFromExcel Job Error: ' . $e->getMessage());

            // Cache error result
            Cache::put($this->cacheKey, [
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ], 3600);

            // Clean up uploaded file
            if (file_exists($this->excelPath)) {
                unlink($this->excelPath);
            }
        }
    }
}
