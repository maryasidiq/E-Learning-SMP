<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NilaiAkhir extends Model
{
    protected $fillable = ['siswa_id', 'mapel_id', 'judul_nilai', 'nilai', 'sumber', 'bobot', 'soal_id'];

    protected $table = 'nilai_akhir';

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }

    public function soal()
    {
        return $this->belongsTo(Soal::class);
    }
}
