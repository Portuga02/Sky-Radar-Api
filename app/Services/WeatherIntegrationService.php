<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Models\RiskArea;

class WeatherIntegrationService
{
    public function syncRealTimeWeather()
    {
        $areas = RiskArea::all();

        foreach ($areas as $area) {
            // Pedimos a precipitação E a temperatura (temperature_2m) para o satélite
            $response = Http::withoutVerifying()->get("https://api.open-meteo.com/v1/forecast", array(
                'latitude' => $area->lat,
                'longitude' => $area->lng,
                'current' => 'precipitation,temperature_2m'
            ));

            if ($response->successful()) {
                // Extraímos os dois valores do JSON da API
                $chuva = $response->json('current.precipitation');
                $temp = $response->json('current.temperature_2m');

                // Nossa Regra de Negócio Tática
                $novoNivel = 'green';
                $descricao = "Vias liberadas. Chuva atual: {$chuva}mm.";

                if ($chuva > 0 && $chuva <= 5) {
                    $novoNivel = 'yellow';
                    $descricao = "Atenção: Chuva leve ({$chuva}mm). Pista escorregadia.";
                } elseif ($chuva > 5 && $chuva <= 15) {
                    $novoNivel = 'orange';
                    $descricao = "Alerta: Chuva moderada ({$chuva}mm). Possível acúmulo de água.";
                } elseif ($chuva > 15) {
                    $novoNivel = 'red';
                    $descricao = "Risco Extremo: Chuva forte ({$chuva}mm). Risco de alagamento/deslizamento.";
                }

                // Salvamos a nova realidade no banco de dados, incluindo as métricas reais
                $area->update(array(
                    'level' => $novoNivel,
                    'description' => $descricao,
                    'temperature' => $temp,
                    'precipitation_mm' => $chuva
                ));
            }
        }
    }
}
