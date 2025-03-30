<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLevelRequest;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LevelController extends Controller
{
    public function index(){
        // DB:: insert('insert into m_level(level_kode, level_nama, created_at) values(?, ?, ?)', ['CUS', 'Pelanggan', now()]);
        // return 'Insert data baru berhasil';

        // $row = DB::update('update m_level set level_nama = ? where level_kode = ?', ['Customer', 'CUS']);
        // return 'Update data berhasil. Jumlah data yang diupdate: '. $row. ' baris';

        // $row = DB::delete('delete from m_level where level_kode = ?', ['CUS']);
        // return 'Delete data berhasil. Jumlah data yang dihapus: '. $row. ' baris';

        $data = DB::select('select * from m_level');
        return view('level', ['data' => $data]);
    }

    public function create(){
        return view('level_tambah');
    }

    // public function tambah_simpan(Request $request){
    //     $request->validate([
    //         'level_kode' => 'required|string|max:10|unique:m_level,level_kode',
    //         'level_nama' => 'required|string|max:50',
    //     ]);
    //     DB::insert('insert into m_level(level_kode, level_nama, created_at) values(?, ?, ?)',
    //     [$request->level_kode, $request->level_nama, now()]);
    //     return redirect('/level')->with('success', 'Data berhasil ditambahkan');
    // }

    public function store(StoreLevelRequest $request){
        $validated = $request->validated();
        DB::insert('insert into m_level(level_kode, level_nama, created_at) values(?, ?, ?)',
        [$request->level_kode, $request->level_nama, now()]);
        return redirect('/level')->with('success', 'Data berhasil ditambahkan');
    }
}
