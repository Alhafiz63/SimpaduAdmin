<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckDomainRoleAccess
{
    // Mapping domain ke role yang diizinkan
    protected array $allowedServices = [
        'ti054e02.agussbn.my.id' => ['Admin Pegawai', 'Dosen'],
        'ti054e03.agussbn.my.id' => ['Mahasiswa', 'Admin Akademik'],
        // tambah domain & role lainnya di sini
    ];

    public function handle(Request $request, Closure $next): Response
    {
        // Ambil user dari token
        $user = $request->user();

        if (!$user) {
            return response()->json(['message' => 'Unauthenticated.'], 401);
        }

        // Ambil domain asal dari header (Origin)
        $origin = parse_url($request->headers->get('origin'), PHP_URL_HOST)
        ?? parse_url($request->header('X-App-Origin'), PHP_URL_HOST)
        ?? $request->getHost(); // tambahkan ini


        if (!$origin) {
            return response()->json(['message' => 'Origin not provided.'], 403);
        }

        // Cek apakah domain tersebut punya izin akses
        $allowedRoles = $this->allowedServices[$origin] ?? null;

        if (!$allowedRoles || !in_array($user->role, $allowedRoles)) {
            return response()->json(['message' => 'Access denied for your role from this domain.'], 403);
        }

        return $next($request);
    }
}
// Middleware ini akan memeriksa apakah user memiliki akses berdasarkan domain dan role
// yang telah ditentukan. Jika tidak, akan mengembalikan response 403 Forbidden.