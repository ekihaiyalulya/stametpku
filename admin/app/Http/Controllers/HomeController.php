<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Berita;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jumlah_pegawai = Pegawai::all()->count();
        $jumlah_berita = Berita::all()->count();
        return view('home', compact('jumlah_pegawai', 'jumlah_berita'));
    }
}
