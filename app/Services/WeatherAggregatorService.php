<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class WeatherAggregatorService
{
    public function getAggregatedData($lat, $lng)
    {
        // Adicionámos o withoutVerifying() para ignorar o SSL localmente
        $hgResponse = Http::withoutVerifying()->get('https://api.hgbrasil.com/weather', array(
            'lat' => $lat,
            'lon' => $lng,
            'key' => env('HG_BRASIL_KEY')
        ));

        $openWeatherResponse = Http::withoutVerifying()->get('https://api.openweathermap.org/data/2.5/weather', array(
            'lat' => $lat,
            'lon' => $lng,
            'appid' => env('OWM_KEY'),
            'units' => 'metric'
        ));

        // Retorna o array unificado
        return array(
            'temperatura_base' => $hgResponse->json('results'),
            'chuva_detalhada'  => $openWeatherResponse->json('rain'),
            'vento'            => $openWeatherResponse->json('wind'),
            'timestamp'        => now()
        );
    }
}
