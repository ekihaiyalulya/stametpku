<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use Illuminate\Http\Request;
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
        $data = Pegawai::orderBy('created_at', 'asc')->get();
        return response()->json(["Pegawai" =>PegawaiResource::collection($data)]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Pegawai $request)
    {
        $foto = $request->file('foto');
        $foto->storeAs('public/pegawai', $foto->hashName());
        $pegawai = Pegawai::create([
            'id' => $request->id,
            'nama' => $request->nama,
            'ttl' => $request->ttl,
            'jabatan' => $request->jabatan,
            'foto' => $foto->hashName(),
        ]);
        if ($pegawai) {
            return response()->json(['Pegawai Berhasil Ditambahkan', new PegawaiResource($pegawai)]);
        } else {
            return response()->json(['Gagal Ditambahkan', new PegawaiResource($pegawai)]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pegawai = Pegawai::find($id);
        if (is_null($pegawai)) {
            return response()->json('Data Not Found', 404);
        }
        return response()->json([new PegawaiResource($pegawai)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit(Pegawai $pegawai)
    {
        //
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
        $pegawai = Pegawai::findOrFail($id);
        if($request->file('foto') == ""){
            $pegawai->update([
                'nama' => $request->nama,
                'ttl' => $request->ttl,
                'jabatan' => $request->jabatan,
        ]);
        }else{
            Storage::disk('local')->delete('public/pegawai/' . $pegawai->foto);
            $gambar = $request->file('foto');
            $gambar->storeAs('public/pegawai' , $gambar->hashName());
            $pegawai->update([
                'nama' => $request->nama,
                'ttl' => $request->ttl,
                'jabatan' => $request->jabatan,
                'foto' => $gambar->hashName(),
        ]);
        }
        return response()->json(['Program Update Sucessfully', $pegawai]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pegawai = Pegawai::find($id);
        $pegawai->delete();
        return response()->json('Data deleted succcessfully');
    }
}
