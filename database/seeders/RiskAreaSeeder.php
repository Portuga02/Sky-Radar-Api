<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RiskArea;
class RiskAreaSeeder extends Seeder
{
    public function run(): void
    {
        $areas = array(
            array(
                'name' => 'Marco Zero',
                'lat' => -8.0631,
                'lng' => -34.8711,
                'level' => 'green',
                'description' => 'Vias liberadas. Sem acúmulo de água.'
            ),
            array(
                'name' => 'Viaduto da Caxangá',
                'lat' => -8.0434,
                'lng' => -34.9332,
                'level' => 'yellow',
                'description' => 'Atenção: Fluxo lento, risco moderado.'
            ),
            array(
                'name' => 'Av. Mascarenhas de Morais',
                'lat' => -8.1068,
                'lng' => -34.9126,
                'level' => 'orange',
                'description' => 'Alerta: Ponto de alagamento confirmando.'
            ),
            array(
                'name' => 'Dois Irmãos / Macaxeira',
                'lat' => -8.0142,
                'lng' => -34.9458,
                'level' => 'red',
                'description' => 'Risco Extremo: Via interditada. Risco de deslizamento.'
            )
        );

        foreach ($areas as $area) {
            RiskArea::create($area);
        }
    }
}
