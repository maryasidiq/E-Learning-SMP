<?php

namespace App\Http\Controllers;

use Auth;
use App\MateriMapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class SiswaMateriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = Auth::user()->siswa(Auth::user()->no_induk);
        if (!$siswa) {
            abort(403, 'Data siswa tidak ditemukan.');
        }
        $materi = MateriMapel::where('kelas_id', $siswa->kelas_id)->with('mapel', 'guru')->get();
        return view('siswa.materi.index', compact('materi'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = Crypt::decrypt($id);
        $materi = MateriMapel::with('mapel', 'guru')->findorfail($id);
        return view('siswa.materi.show', compact('materi'));
    }
}
