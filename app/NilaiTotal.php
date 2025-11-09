<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NilaiTotal extends Model
{
    protected $fillable = ['siswa_id', 'mapel_id', 'rata_rata', 'nilai_details'];

    protected $table = 'nilai_total';

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }
}
