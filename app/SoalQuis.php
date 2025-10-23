<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SoalQuis extends Model
{
    protected $fillable = ['quis_id', 'tipe', 'pertanyaan', 'pilihan_a', 'pilihan_b', 'pilihan_c', 'pilihan_d', 'pilihan_e', 'jawaban_benar', 'bobot'];

    protected $table = 'soal_quis';

    public function quis()
    {
        return $this->belongsTo(Quis::class);
    }
}
