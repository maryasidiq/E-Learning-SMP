<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SoalDetail extends Model
{
    protected $fillable = ['soal_id', 'tipe', 'pertanyaan', 'gambar', 'pilihan_a', 'pilihan_b', 'pilihan_c', 'pilihan_d', 'pilihan_e', 'jawaban_benar', 'bobot'];

    protected $casts = [
        'gambar' => 'array',
    ];

    protected $table = 'soal_detail';

    public function soal()
    {
        return $this->belongsTo(Soal::class);
    }
}
