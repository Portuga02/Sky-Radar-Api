<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Services\AlertService;

class MapController extends BaseController
{
    protected $alertService;

    public function __construct(AlertService $alertService)
    {
        $this->alertService = $alertService;
    }

    public function getAlerts()
    {
        $alertas = \App\Models\RiskArea::all();

        return response()->json($alertas);
    }
}
