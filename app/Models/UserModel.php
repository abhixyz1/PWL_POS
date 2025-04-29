<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable; // implementasi class Authenticatable
use Illuminate\Support\Facades\Storage;

class UserModel extends Authenticatable
{
    use HasFactory;

    protected $table = 'm_user';
    protected $primaryKey = 'user_id';
    protected $fillable = ['username', 'password', 'nama', 'level_id', 'created_at', 'updated_at', 'foto_profil'];

    protected $hidden = ['password']; // jangan di tampilkan saat select

    protected $casts = ['password' => 'hashed']; // casting password agar otomatis di hash

    /**
     * Relasi ke tabel level
     */
    public function level(): BelongsTo
    {
        return $this->belongsTo(LevelModel::class, 'level_id', 'level_id');
    }

    /**
     * Mendapatkan nama role
     */
    public function getRoleName(): string
    {
        return $this->level->level_nama;
    }

    /**
     * Cek apakah user memiliki role tertentu
     */
    public function hasRole($role): bool
    {
        return $this->level->level_kode == $role;
    }

    public function getRole()
    {
        return $this->level->level_kode;
    }

    public function getFotoProfilUrlAttribute()
    {
        // Jika ada nama file foto_profil di database
        if ($this->foto_profil) {
            // Gunakan Storage facade dengan disk 'public' untuk mendapatkan URL
            // Ini akan membuat URL yang benar seperti http://your-app.test/storage/profiles/nama_file.jpg
            return Storage::disk('public')->url('profiles/' . $this->foto_profil);

            // Alternatif, bisa juga pakai helper asset() jika storage:link sudah jalan
            // return asset('storage/profiles/' . $this->foto_profil); // Pastikan path-nya benar
        }

        // Jika tidak ada foto profil di database, kembalikan URL foto default
        return asset('adminlte/dist/img/default-profile.png'); // Sesuaikan dengan path default Anda
    }
}
