<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class TomtomController extends Controller
{
    private $base_url = "https://api.tomtom.com/search/2/geocode";
    private $api_key = '';

    public function __construct()
    {
       $this->api_key = env('TOMTOM_API_KEY');
    }

    public function getGeoData(Request $request)
    {
        $location = $request->input('location');

        $response = Http::withOptions(['verify' => false])->get("$this->base_url/$location.json", [
            "storeResult" => false,
            'limit' => 10,
            'countrySet' => "it",
            "key" => $this->api_key
        ]);

        $prepared_locations = $this->prepareLocations($response->json('results'));

        return response()->json($prepared_locations);

    }

    private function prepareLocations($locations) {
        $prepared_locations = [];

        for ($i = 0; $i < count($locations); $i++) {
            $location = $locations[$i];

            $prepared_location = [
                'address' => $location['address']['freeformAddress'],
                'position' => $location['position']
            ];

            array_push($prepared_locations, $prepared_location);
        }

        return  $prepared_locations;

    }
}
