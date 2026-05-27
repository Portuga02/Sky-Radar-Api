<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function getWeather($lat, $lon)
    {
        // Consome a API da HG Brasil via backend (sem CORS)
        $response = Http::get("https://api.hgbrasil.com/weather", [
            'key'    => env('HG_BRASIL_KEY'),
            'lat'    => $lat,
            'lon'    => $lon,
            'format' => 'json' // Removemos o 'json-cors' para evitar conflitos
        ]);

        // Retorna a resposta da HG Brasil para o seu Frontend
        return response()->json($response->json(), $response->status());
    }
}
