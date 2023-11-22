<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Restaurant;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        // $restaurants = Restaurant::all();
        // return view('admin.restaurants.index', compact('restaurants'));

        // Ottieni l'utente autenticato
        $user = Auth::user();

        // Verifica se l'utente ha un ristorante associato
        if ($user->restaurant) {
            // Ottieni il ristorante dell'utente autenticato
            $restaurant = $user->restaurant;

            // Passa il ristorante alla vista
            return view('admin.restaurants.index', compact('restaurant'));
        } else {
            // Se l'utente non ha un ristorante, gestisci di conseguenza (ad esempio, reindirizzalo a una pagina di creazione del ristorante)
            return redirect()->route('admin.restaurant.create')->with('warning', 'Devi creare un ristorante prima di poterlo visualizzare.');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $user = Auth::user();

        if ($user->restaurant) {
            abort(403, 'Non è possibile creare un nuovo ristorante');
        }

        return view('admin.restaurants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $data = $this->validation($request->all());

        $restaurant = new Restaurant();
        $restaurant->name = $data['name'];
        $restaurant->description = $data['description'];
        $restaurant->address = $data['address'];
        $restaurant->phone_number = $data['phone_number'];
        $restaurant->vat = $data['vat'];
        // autentificazione attraverso AUTH-> collega la tabella ristorante con user_id
        $restaurant->user_id = Auth::id();
        // $restaurant->image = $data['image'];

        $restaurant->save();

        return redirect()->route('admin.restaurant.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit(Restaurant $restaurant)
    {
        return view('admin.restaurants.edit', compact('restaurant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        $data = $this->validation($request->all());
        $restaurant->update($data);
        $restaurant->save();
        return redirect()->route('admin.restaurant.index');
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

    private function validation($data)
    {
        $validator = Validator::make(
            $data,
            [
                'name' => 'required|string|max:50',
                'address' => 'required|string|max:50',
                'phone_number' => 'required|string|max:50',
                'vat' => 'required|string|max:50',
                'description' => 'required',
                // 'image' => 'nullable|image|max:1024',
            ],
            [
                'name.required' => 'Il nome è obbligatorio',
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

                'description.required' => 'La descrizione è obbligatorio',
                
                // DA GESTIRE QUANDO INSERIAMO IMAGE
                // 'image.image' => 'L\'immagine',
                // 'image.max' => 'La partita IVA deve contenere un massimo di 50 caratteri',

                
            ]
        )->validate();
        return $validator;

    }
}
