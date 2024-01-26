<?php

namespace App\Http\Controllers\Admin;

use App\Models\Apartment;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreApartmentRequest;
use App\Http\Requests\UpdateApartmentRequest;
use App\Models\Service;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
        $user = Auth::user();
        $apartments = Apartment::where('user_id', $user->id)->get();
        $services = Service::all();
        // Restituisce tutti gli appartamenti di uno User e servizi
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
        $user = Auth::user();
        if ($request->hasFile('photo')) {
            $path = Storage::put('cover', $request->photo);
            $form_data['photo'] = $path;
        }

        $form_data['user_id'] = $user->id;

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
        $users = User::all();
        $services = Service::all();
        return view('admin.apartments.edit', compact('apartment','services', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateApartmentRequest $request, Apartment $apartment)
    {
        $validated_data = $request->validated();

        if ($request->hasFile('photo')) {

            if($apartment->photo) {
                Storage::delete($apartment->photo);
            }

            $path = Storage::put('cover', $request->photo);
            $validated_data['photo'] = $path;
        }

        $apartment->services()->sync($request->services);

        $apartment->update($validated_data);

        return redirect()->route('admin.apartments.show', $apartment->id)->with('status', 'Appartamento modificato con successo!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apartment $apartment)
    {

        if($apartment->photo) {
            Storage::delete($apartment->photo);
        }

        // Cancella la riga dalla tabella pivot ed elimina la relazione tra due record
        $apartment->services()->detach();

        // Cancella un appartamento
        $apartment->delete();

        return redirect()->route('admin.apartments.index');
    }


    public function deleteImage($id) {

        $apartment = Apartment::where('id', $id)->firstOrFail();

        if ($apartment->photo) {
            Storage::delete($apartment->photo);
            $apartment->photo = null;
            $apartment->save();
        }

        return redirect()->route('admin.apartments.edit', $apartment->id);

    }
}
