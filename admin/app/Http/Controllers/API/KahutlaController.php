<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Kahutla;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\KahutlaResource;

class KahutlaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Kahutla::latest()->get();
        return response()->json(["Kahutla" =>KahutlaResource::collection($data)]);    
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
        $fotos->storeAs('public/kahutla', $fotos->hashName());
        $kahutla = Kahutla::create([
            'foto' => $fotos->hashName(),
        ]);
        if ($kahutla) {
            return response()->json(['kahutla Berhasil Ditambahkan', new KahutlaResource($kahutla)]);
        } else {
            return response()->json(['Gagal Ditambahkan', new KahutlaResource($kahutla)]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kahutla  $kahutla
     * @return \Illuminate\Http\Response
     */
    public function show(Kahutla $kahutla)
    {
        $kahutla = Kahutla::find($id);
        if (is_null($kahutla)) {
            return response()->json('Data Not Found', 404);
        }
        return response()->json([new KahutlaResource($kahutla)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kahutla  $kahutla
     * @return \Illuminate\Http\Response
     */
    public function edit(Kahutla $kahutla)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kahutla  $kahutla
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kahutla = Kahutla::findOrFail($id);
        if ($request->file('foto') == ""){
            $kahutla->update([
                'foto' => $gambar->hashName(),
            ]);
        } else {
            Storage::disk('local')->delete('public/kahutla/' . $kahutla->foto);
            $gambar = $request->file('foto');
            $gambar->storeAs('public/kahutla' , $gambar->hashName());
            $kahutla->update([
                'foto' => $gambar->hashName(),
            ]);
        }

        return response()->json(['Program updated succesfully.', $kahutla]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kahutla  $kahutla
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kahutla $kahutla)
    {
        $kahutla = Kahutla::find($id);
        $kahutla->delete();
        return response()->json('Data deleted succesfully');
    }
}
