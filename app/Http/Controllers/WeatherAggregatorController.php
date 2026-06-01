<?php

namespace App\Http\Controllers;

use App\Services\WeatherAggregatorService;
use Illuminate\Http\Request;

class WeatherAggregatorController extends Controller
{
    protected $weatherService;

    // Injeção de Dependência (Padrão Sênior)
    public function __construct(WeatherAggregatorService $weatherService)
    {
        $this->weatherService = $weatherService;
    }

    public function fetch($lat, $lng)
    {
        // Chama o nosso maestro (o Service) para buscar os dados nas duas APIs
        $data = $this->weatherService->getAggregatedData($lat, $lng);

        return response()->json($data);
    }
}
