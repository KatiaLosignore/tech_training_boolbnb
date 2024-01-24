<?php

namespace App\Http\Controllers\Admin;

use App\Models\Apartment;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreApartmentRequest;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apartments = Apartment::all();
        $services = Service::all();
        // Restituisce tutti gli appartamenti e servizi
        return view('admin.apartments.index', compact('apartments', 'services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $services = Service::all();
        return view('admin.apartments.create', compact('services', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreApartmentRequest $request)
    {
        $form_data = $request->validated();

        if ($request->hasFile('photo')) {
            $path = Storage::put('cover', $request->photo);
            $form_data['photo'] = $path;
        }

        // Crea un nuovo appartamento
        $apartment = Apartment::create($form_data);

        if ($request->has('services')) {
            $apartment->services()->attach($request->services);
        }

        return redirect()->route('admin.apartments.show', $apartment->id)->with('status', 'Appartamento creato con successo!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function show(Apartment $apartment)
    {
        // Restituisce un appartamento specifico
        return view('admin.apartments.show', compact('apartment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function edit(Apartment $apartment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Apartment $apartment)
    {
        // Aggiorna un appartamento esistente
        $apartment->update($request->all());

        // Restituisce l'appartamento aggiornato
        return $apartment;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apartment $apartment)
    {
        // Cancella un appartamento
        $apartment->delete();

        // Restituisce una risposta vuota
        return response()->noContent();
    }
}
