<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreApartmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255|unique:apartments',
            'rooms' => 'required|integer|min:1',     // Deve essere un numero intero positivo
            'beds' =>  'required|integer|min:1',
            'bathrooms' => 'required|integer|min:1',
            'mq' => 'required|integer|min:1',
            'address' => 'required|string|max:255',
            'lat' => 'required|numeric',
            'lon' => 'required|numeric',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Immagine con specifici formati
            'services' => 'exists:services,id',
            'user_id' => 'nullable|exists:users,id',
        ];
    }

    public function message() {
        return [
            'name.required' => "Il campo Name è richiesto",
            'name.string' => "Il campo Name deve essere di tipo stringa",
            'name.max' => 'Il campo Name deve avere una lunghezza massima di 255 caratteri',
            'name.unique' => 'Il Name è già stato inserito!',
            'rooms.required' => "Il campo Rooms è richiesto",
            'rooms.integer' => "Il campo Rooms deve essere di tipo intero",
            'rooms.min' => 'Il numero di Rooms deve essere minimo 1',
            'beds.required' => "Il campo Beds è richiesto",
            'beds.integer' => "Il campo Beds deve essere di tipo intero",
            'beds.min' => 'Il numero di Beds deve essere minimo 1',
            'bathrooms.required' => "Il campo Bathrooms è richiesto",
            'bathrooms.integer' => "Il campo Bathrooms deve essere di tipo intero",
            'bathrooms.min' => 'Il numero di Bathrooms deve essere minimo 1',
            'mq.required' => "Il campo Mq è richiesto",
            'mq.integer' => "Il campo Mq deve essere di tipo intero",
            'mq.min' => 'Il numero di Mq deve essere minimo 1',
            'address.required' => "Il campo Address è richiesto",
            'address.string' => "Il campo Address deve essere di tipo stringa",
            'address.max' => 'Il campo Address deve avere una lunghezza massima di 255 caratteri',
            'lat.required' => 'Il campo Lat è richiesto!',
            'lat.numeric' => 'Il campo Lat deve essere di tipo numerico',
            'lon.required' => 'Il campo Lon è richiesto!',
            'lon.numeric' => 'Il campo Lon deve essere di tipo numerico',
            'photo.mimes' => "I formati di immagine accetatti sono i seguenti: 'jpeg,png,jpg,gif,svg'",
            'photo.max' => "L'url dell'immagine deve avere massimo 2048 caratteri",
        ];
    }
}
