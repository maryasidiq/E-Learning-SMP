<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SoalUjian extends Model
{
    protected $fillable = ['ujian_id', 'tipe', 'pertanyaan', 'pilihan_a', 'pilihan_b', 'pilihan_c', 'pilihan_d', 'pilihan_e', 'jawaban_benar', 'bobot'];

    protected $table = 'soal_ujian';

    public function ujian()
    {
        return $this->belongsTo(Ujian::class);
    }
}
