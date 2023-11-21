<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Restaurant;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $_restaurants = [
            ['name' => 'ristorante_1', 'description' => 'Linguaggio di markup strutturale.', 'address' => 'via vatte a pesca', 'phone_number' =>'333333333333', 'image' =>''],
            ['name' => 'ristorante_2', 'description' => 'Foglio di stile per presentazione.', 'address' => 'via vatte a pesca', 'phone_number' =>'333333333333', 'image' =>''],
            ['name' => 'ristorante_3', 'description' => 'Linguaggio di scripting client-side.', 'address' => 'via vatte a pesca', 'phone_number' =>'333333333333', 'image' =>''],
            ['name' => 'ristorante_4', 'description' => 'Framework JavaScript per interfacce utente.', 'address' => 'via vatte a pesca', 'phone_number' =>'333333333333', 'image' =>''],
            ['name' => 'ristorante_5', 'description' => 'Linguaggio di scripting server-side.', 'address' => 'via vatte a pesca', 'phone_number' =>'333333333333', 'image' =>''],
        ];

        foreach ($_restaurants as $_restaurant){
            $restaurant = new Restaurant();
            $restaurant->name = $_restaurant['name'];
            $restaurant->description = $_restaurant['description'];
            $restaurant->address = $_restaurant['address'];
            $restaurant->phone_number = $_restaurant['phone_number'];
            $restaurant->image = $_restaurant['image'];
            $restaurant->save();
        }
        
    }
}
