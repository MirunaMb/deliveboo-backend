<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Dish;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Validator;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dishes = Dish::where('restaurant_id', Auth::id())->get();
        return view('admin.dishes.index', compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     ** @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return view('admin.dishes.create');

        // $restaurantId = Auth::user()->restaurant->id;
        // return view('admin.dishes.create', compact('restaurantId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     ** @return \Illuminate\Http\Response
     */
    public function show(Dish $dish)
    {
        return view('admin.dishes.show', compact('dish'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

    private function validation($data)
    {
        $validator = Validator::make(
            $data,
            [
                'name' => 'required|string|max:50',
                'description' => 'required|string|max:250',
                'visible' => 'nullable|boolean|',
                'price' => 'required|numeric|between:0,99.99',
                'image' => 'nullable|image|max:1024',
                'restaurant_id' => 'nullable|exists:restaurants,id'
            ],
            [
                /* 'name.required' => 'Il nome è obbligatorio',
                'name.string' => 'Il nome deve essere una stringa',
                'name.max' => 'Il nome deve contenere un massimo di 50 caratteri',

                            'address.required' => 'L\'indirizzo è obbligatorio',
                'address.string' => 'L\'indirizzo deve essere una stringa',
                'address.max' => 'L\'indirizzo deve contenere un massimo di 50 caratteri',

                            'phone_number.required' => 'Il numero di telefono è obbligatorio',
                'phone_number.string' => 'Il numero di telefono è una stringa',
                'phone_number.max' => 'Il numero di telefono deve contenere un massimo di 50 caratteri',

                            'vat.required' => 'La partita IVA è obbligatorio',
                'vat.string' => 'La partita IVA è una stringa',
                'vat.max' => 'La partita IVA deve contenere un massimo di 50 caratteri',

                            'types.required' => 'la/e tipologia/e è necessaria/e',

                            'description.required' => 'La descrizione è obbligatorio', */

                // DA GESTIRE QUANDO INSERIAMO IMAGE
                /* 'image.image' => 'L\'immagine', */
                // 'image.max' => 'La partita IVA deve contenere un massimo di 50 caratteri',


            ]
        )->validate();
        return $validator;

    }
}
