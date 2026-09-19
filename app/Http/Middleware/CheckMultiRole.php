<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckMultiRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string  ...$guards  Daftar guard yang diizinkan (misal: 'primaryteacher', 'hsteacher')
     */
    public function handle(Request $request, Closure $next, ...$guards): Response
    {
        // Jika tidak ada guard yang dipassing, gunakan default guard
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            // Cek apakah pengguna terautentikasi di salah satu guard
            if (Auth::guard($guard)->check()) {
                // Set guard yang aktif secara eksplisit agar Auth::user() memanggil model yang sesuai
                Auth::shouldUse($guard);

                return $next($request);
            }
        }

        // Jika tidak terautentikasi di salah satu guard yang diizinkan
        abort(403, 'Anda tidak memiliki akses ke halaman ini.');
    }
}
