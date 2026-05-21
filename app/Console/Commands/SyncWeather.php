<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\WeatherIntegrationService;

class SyncWeather extends Command
{

    protected $signature = 'radar:sync';

    protected $description = 'Sincroniza os dados de chuva e temperatura reais com o satelite da Open-Meteo';

    public function handle(WeatherIntegrationService $weatherService)
    {
        $this->info('🛰️ Buscando dados no satelite (Temperatura e Chuva)...');

        $weatherService->syncRealTimeWeather();

        $this->info('✅ Base de dados atualizada com as novas metricas reais!');
    }
}
