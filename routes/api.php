<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MapController;
use App\Http\Controllers\WeatherController;
Route::get('/alerts', array(MapController::class, 'getAlerts'));


Route::get('/weather/{lat}/{lon}', [WeatherController::class, 'getWeather']);
