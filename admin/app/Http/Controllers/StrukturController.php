<?php

namespace App\Http\Controllers;

use App\Models\Struktur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StrukturController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $struktur = Struktur::latest()->paginate(10);
        $jumlah_struktur = Struktur::all()->count();
        return view('struktur.index', compact('struktur', 'jumlah_struktur'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('struktur.tambah');
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
        $foto->storeAs('public/struktur', $foto->hashName());
        $struktur = Struktur::create([
            'foto'  => $foto->hashName(),
            'tanggal_update' => $request->tanggal_update,
        ]);

        if($struktur){
            return redirect()->route('struktur.index')->with(['succes' => 'Data Berhasil Disimpan!']);
        }else{
            return redirect()->route('struktur.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Struktur  $struktur
     * @return \Illuminate\Http\Response
     */
    public function show(Struktur $struktur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Struktur  $struktur
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $struktur = Struktur::find($id);
        return view('struktur.update', compact('struktur')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Struktur  $struktur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $struktur = Struktur::findOrFail($id);
        if($request->file('foto') == "") {
            $struktur->update([
                'tanggal_update'  => $request->tanggal_update,
                'isi'    => $request->isi,
            ]);
        }else{
            Storage::disk('local')->delete('public/struktur'.$struktur->foto);
            $foto = $request->file('foto');
            $foto->storeAs('public/struktur', $foto->hashName());
            $struktur->update([
                'foto'  => $foto->hashName(),
                'tanggal_update' => $request->tanggal_update,
            ]);
        }
        if($struktur){
            return redirect()->route('struktur.index')->with(['succes' => 'Data Berhasil Disimpan!']);
        }else{
            return redirect()->route('struktur.index')->with(['Error' => 'Data Gagal Disimpan']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Struktur  $struktur
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $struktur = Struktur::findOrFail($id);
        Storage::disk('local')->delete('public/struktur/'.$struktur->foto);
        $struktur->delete();
        if($struktur){
            return redirect()->route('struktur.index')->with(['success' => 'Data Berhasil Dihapus!']);
        }else{
            return redirect()->route('struktur.index')->with(['errors' => 'Data Gagal Dihapus']);
        }
    }
}
