<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JawabanSoal extends Model
{
    protected $table = 'jawaban_soal';

    protected $fillable = [
        'soal_id',
        'soal_detail_id',
        'siswa_id',
        'jawaban',
        'is_correct',
        'skor',
        'nilai_akhir'
    ];

    public function soal()
    {
        return $this->belongsTo(Soal::class);
    }

    public function soalDetail()
    {
        return $this->belongsTo(SoalDetail::class);
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
