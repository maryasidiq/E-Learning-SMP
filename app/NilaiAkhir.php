<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NilaiAkhir extends Model
{
    protected $fillable = ['siswa_id', 'mapel_id', 'judul_nilai', 'nilai', 'sumber', 'bobot'];

    protected $table = 'nilai_akhir';

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }
}
