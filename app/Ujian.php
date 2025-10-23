<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ujian extends Model
{
    protected $fillable = ['judul', 'deskripsi', 'guru_id', 'mapel_id', 'kelas_id', 'waktu_mulai', 'waktu_selesai', 'durasi'];

    protected $table = 'ujian';

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }

    public function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function soal()
    {
        return $this->hasMany(SoalUjian::class);
    }
}
