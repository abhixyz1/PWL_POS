@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
                <a class="btn btn-sm btn-primary mt-1" href="{{ url('level/create') }}">Tambah</a>
            </div>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <table class="table table-bordered table-striped table-hover table-sm" id="table_level">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Kode Level</th>
                        <th>Nama Level</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            var dataLevel = $('#table_level').DataTable({
                serverSide: true,
                ajax: {
                    url: "{{ url('level/list') }}",
                    type: "POST",
                    data: function(d) {
                        // Jika perlu filter
                        d.level_id = $('#level_id').val();
                    }
                },
                columns: [
                    {
                        data: "DT_RowIndex",
                        name: "DT_RowIndex",
                        className: "text-center",
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: "level_kode",
                        name: "level_kode",
                        className: "",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "level_nama",
                        name: "level_nama",
                        className: "",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "aksi",
                        name: "aksi",
                        className: "",
                        orderable: false,
                        searchable: false
                    }
                ]
            });

            // Jika ada filter
            $('#level_id').on('change', function() {
                dataLevel.ajax.reload();
            });
        });
    </script>
@endpush
