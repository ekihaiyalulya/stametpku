<?php

namespace App\Http\Controllers;

use App\Models\Kahutla;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KahutlaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kahutla = Kahutla::latest()->paginate(10);
        $jumlah_karhutla = Kahutla::all()->count();
        return view('kahutla.index', compact('kahutla', 'jumlah_karhutla'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kahutla.tambah');
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
        $detail = $request->file('detail');
        $foto->storeAs('public/kahutla', $foto->hashName());
        $detail->storeAs('public/detail', $detail->hashName());
        $kahutla = Kahutla::create([
            'foto'  => $foto->hashName(),
            'detail'  => $detail->hashName(),
        ]);

        if($kahutla){
            return redirect()->route('kahutla.index')->with(['succes' => 'Data Berhasil Disimpan!']);
        }else{
            return redirect()->route('kahutla.index')->with(['error' => 'Data Gagal Disimpan!']);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kahutla  $kahutla
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kahutla = Kahutla::find($id);
        return view('kahutla.update', compact('kahutla'));   
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
        $detail = $request->file('detail');
        if($request->file('foto') == "" && file('detail' == "")) {
            $kahutla->update([
                'foto'  => $foto->hashName(),
                'detail'  => $detail->hashName(),
            ]);
        }else{
            Storage::disk('local')->delete('public/kahutla'.$kahutla->foto);
            Storage::disk('local')->delete('public/detail'.$kahutla->detail);
            $foto = $request->file('foto');
            $foto->storeAs('public/kahutla', $foto->hashName());
            $detail->storeAs('public/detail', $detail->hashName());
            $kahutla->update([
                'foto'  => $foto->hashName(),
                'detail'  => $detail->hashName(),
            ]);
        }
        if($kahutla){
            return redirect()->route('kahutla.index')->with(['succes' => 'Data Berhasil Disimpan!']);
        }else{
            return redirect()->route('kahutla.index')->with(['Error' => 'Data Gagal Disimpan']);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kahutla  $kahutla
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kahutla = Kahutla::findOrFail($id);
        Storage::disk('local')->delete('public/kahutla/'.$kahutla->foto);
        Storage::disk('local')->delete('public/detail/'.$kahutla->detail);
        $kahutla->delete();
        if($kahutla){
            return redirect()->route('kahutla.index')->with(['success' => 'Data Berhasil Dihapus!']);
        }else{
            return redirect()->route('kahutla.index')->with(['errors' => 'Data Gagal Dihapus']);
        }
    }
}
