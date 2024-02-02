<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Apartment;


class ApartmentController extends Controller
{
    public function getApartments() {

    // $apartments = Apartment::where('visible', 1)->get();

        // Utilizzo del Local Scope
        $apartments = Apartment::visible()->with('services')->paginate(12);
        return response()->json([
            'success' => true,
            'results' => $apartments
        ]);
    }

    public function show($id) {
        $apartment = Apartment::where('id', $id)->with('services')->first();

        if ($apartment) {
            return response()->json([
                'success' => true,
                'apartment' => $apartment
            ]);
        }  else {
            return response()->json([
                'success' => false,
                'error' => 'Apartment not found!'
            ]);
        }

    }







}

