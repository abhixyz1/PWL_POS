<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        // $data = [
        //     'level_id' => 2,
        //     'username' => 'manager_tiga',
        //     'nama' => 'Manager 3',
        //     'password' => Hash::make('12345')
        // ];
        // UserModel::create($data);

        // $user = UserModel::firstWhere('level_id', 1);
        // $user = UserModel::findOr(1, ['username', 'nama'], function(){
        //     abort(404);
        // });
        // $user = UserModel::findOr(20, ['username', 'nama'], function(){
        //     abort(404);
        // });
        // $user = UserModel::findOrFail(1);
        // $user = UserModel::where('username', 'manager9')->firstOrFail();
        // $user = UserModel::create
        // (
        //     [
        //         'username' => 'manager11',
        //         'nama' => 'Manager11',
        //         'password' => Hash::make('12345'),
        //         'level_id' => 2,
        //     ]
        // );
        // $user->username = 'manager12';

        // $user->save();

        // $user->wasChanged();
        // $user->wasChanged('username');
        // $user->wasChanged(['username', 'level_id']);
        // $user->wasChanged('nama');
        // dd($user->wasChanged(['nama', 'username']));

        // $user = UserModel::all();
        // return view('user',['data' => $user]);
        $user = UserModel::with('level')->get();
        return view('user',['data' => $user]);
    }

    public function tambah()
    {
        return view('user_tambah');
    }
    public function tambah_simpan(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:50|unique:m_user,username',
            'nama' => 'required|string|max:225',
            'password' => 'nullable|min:6|confirmed',
            'level_id' => 'required|exists:m_level,level_id',
        ]);

        UserModel::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => Hash::make($request->password),
            'level_id' => $request->level_id,
        ]);
        return redirect('/user')->with('success', 'User berhasil ditambahkan!');
    }
    public function ubah($id)
    {
        $user = UserModel::find($id);
        return view('user_ubah',['data' => $user]);
    }
    public function ubah_simpan($id, Request $request)
    {
        $user = UserModel::find($id);

        $user->username = $request->username;
        $user->nama = $request->nama;
        $user->password = Hash::make($request->password);
        $user->level_id = $request->level_id;

        $user->save();

        return redirect('/user');
    }
    public function hapus($id)
    {
        $user = UserModel::find($id);
        $user->delete();
        return redirect('/user');
    }
}
