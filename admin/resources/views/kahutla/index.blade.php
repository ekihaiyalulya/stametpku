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
            <h3 class="card-title">Data Kebakaran Hutan</h3>
        </div>
        <div class="card-footer">
            <?php
            $jk = (int) $jumlah_karhutla;
            
            if ($jk >= 1) {
                
            }else {
                ?><a href="{{ route('kahutla.create') }}"><button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</button></a><?php
            }
            ?>

            
        </div>
        <div class="card-body">
            <table id="table_kahutla" id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Foto </th>
                        <th>Foto detail</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kahutla as $data)
                        <tr>
                            <td>
                                <img src="{{ Storage::url('Kahutla/' . $data->foto) }}" style="width:150px"
                                    class="img-thumbnail">
                            </td>
                            <td>
                                <img src="{{ Storage::url('Detail/' . $data->detail) }}" style="width:150px"
                                    class="img-thumbnail">
                            </td>
                            <td>
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                    action="{{ route('kahutla.destroy', $data->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('kahutla.edit', $data->id) }}" class="btn btn-outline-warning"><i
                                            class="fa fa-edit"></i></a>
                                    {{-- <button type="submit" class="btn btn-outline-danger"><i
                                            class="fa fa-trash"></i></button> --}}
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
