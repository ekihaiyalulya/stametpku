@extends('template/master')
@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data pegawai</h3>
    </div>
    <div class="card-footer">
        <a href="{{route('pegawai.create')}}"><button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</button></a>
    </div>
  
    <div class="card-body">
        <table id="table_pegawai" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>TTL</th>
                    <th>Jabatan</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pegawai as $data)
                <tr>
                    <td>{{ $data->id}}</td>
                    <td>{{ $data->nama}}</td>
                    <td>{{ $data->ttl}}</td>
                    <td>{{ $data->jabatan}}</td>
                    <td>
                        <img src="{{Storage::url('pegawai/'.$data->foto)}}" style="width:150px" class="img-thumbnail">
                    </td>
                    <td>
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('pegawai.destroy', $data->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('pegawai.edit', $data->id) }}" class="btn btn-outline-warning"><i class="fa fa-edit"></i></a>
                            <button type="submit" class="btn btn-outline-danger"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
   

            </tbody>
        </table>
    </div>
</div>
@endsection

@section('js')
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Page specific script -->
<script>
<!-- Page specific script -->
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
@endsection