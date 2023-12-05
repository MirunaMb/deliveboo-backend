<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{

    // Funzione che permette di ricevere i dati e salvarli nel database
    public function GetOrder(Request $request)
    {
        $request->validate([
            'guest_name' => 'required|string',
            'guest_surname' => 'required|string',
            'guest_address' => 'required|string',
            'guest_phone' => 'required|string',
            'guest_mail' => 'nullable|email',
            'total' => 'required|numeric',
        ]);

        $order = Order::create([
            'guest_name' => $request->guest_name,
            'guest_surname' => $request->guest_surname,
            'guest_address' => $request->guest_address,
            'guest_phone' => $request->guest_phone,
            'guest_mail' => $request->guest_mail,
            'total' => $request->total,
        ]);

        return response()->json(['message' => 'Ordine ricevuto con successo', 'order_id' => $order->id], 201);
    }
}
