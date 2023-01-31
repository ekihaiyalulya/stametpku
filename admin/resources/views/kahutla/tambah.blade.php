@extends('template/master')
@section('content')
<br>
<div class="col">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Data Kebakaran Hutan</h3>
        </div>
        <form action="{{ route('kahutla.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                    <div class="co col-md-6 form-group">
                        <label for="exampleInputFile">Gambar Hotspot</label>
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
                    <div class="co col-md-6 form-group">
                        <label for="exampleInputFile">Gambar Detail</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" required='required' class="custom-file-input" id="detail" name="detail">
                                <label class="custom-file-label" for="exampleInputFile">Pilih Gambar</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
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
