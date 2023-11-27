<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Dish;
use App\Models\Restaurant;

class DishController extends Controller
{
    /*
     * Display a listing of the resource.
     */
    public function index()
    {
        $dishes = Dish::select("id", "restaurant_id", "name", "description", "price", "image")
            ->where('visible', 1)
            ->get();
        return response()->json($dishes);
    }

    public function dishesByRestaurant($restaurantId)
{
    // Logica per ottenere i piatti di un ristorante specifico
    // Assicurati di restituire i dati in un formato JSON

    $dishes = Dish::where('restaurant_id', $restaurantId)->get();

    return response()->json($dishes);
}


    /*
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /*
     * Display the specified resource.
     */
    public function show($id)
    {
        $dishes = Dish::select("id", "restaurant_id", "name", "description", "price", "image")
            ->where('id', $id)
            ->where('visible', 1)
            ->first();
        return response()->json($dishes);
    }

    /*
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /*
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
