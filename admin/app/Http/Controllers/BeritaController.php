<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $berita = Berita::latest()->paginate(10);
        return view('berita.index', compact('berita'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('berita.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $foto = $request->file('foto');
        $foto->storeAs('public/berita', $foto->hashName());
        $berita = Berita::create([
            'foto'  => $foto->hashName(),
            'judul' => $request->judul,
            'isi'   => $request->isi,
        ]);

        if($berita){
            return redirect()->route('berita.index')->with(['succes' => 'Data Berhasil Disimpan!']);
        }else{
            return redirect()->route('berita.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function show(Berita $berita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $berita = Berita::find($id);
        return view('berita.update', compact('berita'));   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);
        if($request->file('foto') == "") {
            $berita->update([
                'judul'  => $request->judul,
                'isi'    => $request->isi,
            ]);
        }else{
            Storage::disk('local')->delete('public/berita'.$berita->foto);
            $foto = $request->file('foto');
            $foto->storeAs('public/berita', $foto->hashName());
            $berita->update([
                'foto'  => $foto->hashName(),
                'judul' => $request->judul,
                'isi'   => $request->isi,
            ]);
        }
        if($berita){
            return redirect()->route('berita.index')->with(['succes' => 'Data Berhasil Disimpan!']);
        }else{
            return redirect()->route('berita.index')->with(['Error' => 'Data Gagal Disimpan']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        Storage::disk('local')->delete('public/berita/'.$berita->foto);
        $berita->delete();
        if($berita){
            return redirect()->route('berita.index')->with(['success' => 'Data Berhasil Dihapus!']);
        }else{
            return redirect()->route('berita.index')->with(['errors' => 'Data Gagal Dihapus']);
        }
    }
}
