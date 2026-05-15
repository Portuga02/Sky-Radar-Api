<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiskArea extends Model
{

    protected $fillable = array('name', 'lat', 'lng', 'level', 'description');
}
