<?php

namespace App\Http\Controllers;

use Auth;
use App\MateriMapel;
use App\Guru;
use App\Mapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class MateriMapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guru = Auth::user()->guru(Auth::user()->id_card);
        $materi = MateriMapel::where('guru_id', $guru->id)->with('mapel', 'kelas.paket')->get();
        return view('guru.materi.index', compact('materi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $guru = Auth::user()->guru(Auth::user()->id_card);
        $mapelKelas = \DB::table('jadwal')
            ->join('mapel', 'jadwal.mapel_id', '=', 'mapel.id')
            ->join('kelas', 'jadwal.kelas_id', '=', 'kelas.id')
            ->where('jadwal.guru_id', $guru->id)
            ->select('mapel.id as mapel_id', 'mapel.nama_mapel', 'kelas.id as kelas_id', 'kelas.nama_kelas')
            ->distinct()
            ->get();
        return view('guru.materi.create', compact('mapelKelas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'mapel_kelas' => 'required|string',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'tipe' => 'required|in:teks,pdf,ppt,excel,file',
            'konten' => 'nullable|string',
            'file' => 'nullable|file|mimes:pdf,ppt,pptx,xls,xlsx,doc,docx,txt|max:10240'
        ]);

        $guru = Auth::user()->guru(Auth::user()->id_card);

        // Parse mapel_kelas value (format: mapel_id-kelas_id)
        list($mapel_id, $kelas_id) = explode('-', $request->mapel_kelas);

        $data = [
            'guru_id' => $guru->id,
            'mapel_id' => (int) $mapel_id,
            'kelas_id' => (int) $kelas_id,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'tipe' => $request->tipe,
        ];

        if ($request->tipe == 'teks') {
            $data['konten'] = $request->konten;
        } elseif ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move('uploads/materi/', $filename);
            $data['file_path'] = 'uploads/materi/' . $filename;
        }

        MateriMapel::create($data);

        return redirect()->route('materi.index')->with('success', 'Materi berhasil ditambahkan!');
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
        $materi = MateriMapel::findorfail($id);
        return view('guru.materi.show', compact('materi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $materi = MateriMapel::findorfail($id);
        return view('guru.materi.edit', compact('materi'));
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
        $this->validate($request, [
            'mapel_kelas' => 'required|string',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'tipe' => 'required|in:teks,pdf,ppt,excel,file',
            'konten' => 'nullable|string',
            'file' => 'nullable|file|mimes:pdf,ppt,pptx,xls,xlsx,doc,docx,txt|max:10240'
        ]);

        $materi = MateriMapel::findorfail($id);

        // Parse mapel_kelas value (format: mapel_id-kelas_id)
        list($mapel_id, $kelas_id) = explode('-', $request->mapel_kelas);

        $data = [
            'mapel_id' => (int) $mapel_id,
            'kelas_id' => (int) $kelas_id,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'tipe' => $request->tipe,
        ];

        if ($request->tipe == 'teks') {
            $data['konten'] = $request->konten;
            if ($materi->file_path) {
                unlink(public_path($materi->file_path));
                $data['file_path'] = null;
            }
        } elseif ($request->hasFile('file')) {
            if ($materi->file_path) {
                unlink(public_path($materi->file_path));
            }
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move('uploads/materi/', $filename);
            $data['file_path'] = 'uploads/materi/' . $filename;
            $data['konten'] = null;
        }

        $materi->update($data);

        return redirect()->route('materi.index')->with('success', 'Materi berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $materi = MateriMapel::findorfail($id);
        if ($materi->file_path && file_exists(public_path($materi->file_path))) {
            unlink(public_path($materi->file_path));
        }
        $materi->delete();
        return redirect()->route('materi.index')->with('warning', 'Materi berhasil dihapus!');
    }
}
