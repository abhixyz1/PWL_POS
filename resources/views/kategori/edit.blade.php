@extends('layouts.app')

@section('subtitle', 'Edit Kategori')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Edit Kategori</div>
            <div class="card-body">
                <form action="{{ route('kategori.update', $kategori->kategori_id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="kodeKategori" class="form-label">Kode Kategori</label>
                        <input type="text" name="kodeKategori" id="kodeKategori" class="form-control" value="{{ $kategori->kategori_kode }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="namaKategori" class="form-label">Nama Kategori</label>
                        <input type="text" name="namaKategori" id="namaKategori" class="form-control" value="{{ $kategori->kategori_nama }}" required>
                    </div>
                    <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                    <a href="{{ url('/kategori') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
@endsection
