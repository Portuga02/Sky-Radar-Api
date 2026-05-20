<?php

namespace App\Services;

use App\Models\RiskArea;
use App\DTOs\RiskAreaDTO;

class AlertService
{
    public function getActiveAlerts()
    {
        $areas = RiskArea::all();
        $dtos = array();

        foreach ($areas as $area) {
            // Agora passamos a temperatura e a chuva para o DTO
            $dto = new RiskAreaDTO(
                $area->id,
                $area->name,
                $area->lat,
                $area->lng,
                $area->level,
                $area->description,
                $area->temperature,
                $area->precipitation_mm
            );
            $dtos[] = $dto->toArray();
        }

        return $dtos;
    }
}
