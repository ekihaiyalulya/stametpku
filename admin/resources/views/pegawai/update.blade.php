@extends('template/master')
@section('content')
<br>
<div class="col">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Update Data Pegawai</h3>
        </div>
        <form action="{{ route('pegawai.update', $pegawai->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="row">
                    <div class="col col-md-6 form-group">
                        <label>NIP</label>
                        <input type="text" class="form-control" required='required' id="id" value="{{ $pegawai->id}} " name="id" placeholder="Masukkan NIP">
                    </div>
                </div>
                <div class="row">
                    <div class="col col-md-6 form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" required='required' id="nama" name="nama" value="{{ $pegawai->nama}} " placeholder="Masukkan Nama Pegawai">
                    </div>
                </div>
                <div class="row">
                    <div class="col col-md-6 form-group">
                        <label>Tempat, Tanggal lahir</label>
                        <input type="text" class="form-control" required='required' id="ttl" name="ttl" value="{{ $pegawai->ttl}} " placeholder="Tempat, DD-MM-YYYY">
                    </div>
                </div>            
                <div class="row">
                    <div class="col col-md-6 form-group">
                        <label>Jabatan</label>
                        <input type="text" class="form-control" required='required' id="jabatan" name="jabatan" value="{{ $pegawai->jabatan}} " placeholder="Masukkan Jabatan Pegawai">
                    </div>
                </div>
                <div class="row">
                    <div class="co col-md-6 form-group">
                        <label for="exampleInputFile">Foto Pegawai</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="foto" name="foto">
                                <label class="custom-file-label" for="exampleInputFile">Pilih Gambar</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('css')
<link rel="stylesheet" href="{{ url('plugins/summernote/summernote-bs4.min.css') }}">
@endsection
@section('js')
<script src="{{ url('plugins/summernote/summernote-bs4.min.js')}}"></script>
<script>
    $(function() {
        $('#deskripsi_form').summernote()
    })
</script>
@endsection