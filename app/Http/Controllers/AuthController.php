<?php

namespace App\Http\Controllers;

use App\Models\LevelModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check()) { // jika sudah login, maka redirect ke halaman home
            return redirect('/');
        }
        return view('auth.login');
    }

    public function postlogin(Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $credentials = $request->only('username', 'password');

            if (Auth::attempt($credentials)) {
                return response()->json([
                    'status' => true,
                    'message' => 'Login Berhasil',
                    'redirect' => url('/')
                ]);
            }

            return response()->json([
                'status' => false,
                'message' => 'Login Gagal'
            ]);
        }

        return redirect('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }

    public function register()
    {
        $level = LevelModel::select('level_id', 'level_nama')->get();

        return view('auth.register', compact('level'));
    }

    public function store_user(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'username' => 'required|string|min:3|unique:m_user,username',
            'nama' => 'required|string|max:100',
            'password' => 'required|min:5|confirmed',
            'level_id' => 'required|integer',
        ]);

        try {
            // Buat pengguna baru di database
            UserModel::create([
                'username' => $validated['username'],
                'nama' => $validated['nama'],
                'password' => bcrypt($validated['password']),
                'level_id' => $validated['level_id'],
            ]);

            // Kembalikan respons sukses
            return response()->json([
                'status' => true,
                'message' => 'Registrasi berhasil',
                'redirect' => route('login'), // Pastikan ini mengembalikan URL yang benar
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ], 500);
        }
    }
}
