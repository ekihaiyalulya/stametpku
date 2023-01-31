<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PegawaiResource;
use Illuminate\Support\Facades\Storage;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawai = Pegawai::latest()->paginate(40);
        return view('pegawai.index', compact('pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pegawai.tambah');
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
        $foto->storeAs('public/pegawai', $foto->hashName());
        $pegawai = Pegawai::create([
            'id' => $request->id,
            'nama' => $request->nama,
            'ttl' => $request->ttl,
            'jabatan' => $request->jabatan,
            'foto'  => $foto->hashName(),
        ]);
        if ($pegawai) {
            return redirect()->route('pegawai.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect()->route('pegawai.index')->with(['error' => 'Data Gagal Disimpan!']);
        };
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function show(Pegawai $pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pegawai = Pegawai::find($id);
        return view('pegawai.update', compact('pegawai'));   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pegawai=Pegawai::findOrfail($id);
        if($request->file('foto') == ""){
            $pegawai->update([
                'nama' => $request->nama,
                'ttl' => $request->ttl,
                'jabatan' => $request->jabatan,
                
            ]);
        }else{
            Storage::disk('local')->delete('public/pegawai'.$pegawai->foto);
            $foto = $request->file('foto');
            $foto->storeAs('public/pegawai', $foto->hashName());
            $pegawai->update([
                'nama' => $request->nama,
                'ttl' => $request->ttl,
                'jabatan' => $request->jabatan,
                'foto'  => $foto->hashName(),
            ]);
        }

        if($pegawai){
            return redirect()->route('pegawai.index')->with(['succes' => 'Data Berhasil disimpan']);
        }else{
            return redirect()->route('pegawai.index')->with(['error' => 'Data Gagal disimpan']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        Storage::disk('local')->delete('public/pegawai/'.$pegawai->foto);
        $pegawai->delete();
        if($pegawai){
            return redirect()->route('pegawai.index')->with(['success' => 'Data Berhasil Dihapus!']);
        }else{
            return redirect()->route('pegawai.index')->with(['errors' => 'Data Gagal Dihapus']);
        }
    }
}
