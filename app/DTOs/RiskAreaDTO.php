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

    public function __construct($id, $name, $lat, $lng, $level, $desc)
    {
        $this->id = $id;
        $this->name = $name;
        $this->lat = $lat;
        $this->lng = $lng;
        $this->level = $level;
        $this->desc = $desc;
    }

    public function toArray()
    {
        return array(
            'id'    => $this->id,
            'name'  => $this->name,
            'lat'   => $this->lat,
            'lng'   => $this->lng,
            'level' => $this->level,
            'desc'  => $this->desc
        );
    }
}
