<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Models\RiskArea;

class WeatherIntegrationService
{
    public function syncRealTimeWeather()
    {
        // 1. Pega todas as áreas cadastradas no banco (nossos 4 pontos em Recife)
        $areas = RiskArea::all();

        foreach ($areas as $area) {
            // 2. Bate na API gratuita do satélite passando a Lat e Lng exata
       $response = Http::withoutVerifying()->get("https://api.open-meteo.com/v1/forecast", array(
                'latitude' => $area->lat,
                'longitude' => $area->lng,
                'current' => 'precipitation'
            ));

            if ($response->successful()) {
                // Pega os milímetros de chuva exatos daquele momento
                $chuva = $response->json('current.precipitation');

                // 3. A NOSSA REGRA DE NEGÓCIO TÁTICA
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

                // 4. Salva a nova realidade no banco de dados!
                $area->update(array(
                    'level' => $novoNivel,
                    'description' => $descricao
                ));
            }
        }
    }
}
