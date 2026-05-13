<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MapController;

Route::get('/alerts', array(MapController::class, 'getAlerts'));
