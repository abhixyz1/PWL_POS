@extends('layouts.template')

@section('content')
    {{-- Semua konten halaman utama harus ada di dalam section ini --}}

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Profil Saya</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 text-center">
                    <img src="{{ auth()->user()->foto_profil ? asset('storage/profiles/' . auth()->user()->foto_profil) : asset('vendor/adminlte/dist/img/default-profile.jpg') }}"
                        class="img-circle elevation-2 mb-3" {{-- Tambahkan mb-3 untuk margin bawah --}} alt="User Image"
                        style="width: 200px; height: 200px; object-fit: cover;">
                    <form action="{{ route('profile.update-photo') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error('foto_profil') is-invalid @enderror"
                                    id="foto_profil" name="foto_profil" accept="image/*">
                                <label class="custom-file-label"
                                    for="foto_profil">{{ auth()->user()->foto_profil ? auth()->user()->foto_profil : 'Pilih foto baru' }}</label>
                            </div>
                            @error('foto_profil')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">Simpan Foto Baru</button>
                        @if (auth()->user()->foto_profil)
                            <a href="#" class="btn btn-danger btn-sm"
                                onclick="event.preventDefault(); if (confirm('Yakin ingin menghapus foto profil?')) { document.getElementById('remove-photo-form').submit(); }">
                                Hapus Foto
                            </a>
                            <form id="remove-photo-form" action="{{ route('profile.remove-photo') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                        @endif
                    </form>
                </div>

                <div class="col-md-8">
                    <form action="{{ route('profile.update') }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Username</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{ auth()->user()->username }}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    name="nama" value="{{ old('nama', auth()->user()->nama) }}">
                                @error('nama')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Level</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control"
                                    value="{{ auth()->user()->level->level_nama ?? 'N/A' }}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-9 offset-sm-3">
                                <button type="submit" class="btn btn-primary">Update Profil</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('.custom-file-input').on('change', function() {
                let fileName = $(this).val().split('\\').pop(); // Ambil nama file saja
                $(this).next('.custom-file-label').addClass("selected").html(fileName); // Ubah teks label
            });
        });
    </script>
@endpush
