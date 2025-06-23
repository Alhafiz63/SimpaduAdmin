<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class HttpService
{
    protected string $dosenServiceUrl;
    protected string $mahasiswaServiceUrl;
    protected string $origin;

    public function __construct()
    {
        $this->origin = config('services.admin_origin');
        $this->dosenServiceUrl = config('services.urls.dosen_service');
        $this->mahasiswaServiceUrl = config('services.urls.mahasiswa_service');
    }

    public function getDosenById($id)
    {
        $token = config('services.tokens.dosen_service');

        $response = Http::withToken($token)
            ->withHeaders(['Origin' => $this->origin])
            ->get("{$this->dosenServiceUrl}/dosen/{$id}");

        return $response->ok() ? $response->json() : null;
    }

    public function getMahasiswaById($id)
    {
        $token = config('services.tokens.mahasiswa_service');

        $response = Http::withToken($token)
            ->withHeaders(['Origin' => $this->origin])
            ->get("{$this->mahasiswaServiceUrl}/mahasiswa/{$id}");

        return $response->ok() ? $response->json() : null;
    }
}
