<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MapController;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\WeatherAggregatorController;
Route::get('/alerts', array(MapController::class, 'getAlerts'));


Route::get('/weather/{lat}/{lon}', [WeatherController::class, 'getWeather']);
Route::get('/search/{query}', [WeatherController::class, 'searchLocation']);

Route::get('/radar-data/{lat}/{lng}', [WeatherAggregatorController::class, 'fetch']);
