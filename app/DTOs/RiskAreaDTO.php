<?php

namespace App\DTOs;

class RiskAreaDTO
{
    public $id;
    public $name;
    public $lat;
    public $lng;
    public $level;
    public $desc;
    public $temperature;
    public $precipitation_mm;

    public function __construct($id, $name, $lat, $lng, $level, $desc, $temperature = null, $precipitation_mm = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->lat = $lat;
        $this->lng = $lng;
        $this->level = $level;
        $this->desc = $desc;
        $this->temperature = $temperature;
        $this->precipitation_mm = $precipitation_mm;
    }

    public function toArray()
    {
        return array(
            'id'    => $this->id,
            'name'  => $this->name,
            'lat'   => $this->lat,
            'lng'   => $this->lng,
            'level' => $this->level,
            'desc'  => $this->desc,
            'temperature' => $this->temperature,
            'precipitation_mm' => $this->precipitation_mm
        );
    }
}
