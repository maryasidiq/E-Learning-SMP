<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kelas extends Model
{
    use SoftDeletes;

    protected $fillable = ['nama_kelas', 'paket_id', 'kelompok', 'guru_id'];

    public function guru()
    {
        return $this->belongsTo('App\Guru')->withDefault();
    }

    public function paket()
    {
        return $this->belongsTo('App\Paket')->withDefault();
    }

    public function jadwal()
    {
        return $this->hasMany('App\Jadwal');
    }

    protected $table = 'kelas';
}
