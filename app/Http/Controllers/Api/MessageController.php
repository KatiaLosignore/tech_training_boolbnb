<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        $validateData = $request->all();

        $validator = Validator::make($validateData, [
            'apartment_id' => 'required',
            'name' => 'nullable|max:50',
            'lastname' => 'nullable|max:50',
            'email' => 'required|email|max:50',
            'text' => 'required',
            'created_at' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }

        $message = new Message();
        $message->fill($validateData);
        $message->save();

        return response()->json(
            [
                'success' => true,
            ]
        );
    }
}
