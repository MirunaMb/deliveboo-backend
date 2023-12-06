<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use Braintree\Gateway;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Orders\OrderRequest;

class OrderController extends Controller {

    // Funzione che permette di ricevere i dati e salvarli nel database
    public function GetOrder(Request $request) {

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
    public function Generate(Request $request, Gateway $gateway) {
        $token = $gateway->clientToken()->generate();
        $data = [
            'success' => true,
            'token' => $token
        ];
        return response()->json($data, 200);
    }
    public function MakePayment(OrderRequest $request, Gateway $gateway, Order $order) {
        $result = $gateway->transaction()->sale([
            'amount' => 10,
            'paymentMethodNonce' => $request->token,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);
        if($result->success) {
            $data = [
                'message' => 'Transazione eseguita correttamente',
                'success' => true
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Transazione rifiutata',
                'success' => false
            ];
            return response()->json($data, 401);
        }
    }


}
