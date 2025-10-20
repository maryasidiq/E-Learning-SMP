<?php

namespace App\Http\Controllers;

use App\Jadwal;
use App\Guru;
use App\Kehadiran;
use App\Kelas;
use App\Siswa;
use App\Mapel;
use App\User;
use App\Paket;
use App\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $hari = date('w');
        $jam = date('H:i');
        $jadwal = Jadwal::OrderBy('jam_mulai')->OrderBy('jam_selesai')->OrderBy('kelas_id')->where('hari_id', $hari)->where('jam_mulai', '<=', $jam)->where('jam_selesai', '>=', $jam)->get();
        $pengumuman = Pengumuman::first();
        $kehadiran = Kehadiran::all();
        if (Auth::user()->role == "Admin" || Auth::user()->role == "Operator") {
            return redirect()->route('admin.home', compact('jadwal', 'pengumuman', 'kehadiran'));
        } else {
            return view('home', compact('jadwal', 'pengumuman', 'kehadiran'));
        }
    }

    public function admin()
    {
        $jadwal = Jadwal::count();
        $guru = Guru::count();
        $gurulk = Guru::where('jk', 'L')->count();
        $gurupr = Guru::where('jk', 'P')->count();
        $siswa = Siswa::count();
        $siswalk = Siswa::where('jk', 'L')->count();
        $siswapr = Siswa::where('jk', 'P')->count();
        $kelas = Kelas::count();
        $bkp = 0;
        $dpib = 0;
        $ei = 0;
        $oi = 0;
        $tbsm = 0;
        $rpl = 0;
        $tpm = 0;
        $las = 0;
        $mapel = Mapel::count();
        $user = User::count();
        $paket = Paket::all();
        return view('admin.index', compact(
            'jadwal',
            'guru',
            'gurulk',
            'gurupr',
            'siswalk',
            'siswapr',
            'siswa',
            'kelas',
            'bkp',
            'dpib',
            'ei',
            'oi',
            'tbsm',
            'rpl',
            'tpm',
            'las',
            'mapel',
            'user',
            'paket'
        ));
    }
}
