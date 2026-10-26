<?php

namespace App\Http\Controllers;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected function fetchDataFromApi(string $url): array
    {
        try {
            $response = Http::get($url);

            if (!$response->successful()) {
                Log::warning('La API devolvió una respuesta no exitosa.', [
                    'url' => $url,
                    'status' => $response->status(),
                ]);

                return [];
            }

            $data = $response->json();

            return is_array($data) ? $data : [];
        } catch (ConnectionException $exception) {
            Log::warning('No fue posible conectar con la API.', [
                'url' => $url,
                'exception' => $exception->getMessage(),
            ]);

            return [];
        }
    }
}
