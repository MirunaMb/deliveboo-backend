<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Type;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Da aggiunge relazione piatti per api
        $restaurants = Restaurant::select("id", "user_id", "name", "description", "address", "phone_number", "vat", "image")
            ->with([
                'types:id,label',
                'dishes' => function ($query) {
                    $query->select("id", "restaurant_id", "name", "description", "price", "image")
                        ->where('visible', 1);
                }
            ])
            ->get();
        dd($restaurants);
        return response()->json($restaurants);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $restaurant = Restaurant::select("id", "user_id", "name", "description", "address", "phone_number", "vat", "image")
            ->where('id', $id)
            ->with([
                'types:id,label',
                'dishes' => function ($query) {
                    $query->select("id", "restaurant_id", "name", "description", "price", "image")
                        ->where('visible', 1);
                }
            ])
            ->first();
        return response()->json($restaurant);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
