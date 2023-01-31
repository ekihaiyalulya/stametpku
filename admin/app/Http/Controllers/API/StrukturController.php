<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Struktur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\StrukturResource;

class StrukturController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Struktur::latest()->get();
        return response()->json(["Struktur" =>StrukturResource::collection($data)]);
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
        $fotos->storeAs('public/struktur', $fotos->hashName());
        $struktur = Struktur::create([
            'foto' => $fotos->hashName(),
            'tanggal_update' => $request->tanggal_update,
        ]);
        if ($struktur) {
            return response()->json(['struktur Berhasil Ditambahkan', new StrukturResource($struktur)]);
        } else {
            return response()->json(['Gagal Ditambahkan', new StrukturResource($struktur)]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Struktur  $struktur
     * @return \Illuminate\Http\Response
     */
    public function show(Struktur $id)
    {
        $struktur = Struktur::find($id);
        if (is_null($struktur)) {
            return response()->json('Data Not Found', 404);
        }
        return response()->json([new StrukturResource($struktur)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Struktur  $struktur
     * @return \Illuminate\Http\Response
     */
    public function edit(Struktur $struktur)
    {
        //
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
        if ($request->file('foto') == ""){
            $struktur->update([
                'judul' => $request->judul,
                'isi' => $request->isi,
            ]);
        } else {
            Storage::disk('local')->delete('public/struktur/' . $struktur->foto);
            $gambar = $request->file('foto');
            $gambar->storeAs('public/struktur' , $gambar->hashName());
            $struktur->update([
                'foto' => $gambar->hashName(),
                'judul' => $request->judul,
                'isi' => $request->isi,
            ]);
        }

        return response()->json(['Program updated succesfully.', $struktur]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Struktur  $struktur
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $struktur = Struktur::find($id);
        $struktur->delete();
        return response()->json('Data deleted succesfully');
    }
}
