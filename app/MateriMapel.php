<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MateriMapel extends Model
{
    use SoftDeletes;

    protected $fillable = ['guru_id', 'mapel_id', 'kelas_id', 'judul', 'deskripsi', 'tipe', 'konten', 'file_path'];

    public function guru()
    {
        return $this->belongsTo('App\Guru');
    }

    public function mapel()
    {
        return $this->belongsTo('App\Mapel');
    }

    public function kelas()
    {
        return $this->belongsTo('App\Kelas');
    }

    protected $table = 'materi_mapel';
}
