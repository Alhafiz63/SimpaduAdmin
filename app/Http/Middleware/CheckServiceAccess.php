<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckServiceAccess
{
    protected array $allowedServices = [
        'ti054e02.agussbn.my.id' => ['Admin Pegawai', 'Dosen',],
        'ti054e03.agussbn.my.id' => ['Mahasiswa', 'Admin Akademik'],
        // tambah domain dan role sesuai kebutuhan
    ];

    public function handle(Request $request, Closure $next)
    {
        $origin = parse_url($request->headers->get('origin'), PHP_URL_HOST) 
                ?? parse_url($request->headers->get('referer'), PHP_URL_HOST);

        $user = $request->user();

        if (!$user || !$origin || !array_key_exists($origin, $this->allowedServices)) {
            return response()->json(['message' => 'Unauthorized.'], 403);
        }

        $allowedRoles = $this->allowedServices[$origin];

        if (!in_array($user->role, $allowedRoles)) {
            return response()->json(['message' => 'Access denied for your role.'], 403);
        }

        return $next($request);
    }
}
