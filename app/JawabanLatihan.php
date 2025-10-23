<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JawabanLatihan extends Model
{
    protected $table = 'jawaban_latihan';

    protected $fillable = [
        'latihan_id',
        'soal_latihan_id',
        'siswa_id',
        'jawaban',
        'is_correct',
        'skor',
        'nilai_akhir'
    ];

    public function latihan()
    {
        return $this->belongsTo(Latihan::class);
    }

    public function soalLatihan()
    {
        return $this->belongsTo(SoalLatihan::class);
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
