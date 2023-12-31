<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        // Ottieni l'ID del ristorante associato all'utente autenticato
        if (Auth::user()->restaurant === null) {
            abort(403, 'NOT FOUND');
        }

        $restaurantId = Auth::user()->restaurant->id;


        // Ottieni gli ordini relativi a quel ristorante
        $orders = Order::whereHas('dishes.restaurant', function ($query) use ($restaurantId) {
            $query->where('id', $restaurantId);
        })->orderBy('created_at', 'desc')
            ->get();

        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show(Order $order)
    {
        // Ottieni l'ID del ristorante associato all'utente autenticato
        if (Auth::user()->restaurant === null) {
            abort(403, 'NOT FOUND');
        }

        $restaurantId = Auth::user()->restaurant->id;


        // Verifica se l'ordine appartiene al ristorante dell'utente autenticato
        if ($order->dishes->where('restaurant_id', $restaurantId)->isEmpty()) {
            abort(404, 'NOT FOUND');
        }

        $dishes = $order->dishes()->withPivot('quantity')->get();

        return view('admin.orders.show', compact('order', 'dishes'));
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        //
    }
}
