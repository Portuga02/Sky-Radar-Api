<?php

namespace App\Services;

use App\DTOs\RiskAreaDTO;

class AlertService
{

    public function getActiveAlerts()
    {
        return array(
            new RiskAreaDTO(1, 'Marco Zero', -8.0631, -34.8711, 'green', 'Vias liberadas. Sem acúmulo de água.'),
            new RiskAreaDTO(2, 'Viaduto da Caxangá', -8.0434, -34.9332, 'yellow', 'Atenção: Fluxo lento, risco moderado.'),
            new RiskAreaDTO(3, 'Av. Mascarenhas de Morais', -8.1068, -34.9126, 'orange', 'Alerta: Ponto de alagamento confirmando.'),
            new RiskAreaDTO(4, 'Dois Irmãos / Macaxeira', -8.0142, -34.9458, 'red', 'Risco Extremo: Via interditada. Risco de deslizamento.')
        );
    }
}
