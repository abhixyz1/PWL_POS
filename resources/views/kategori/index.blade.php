@extends('layouts.app')

@section('subtitle', 'Kategori')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Kategori')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>Manage Kategori</span>
                <a href="{{ url('/kategori/create') }}" class="btn btn-primary ml-auto">+ Tambah Kategori</a>
            </div>
            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>
@endsection


@push('scripts')
    <!-- Tambahkan jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    {{ $dataTable->scripts() }}

    <script>
    $(document).ready(function () {
        $(document).on('click', '.delete-btn', function() {
            var kategoriId = $(this).data('id');

            if (confirm('Apakah Anda yakin ingin menghapus kategori ini?')) {
                $.ajax({
                    url: "{{ url('/kategori') }}/" + kategoriId,
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

