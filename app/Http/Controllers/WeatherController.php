<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function getWeather($lat, $lon)
    {
        $request = Http::withOptions([]);
        if (app()->environment('local')) {
            $request->withoutVerifying();
        }
        $response = $request->get("https://api.hgbrasil.com/weather", [
            'key'    => env('HG_BRASIL_KEY'),
            'lat'    => $lat,
            'lon'    => $lon,
            'format' => 'json'
        ]);

        return response()->json($response->json(), $response->status());
    }

    public function searchLocation($query)
    {
        $response = Http::withHeaders([

            'User-Agent' => 'SkyRadarApp/1.0 (saviogomesdasilvadev@gmail.com)'
        ])->get("https://nominatim.openstreetmap.org/search", [
            'format'         => 'json',
            'addressdetails' => 1,
            'limit'          => 5,
            'q'              => $query
        ]);

        return response()->json($response->json(), $response->status());
    }
}
