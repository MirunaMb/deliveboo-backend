<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use App\Models\Restaurant;
use App\Models\Type;

class RestaurantController extends Controller
{
    /*
     * Display a listing of the resource.
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

    /*
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();

        $types = Type::orderBy('label')->get();

        if ($user->restaurant) {
            abort(403, 'Non è possibile creare un nuovo ristorante');
        }

        return view('admin.restaurants.create', compact('types'));
    }

    /*
     * Store a newly created resource in storage.
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

        if ($request->hasFile('image')) {
            $image_path = Storage::put('uploads/restaurants/image', $data['image']);
            $restaurant->image = $image_path;
        }

        $restaurant->save();

        /* try add technology relationship to store */
        if (Arr::exists($data, "types"))
            $restaurant->types()->attach($data["types"]);

        return redirect()->route('admin.restaurant.index');

    }

    /*
     * Display the specified resource.
     */
    public function show(Restaurant $restaurant)
    {
        $user = Auth::user();
        if ($user->restaurant) {
            abort(403, 'Non è possibile visualizzare questo ristorante');
        }
        return view('admin.restaurants.show', compact('restaurant'));
    }

    /*
     * Show the form for editing the specified resource.
     */
    public function edit(Restaurant $restaurant)
    {
        if ($restaurant->user_id != Auth::id()) {
            abort(403, 'Non hai il permesso di modificare questo ristorante.');
        }

        $types = Type::orderBy('label')->get();

        $restaurant_types = $restaurant->types->pluck('id')->toArray();

        return view('admin.restaurants.edit', compact('restaurant', 'types', 'restaurant_types'));
    }

    /*
     * Update the specified resource in storage.
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        // FUNZIONA !
        $data = $this->validation($request->all());

        $restaurant->update($data);

        if ($request->hasFile('image')) {
            if ($restaurant->image) {
                Storage::delete($restaurant->image);
            }
            $image_path = Storage::put('uploads/restaurants/image', $data['image']);
            $restaurant->image = $image_path;
            $restaurant->save();
        }

        if (Arr::exists($data, "types")) {
            $restaurant->types()->sync($data["types"]);
        } else {
            $restaurant->types()->detach();
        }

        /* $restaurant->update($data); */
        return redirect()->route('admin.restaurant.show', $restaurant);
    }

    /*
     * Remove the specified resource from storage.
     */
    public function destroy(Restaurant $restaurant)
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
                'types' => 'required',
                'description' => 'required',
                'image' => 'nullable|image|max:1024'
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

                'types.required' => 'la/e tipologia/e è necessaria/e',

                'description.required' => 'La descrizione è obbligatorio',

                // DA GESTIRE QUANDO INSERIAMO IMAGE
                'image.image' => 'Il file deve essere un immagine (jpg, jpeg, png, ecc)',
                'image.max' => 'L\'immagine deve essere di max 1024kb'
            ]
        )->validate();

        return $validator;
    }
}

