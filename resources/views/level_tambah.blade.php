@extends('adminlte::page')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <!-- Form Tambah Level -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Tambah Level Baru</h3>
                </div>
                <form id="quickForm" method="post" action="/level/tambah_simpan">
                    @csrf
                    <div class="card-body">
                        <!-- Input Kode Level -->
                        <div class="form-group">
                            <label for="level_kode">Kode Level</label>
                            <input type="text" name="level_kode" class="form-control @error('level_kode') is-invalid @enderror" id="level_kode" placeholder="Masukkan kode level">
                            @error('level_kode')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Input Nama Level -->
                        <div class="form-group">
                            <label for="level_nama">Nama Level</label>
                            <input type="text" name="level_nama" class="form-control @error('level_nama') is-invalid @enderror" id="level_nama" placeholder="Masukkan nama level">
                            @error('level_nama')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <!-- Tombol Submit -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
<!-- Tambahkan stylesheet tambahan jika diperlukan -->
@stop

@section('js')
<script>
    console.log('Form Tambah Level Baru Loaded!');
</script>
@stop
