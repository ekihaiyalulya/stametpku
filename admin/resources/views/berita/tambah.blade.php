@extends('template/master')
@section('content')
<br>
<div class="col">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Data Berita</h3>
        </div>
        <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col col-md-6 form-group">
                        <label>Judul</label>
                        <input type="text" class="form-control" required='required' id="judul" name="judul" placeholder="Masukkan Judul">
                    </div>
                </div>
                <div class="row">
                    <div class="co col-md-6 form-group">
                        <label for="exampleInputFile">Gambar Berita</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" required='required' class="custom-file-input" id="foto" name="foto">
                                <label class="custom-file-label" for="exampleInputFile">Pilih Gambar</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-md-12 form-group">
                        <label for="exampleInputFile">Deskripsi Berita</label>
                        <div class="input-group">
                            <textarea id="isi_form" required='required' class="form-control summernote" name="isi"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Tambah</button>
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