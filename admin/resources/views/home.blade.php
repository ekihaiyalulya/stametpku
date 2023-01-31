@extends('template.master')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="col-md10 p-5 pt-2">
                        <h3>Dashboard</h3>
                        <h2>Selamat Datang Di Website Admin BMKG</h2>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Jumlah Pegawai</h5>
                                        <p class="card-text">{{ $jumlah_pegawai }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Jumlah Berita</h5>
                                        <p class="card-text">{{ $jumlah_berita }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
