<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage;
use App\Models\Restaurant;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


use App\Models\Dish;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dishes = Dish::all();
        return view('admin.dishes.index', compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     ** @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dishes.create');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * *@return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
        $restaurants = Restaurant::all();
        // dd($dish);
        return view('admin.dishes.edit', compact('restaurants', 'dish'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * *@return \Illuminate\Http\Response
     */
    public function update(Request $request, Dish $dish)
    {
        $data = $this->validation($request->all());
        if ($request->hasFile('image')) {
            if ($dish->image) {
                Storage::delete($dish->image);
            }
            $image_path = Storage::put('uploads/dishes/image', $data['image']);
            $dish->image = $image_path;
        }
        $dish->save();

        $dish = Dish::findOrFail($dish->id);
        $dish->update($data);

        return redirect()->route('admin.dishes.show', $dish->id); 

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * *@return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function validation($data)
    {
        $validator = Validator::make(
            $data,
            [
                'name' => 'required|string|max:50',
                'description' => 'required',
                'price' => 'required',
                'image' => 'nullable|image|max:1024',
                'restaurant_id' => 'nullable|exists:restaurants,id'

            ],
            [
                'name.required' => 'Il nome è obbligatorio',
                'name.string' => 'Il nome deve essere una stringa',
                'name.max' => 'Il nome deve contenere un massimo di 50 caratteri',

                'price.required' => 'Il prezzo è obbligatorio',

                'description.required' => 'La descrizione è obbligatorio',

                'image.max' => 'L\'immagine non può superare i 1024KB',

                

            ]
        )->validate();
        return $validator;

    }
}
