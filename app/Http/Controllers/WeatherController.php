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
        try {

            $response = \Illuminate\Support\Facades\Http::withoutVerifying()
                ->withHeaders(array(
                    'User-Agent' => 'SkyRadar/1.0'
                ))
                ->get('https://nominatim.openstreetmap.org/search', array(
                    'q' => $query,
                    'format' => 'json',
                    'addressdetails' => 1,
                    'limit' => 5
                ));

            if ($response->successful()) {
                return response()->json($response->json());
            }

            return response()->json(array('error' => 'Falha ao buscar no OpenStreetMap'), 500);

        } catch (\Exception $e) {

            return response()->json(array(
                'error' => 'Erro interno do servidor',
                'message' => $e->getMessage()
            ), 500);
        }
    }
}
