<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthorizeUser
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user_role = $request->user()->getRole();  // Mengambil level_kode dari pengguna yang login
        if (in_array($user_role, $roles)) {        // Memeriksa apakah level_kode pengguna ada dalam array roles
            return $next($request);               // Melanjutkan request jika memiliki peran yang sesuai
        }
        // Menampilkan error 403 jika tidak memiliki peran yang diperlukan
        abort(403, 'Forbidden. Kamu tidak punya akses ke halaman ini');
    }
}
