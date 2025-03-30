@extends('layouts.app')

@section('subtitle', 'User')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'User')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>Manage User</span>
                <a href="{{ url('/user/tambah') }}" class="btn btn-primary ml-auto">+ Tambah User</a>
            </div>
            <div class="card-body">
                <table id="user-table" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Nama</th>
                            <th>ID Level Pengguna</th>
                            <th>Kode Level</th>
                            <th>Nama Level</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $d)
                        <tr>
                            <td>{{ $d->user_id }}</td>
                            <td>{{ $d->username }}</td>
                            <td>{{ $d->nama }}</td>
                            <td>{{ $d->level_id }}</td>
                            <td>{{ $d->level->level_kode }}</td>
                            <td>{{ $d->level->level_nama }}</td>
                            <td>
                                <a href="/user/ubah/{{ $d->user_id }}" class="btn btn-warning btn-sm">Ubah</a>
                                <button class="btn btn-danger btn-sm delete-btn" data-id="{{ $d->user_id }}">Hapus</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- Tambahkan jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- Tambahkan DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

    <script>
    $(document).ready(function () {
        $('#user-table').DataTable();

        $(document).on('click', '.delete-btn', function() {
            var userId = $(this).data('id');

            if (confirm('Apakah Anda yakin ingin menghapus user ini?')) {
                $.ajax({
                    url: "{{ url('/user') }}/" + userId,
                    type: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        _method: "DELETE"
                    },
                    success: function(response) {
                        alert(response.success);
                        location.reload();
                    },
                    error: function(xhr) {
                        alert('Terjadi kesalahan saat menghapus data.');
                    }
                });
            }
        });
    });
    </script>
@endpush
