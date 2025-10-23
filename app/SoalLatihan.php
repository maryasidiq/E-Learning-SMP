<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SoalLatihan extends Model
{
    protected $fillable = ['latihan_id', 'tipe', 'pertanyaan', 'pilihan_a', 'pilihan_b', 'pilihan_c', 'pilihan_d', 'pilihan_e', 'jawaban_benar', 'bobot'];

    protected $table = 'soal_latihan';

    public function latihan()
    {
        return $this->belongsTo(Latihan::class);
    }
}
