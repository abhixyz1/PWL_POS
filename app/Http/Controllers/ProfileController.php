<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function show()
    {
        // Variabel untuk breadcrumb, page title, dan active menu (sesuaikan dengan layout Anda)
        $breadcrumb = (object) [
            'title' => 'Profil Saya',
            'list' => ['Home', 'Profil']
        ];

        $page = (object) [
            'title' => 'Informasi Profil Pengguna'
        ];

        $activeMenu = 'profile';

        $user = Auth::user(); // Ambil user yang sedang login

        // Kirim variabel ke view
        return view('profile.show', compact('breadcrumb', 'page', 'activeMenu', 'user'));
    }

    // Method untuk update detail profil (nama, dll)
    public function update(Request $request) // Sesuai dengan route('profile.update')
    {
        $user = Auth::user();

        $request->validate([
            'nama' => 'required|string|max:100',
            // Tambahkan validasi untuk field lain jika ada
        ]);

        $user->update(['nama' => $request->nama]);

        return redirect()->route('profile.show')
            ->with('success', 'Nama profil berhasil diperbarui!'); // Pesan spesifik
    }


    // Method untuk update foto profil
    public function updatePhoto(Request $request) // Sesuai dengan route('profile.update-photo')
    {
        // Validasi hanya file foto
        $request->validate([
            'foto_profil' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Max 2MB
        ]);

        $user = Auth::user();

        // Hapus foto lama jika ada dan pastikan menghapus dari disk 'public'
        // Cek keberadaan file menggunakan Storage::disk('public')->exists()
        if ($user->foto_profil && Storage::disk('public')->exists('profiles/' . $user->foto_profil)) {
            Storage::disk('public')->delete('profiles/' . $user->foto_profil); // Hapus dari disk 'public'
        }

        // Simpan foto baru secara eksplisit ke disk 'public' di dalam folder 'profiles'
        $path = $request->file('foto_profil')->store('profiles', 'public');
        $filename = basename($path); // Ambil nama file saja dari path

        // Simpan nama file foto ke kolom 'foto_profil' di database user
        $user->foto_profil = $filename;
        $user->save(); // Simpan perubahan pada model user

        // Redirect kembali dengan pesan sukses
        return redirect()->route('profile.show')
            ->with('success', 'Foto profil berhasil diperbarui!'); // Pesan spesifik
    }

    // Method untuk menghapus foto profil
    public function removePhoto() // Sesuai dengan route('profile.remove-photo')
    {
        $user = Auth::user();

        // Hapus foto jika ada dan pastikan menghapus dari disk 'public'
        if ($user->foto_profil && Storage::disk('public')->exists('profiles/' . $user->foto_profil)) {
            Storage::disk('public')->delete('profiles/' . $user->foto_profil); // Hapus dari disk 'public'
        }

        // Set kolom 'foto_profil' di database menjadi null
        $user->foto_profil = null;
        $user->save();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('profile.show')
            ->with('success', 'Foto profil berhasil dihapus!');
        // Tidak perlu else block karena tombol Hapus Foto tidak muncul jika foto_profil null di view
    }
}