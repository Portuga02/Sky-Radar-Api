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
        $alerts = $this->alertService->getActiveAlerts();

        // Convertendo a lista de DTOs para um formato que vira JSON perfeitamente
        $formattedAlerts = array();
        foreach ($alerts as $alert) {
            array_push($formattedAlerts, $alert->toArray());
        }

        return response()->json($formattedAlerts);
    }
}
