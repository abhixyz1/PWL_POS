@extends('adminlte::page')

@section('content')
<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Level Pengguna</h3>
                    <div class="card-tools">
                        <a href="/level/tambah" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Tambah Level
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Kode Level</th>
                                <th>Nama Level</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $d)
                            <tr>
                                <td>{{ $d->level_id }}</td>
                                <td>{{ $d->level_kode }}</td>
                                <td>{{ $d->level_nama }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
<!-- Tambahkan stylesheet tambahan jika diperlukan -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
@stop

@section('js')
<!-- Tambahkan script tambahan jika diperlukan -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example1').DataTable();
    });
</script>
@stop
