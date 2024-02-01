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
        $apartments = Apartment::visible()->get();
        return response()->json([
            'success' => true,
            'data' => $apartments
        ]);
    }









}

