<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Guru extends Model
{
    use SoftDeletes;

    protected $fillable = ['id_card', 'nip', 'nama_guru', 'kode', 'jk', 'telp', 'tmp_lahir', 'tgl_lahir', 'foto'];

    public function mapel()
    {
        return $this->belongsToMany('App\Mapel')->withTimestamps();
    }

    public function jadwals()
    {
        return $this->hasMany('App\Jadwal');
    }

    public function kelas()
    {
        return $this->belongsToMany('App\Kelas', 'jadwal', 'guru_id', 'kelas_id');
    }

    public function dsk($id)
    {
        $dsk = Nilai::where('guru_id', $id)->first();
        return $dsk;
    }

    protected $table = 'guru';
}
