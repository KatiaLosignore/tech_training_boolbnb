<?php

namespace App\Http\Controllers;

use App\Models\Sponsorship;
use Illuminate\Http\Request;

class SponsorshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Sponsorship::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Create a new sponsorship
        $sponsorship = Sponsorship::create($request->all());

        // Associate the sponsorship with the apartments
        $apartmentIds = $request->input('apartments');
        foreach ($apartmentIds as $apartmentId) {
            $sponsorship->apartments()->attach($apartmentId);
        }

        // Return the created sponsorship
        return $sponsorship;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sponsorship  $sponsorship
     * @return \Illuminate\Http\Response
     */
    public function show(Sponsorship $sponsorship)
    {
        return $sponsorship;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sponsorship  $sponsorship
     * @return \Illuminate\Http\Response
     */
    public function edit(Sponsorship $sponsorship)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sponsorship  $sponsorship
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sponsorship $sponsorship)
    {
        // Update an existing sponsorship
        $sponsorship->update($request->all());

        // Update the apartments associated with the sponsorship
        $apartmentIds = $request->input('apartments');
        $sponsorship->apartments()->sync($apartmentIds);

        // Return the updated sponsorship
        return $sponsorship;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sponsorship  $sponsorship
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sponsorship $sponsorship)
    {
        // Delete a sponsorship
        $sponsorship->delete();

        // Disassociate the sponsorship from apartments
        $sponsorship->apartments()->detach();

        // Return a success response
        return response()->noContent();
    }
}
