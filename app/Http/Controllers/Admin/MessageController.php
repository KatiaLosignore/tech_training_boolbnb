<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class MessageController extends Controller
{
    public function index() {

        $user = Auth::user();
        $userId = $user->id;
        $apartment = Apartment::where('user_id', $userId)->first();

        if ($apartment) {
            $apartmentId = $apartment->id;
            $messages = Message::where('apartment_id', $apartmentId)->get();

            return view('admin.messages', compact('messages', 'apartment'));
        } else {
            //Nessun appartamento trovato
            return view('admin.messages', ['messages' => [], 'apartment' => null]);
    
        }
    }
}
