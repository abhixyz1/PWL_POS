@extends('adminlte::page')

@section('content')
<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <!-- form untuk m_user -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Form User</h3>
                </div>
                <form id="quickForm" method="post" action="/user/tambah_simpan">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="Masukkan username">
                            @error('username')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Masukkan nama">
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Masukkan password">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="level_id">Level</label>
                            <select class="form-control @error('level_id') is-invalid @enderror" id="level_id" name="level_id">
                                <option value="1">Administrator</option>
                                <option value="2">Manager</option>
                                <option value="3">Staff</option>
                            </select>
                            @error('level_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
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
<!-- Add here extra stylesheets -->
<!-- link rel="stylesheet" href="/css/admin_custom.css" -->
@stop

@section('js')
<script> console.log('Hi, I'm using the Laravel-AdminLTE package!'); </script>
@stop
