<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Dish;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $_dishes = [
        //     ['name' => 'ristorante_1', 'description' => 'Linguaggio di markup strutturale.', 'visible' => true, 'image' => '', 'price' => 12.40],
        //     ['name' => 'ristorante_2', 'description' => 'Foglio di stile per presentazione.', 'visible' => true, 'image' => '', 'price' => 20.21],
        //     ['name' => 'ristorante_3', 'description' => 'Linguaggio di scripting client-side.', 'visible' => true, 'image' => '', 'price' => 30.00],
        //     ['name' => 'ristorante_4', 'description' => 'Framework JavaScript per interfacce utente.', 'visible' => true, 'image' => '', 'price' => 12.93],
        //     ['name' => 'ristorante_5', 'description' => 'Linguaggio di scripting server-side.', 'visible' => true, 'image' => '', 'price' => 7.50],
        // ];

        // foreach ($_dishes as $_dish) {
        //     $dish = new Dish();
        //     $dish->name = $_dish['name'];
        //     $dish->description = $_dish['description'];
        //     $dish->visible = $_dish['visible'];
        //     $dish->image = $_dish['image'];
        //     $dish->price = $_dish['price'];
        //     $dish->save();
        // }
    }
}
