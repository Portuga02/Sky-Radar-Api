<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Services\AlertService;

class MapController extends BaseController
{
    protected $alertService;

    // Injeção do nosso Serviço
    public function __construct(AlertService $alertService)
    {
        $this->alertService = $alertService;
    }

 public function getAlerts()
    {
        // 1. Pega os dados já formatados do nosso serviço
        $alerts = $this->alertService->getActiveAlerts();

        // 2. Devolve direto como JSON, sem tentar converter de novo
        return response()->json($alerts);
    }
}
