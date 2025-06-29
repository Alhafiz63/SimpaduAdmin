<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifyInternalToken
{
    public function handle(Request $request, Closure $next)
    {
        $origin = parse_url($request->headers->get('origin'), PHP_URL_HOST)
            ?? parse_url($request->header('X-App-Origin'), PHP_URL_HOST)
            ?? $request->getHost(); // fallback
        $token = $request->bearerToken();

        if (!$origin || !$token) {
        return response()->json(['message' => 'Unauthorized - Missing origin or token'], 401);
    }

        $allowedTokens = [
            config('services.admin_origin') => null, // Jika request dari admin sendiri
            config('services.urls.dosen_service') => config('services.tokens.dosen_service'),
            config('services.urls.mahasiswa_service') => config('services.tokens.mahasiswa_service'),
        ];

        foreach ($allowedTokens as $allowedHost => $validToken) {
            if (str_contains($origin, $allowedHost) && ($validToken === null || $token === $validToken)) {
            return $next($request);
            }
        }

        return response()->json(['message' => 'Unauthorized - Invalid service token'], 401);
    }
}
