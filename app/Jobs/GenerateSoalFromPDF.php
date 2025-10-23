<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class GenerateSoalFromPDF implements ShouldQueue
{
    use Queueable;

    protected $pdfPath;
    protected $jumlahSoal;
    protected $cacheKey;
    protected $type; // 'quis' or 'ujian'

    /**
     * Create a new job instance.
     */
    public function __construct($pdfPath, $jumlahSoal, $cacheKey, $type = 'quis')
    {
        $this->pdfPath = $pdfPath;
        $this->jumlahSoal = $jumlahSoal;
        $this->cacheKey = $cacheKey;
        $this->type = $type;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            // Parse PDF
            $parser = new \Smalot\PdfParser\Parser();
            $pdf = $parser->parseFile($this->pdfPath);
            $text = $pdf->getText();

            // Limit text length to avoid token limits
            $text = substr($text, 0, 10000); // Limit to 10k characters

            // Simulate AI generation for testing (replace with actual OpenAI call when API key is available)
            $soalData = [];
            for ($i = 1; $i <= $this->jumlahSoal; $i++) {
                $soalData[] = [
                    'tipe' => 'pilihan_ganda',
                    'pertanyaan' => "Pertanyaan {$i} dari PDF yang diupload",
                    'pilihan_a' => 'Jawaban A',
                    'pilihan_b' => 'Jawaban B',
                    'pilihan_c' => 'Jawaban C',
                    'pilihan_d' => 'Jawaban D',
                    'pilihan_e' => 'Jawaban E',
                    'jawaban_benar' => 'a',
                    'bobot' => 1,
                ];
            }

            // Uncomment below when OpenAI API key is configured
            /*
            // Use OpenAI to generate questions
            $client = \OpenAI::client(config('services.openai.api_key'));

            $soalType = $this->type === 'ujian' ? 'ujian' : 'quis';
            $prompt = "Berdasarkan teks berikut, buat {$this->jumlahSoal} soal {$soalType} dengan format JSON. Setiap soal harus memiliki: tipe (pilihan_ganda atau essay), pertanyaan, pilihan_a sampai pilihan_e (jika pilihan_ganda), jawaban_benar (jika pilihan_ganda), dan bobot (default 1).\n\nTeks: {$text}\n\nFormat JSON yang diharapkan: [{\"tipe\": \"pilihan_ganda\", \"pertanyaan\": \"...\", \"pilihan_a\": \"...\", \"pilihan_b\": \"...\", \"pilihan_c\": \"...\", \"pilihan_d\": \"...\", \"pilihan_e\": \"...\", \"jawaban_benar\": \"a\", \"bobot\": 1}, ...]";

            $response = $client->chat()->create([
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    ['role' => 'user', 'content' => $prompt],
                ],
                'max_tokens' => 4000,
                'temperature' => 0.7,
            ]);

            $generatedContent = $response->choices[0]->message->content;

            // Parse JSON response
            $soalData = json_decode($generatedContent, true);

            if (!$soalData || !is_array($soalData)) {
                throw new \Exception('Gagal memproses respons dari AI');
            }
            */

            // Cache the result for 1 hour
            Cache::put($this->cacheKey, [
                'success' => true,
                'soal' => $soalData,
            ], 3600);

            // Clean up uploaded file
            if (file_exists($this->pdfPath)) {
                unlink($this->pdfPath);
            }

        } catch (\Exception $e) {
            Log::error('GenerateSoalFromPDF Job Error: ' . $e->getMessage());

            // Cache error result
            Cache::put($this->cacheKey, [
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ], 3600);

            // Clean up uploaded file
            if (file_exists($this->pdfPath)) {
                unlink($this->pdfPath);
            }
        }
    }
}
