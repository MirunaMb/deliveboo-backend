<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

use App\Models\Restaurant;
use App\Models\Dish;
use App\Http\Controllers\Controller;

class DishController extends Controller
{
    /*
     * Display a listing of the resource.
     */
    public function index()
    {
        $dishes = Dish::where('restaurant_id', Auth::id())->get();
        return view('admin.dishes.index', compact('dishes'));
    }

    /*
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        return view('admin.dishes.create');
        // $restaurantId = Auth::user()->restaurant->id;
        // return view('admin.dishes.create', compact('restaurantId'));
    }

    /*
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $this->validation($request->all());

        $dish = new Dish();
        $dish->name = $data['name'];
        $dish->description = $data['description'];
        $dish->visible = Arr::get($data, 'visible', false);
        $dish->price = $data['price'];

        // autentificazione attraverso AUTH-> collega la tabella ristorante con user_id
        $dish->restaurant_id = Auth::id();

        // $restaurantId = Auth::user()->restaurant->id;
        // $dish->restaurant_id = $restaurantId;

        if ($request->hasFile('image')) {
            $image_path = Storage::put('uploads/dishes/image', $data['image']);
            $dish->image = $image_path;
        }

        $dish->save();

        return redirect()->route('admin.dishes.index');
    }

    /*
     * Display the specified resource.
     */
    public function show(Dish $dish)
    {
        if (auth()->user()->id !== $dish->restaurant->user_id) {
            abort(403, 'Non è possibile visualizzare questo piatto.');
        }
        return view('admin.dishes.show', compact('dish'));
    }

    /*
     * Show the form for editing the specified resource.
     */
    public function edit(Dish $dish)
    {
        $restaurants = Restaurant::all();
        if (auth()->user()->id !== $dish->restaurant->user_id) {
            abort(403, 'Non è possibile modificare questo piatto.');
        }
        return view('admin.dishes.edit', compact('restaurants', 'dish'));
    }

    /*
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dish $dish)
    {
        $data = $this->validation($request->all());

        $dish->update($data);

        $dish->visible = Arr::get($data, 'visible', false);

        if ($request->hasFile('image')) {
            if ($dish->image) {
                Storage::delete($dish->image);
            }
            $image_path = Storage::put('uploads/dishes/image', $data['image']);
            $dish->image = $image_path;
            $dish->save();
        }

        /* $dish->save(); */

        $dish = Dish::findOrFail($dish->id);

        /*  $dish->update($data); */

        return redirect()->route('admin.dishes.show', $dish->id);
    }

    /*
     * Remove the specified resource from storage.
     */
    public function destroy(Dish $dish)
    {
        $dish = Dish::findOrFail($dish->id);

        $dish->delete();

        return redirect()->route('admin.dishes.index');
    }

    private function validation($data)
    {
        $validator = Validator::make(
            $data,
            [
                'name' => 'required|string|max:50',
                'description' => 'required',
                'price' => 'required|numeric|min:0',
                'image' => 'nullable|image|max:1024',
                'visible' => 'nullable|boolean',
                'restaurant_id' => 'nullable|exists:restaurants,id'
            ],
            [
                'name.required' => 'Il nome è obbligatorio',
                'name.string' => 'Il nome deve essere una stringa',
                'name.max' => 'Il nome deve contenere un massimo di 50 caratteri',

                'description.required' => 'La descrizione è obbligatorio',

                'price.required' => 'Il prezzo è obbligatorio',
                'price.min' => 'Il prezzo deve essere maggiore di 0',

                'image.max' => 'L\'immagine non può superare i 1024KB',
                'image.image' => 'Il file deve essere un immagine (jpg, jpeg, png, ecc)',
            ]

        )->validate();

        return $validator;
    }
}
