<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class TomtomController extends Controller
{
    private $base_url = 'https://api.tomtom.com/search/2/geocode';
    private $api_key = '';

    public function __construct()
    {
        $this->api_key = env('TOMTOM_API_KEY');
    }

    public function getGeoData(Request $request)
    {
        $location = $request->input('location');
        $response = Http::withOptions(['verify' => false])
            ->get("$this->base_url/$location.json", [
                "storeResult" => false,
                "limit" => 10,
                "countrySet" => "IT",
                'key' => $this->api_key
            ]);

        $prepaped_locations = $this->prepareLocations($response->json("results"));
        return response()->json($prepaped_locations);
    }

    private function prepareLocations($locations)
    {
        $prepared_locations = [];

        foreach ($locations as $location) {
            $prepared_locations[] = [
                "address" => $location["address"]["freeformAddress"],
                "position" => $location["position"],
            ];
        }

        return $prepared_locations;
    }
}
