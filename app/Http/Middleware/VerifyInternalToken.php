<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifyInternalToken
{
    public function handle(Request $request, Closure $next)
    {
        $origin = $request->header('Origin');
        $token = $request->bearerToken();

        $allowedTokens = [
            config('services.admin_origin') => null, // Jika request dari admin sendiri
            config('services.urls.dosen_service') => config('services.tokens.dosen_service'),
            config('services.urls.mahasiswa_service') => config('services.tokens.mahasiswa_service'),
        ];

        foreach ($allowedTokens as $domain => $validToken) {
            if (str_contains($origin, parse_url($domain, PHP_URL_HOST)) && $token === $validToken) {
                return $next($request);
            }
        }

        return response()->json(['message' => 'Unauthorized - Invalid service token'], 401);
    }
}
