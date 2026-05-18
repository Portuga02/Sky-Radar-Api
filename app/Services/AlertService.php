<?php

namespace App\Services;

use App\Models\RiskArea;
use App\DTOs\RiskAreaDTO;

class AlertService
{
    /**
     * Busca os alertas reais no Banco de Dados e os converte para DTOs.
     */
    public function getActiveAlerts()
    {
        $riskAreas = RiskArea::all(); // 👈 Busca TUDO no banco de dados

        $dtos = array();

        foreach ($riskAreas as $area) {
            $dto = new RiskAreaDTO(
                $area->id,
                $area->name,
                $area->lat,
                $area->lng,
                $area->level,
                $area->description
            );
            array_push($dtos, $dto);
        }

        return $dtos;
    }
}
