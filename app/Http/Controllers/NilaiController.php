<?php

namespace App\Http\Controllers;

use App\Guru;
use App\Nilai;
use App\Rapot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guru = Guru::where('id_card', Auth::user()->id_card)->first();
        $nilai = Nilai::where('guru_id', $guru->id)->first();
        return view('guru.nilai', compact('nilai', 'guru'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $guru = Guru::orderBy('kode')->get();
        return view('admin.nilai.index', compact('guru'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $guru = Guru::where('kode', $request->guru_id)->first();

        Nilai::updateOrCreate(
            [
                'id' => $request->id
            ],
            [
                'guru_id' => $guru->id,
                'kkm' => $request->kkm,
                'deskripsi_a' => $request->predikat_a,
                'deskripsi_b' => $request->predikat_b,
                'deskripsi_c' => $request->predikat_c,
                'deskripsi_d' => $request->predikat_d,
            ]
        );

        $rapot = Rapot::where('guru_id', $guru->id)->get();
        foreach ($rapot as $item) {
            if ($item->p_nilai > 90) {
                $item->p_predikat = 'A';
                $item->p_deskripsi = $request->predikat_a;
                $item->k_predikat = 'A';
                $item->k_deskripsi = $request->predikat_a;
            } elseif ($item->p_nilai > 80) {
                $item->p_predikat = 'B';
                $item->p_deskripsi = $request->predikat_b;
                $item->k_predikat = 'B';
                $item->k_deskripsi = $request->predikat_b;
            } elseif ($item->p_nilai > 60) {
                $item->p_predikat = 'C';
                $item->p_deskripsi = $request->predikat_c;
                $item->k_predikat = 'C';
                $item->k_deskripsi = $request->predikat_c;
            } else {
                $item->p_predikat = 'D';
                $item->p_deskripsi = $request->predikat_d;
                $item->k_predikat = 'D';
                $item->k_deskripsi = $request->predikat_d;
            }
            $item->update([
                'p_predikat' => $item->p_predikat,
                'p_deskripsi' => $item->p_predikat == 'A' ? $request->predikat_a : ($item->p_predikat == 'B' ? $request->predikat_b : ($item->p_predikat == 'C' ? $request->predikat_c : $request->predikat_d)),
                'k_predikat' => $item->k_predikat,
                'k_deskripsi' => $item->k_predikat == 'A' ? $request->predikat_a : ($item->k_predikat == 'B' ? $request->predikat_b : ($item->k_predikat == 'C' ? $request->predikat_c : $request->predikat_d)),
            ]);
        }

        return redirect()->back()->with('success', 'Data nilai kkm dan predikat berhasil diperbarui!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
