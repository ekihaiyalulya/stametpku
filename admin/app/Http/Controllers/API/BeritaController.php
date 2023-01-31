<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Http\Resources\BeritaResource;
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
        $data = Berita::latest()->get();
        return response()->json(["Berita" =>BeritaResource::collection($data)]);

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
    public function store(Request $request)
    {
        $fotos = $request->file('foto');
        $fotos->storeAs('public/berita', $fotos->hashName());
        $berita = Berita::create([
            'foto' => $fotos->hashName(),
            'judul' => $request->judul,
            'isi' => $request->isi,
        ]);
        if ($berita) {
            return response()->json(['Berita Berhasil Ditambahkan', new BeritaResource($berita)]);
        } else {
            return response()->json(['Gagal Ditambahkan', new BeritaResource($berita)]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $berita = Berita::find($id);
        if (is_null($berita)) {
            return response()->json('Data Not Found', 404);
        }
        return response()->json([new BeritaResource($berita)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function edit(Berita $berita)
    {
        //
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
        if ($request->file('foto') == ""){
            $berita->update([
                'judul' => $request->judul,
                'isi' => $request->isi,
            ]);
        } else {
            Storage::disk('local')->delete('public/berita/' . $berita->foto);
            $gambar = $request->file('foto');
            $gambar->storeAs('public/berita' , $gambar->hashName());
            $berita->update([
                'foto' => $gambar->hashName(),
                'judul' => $request->judul,
                'isi' => $request->isi,
            ]);
        }

        return response()->json(['Program updated succesfully.', $berita]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $berita = Berita::find($id);
        $berita->delete();
        return response()->json('Data deleted succesfully');
    }
}
