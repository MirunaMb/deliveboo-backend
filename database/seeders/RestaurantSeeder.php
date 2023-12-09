<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Restaurant;
use App\Models\User;

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
            ['name' => 'La Ratatouille', 'description' => 'Benvenuti al ristorante del piccolo famoso chef di talento Remy, vincitore di 3 stelle micheline!', 'address' => '168 Rue Montmartre', 'phone_number' => '3310975835', 'vat' => '93849385743', 'image' => '', 'user_id' => 1],
            ['name' => 'Krusty Burgher', 'description' => 'Dieta? Salute? Acqua passata ! Dacci dentro da Krusty Burgher!', 'address' => '742 Evergreen Terrace', 'phone_number' => '5555552345', 'vat' => '92837485943', 'image' => '', 'user_id' => 2],
            ['name' => 'U\'PIzzaiuole', 'description' => 'Antica Pizzeria Napoletana dal 1890, benvenuti nella dei Pizzaiuole!', 'address' => 'Via Regina Margherita 28', 'phone_number' => '3243334859', 'vat' => '34959859440', 'image' => '', 'user_id' => 3],
            ['name' => 'Il Paiolo Magico', 'description' => 'Siete maghi o babbani ? poco importa se vi piace la zuppa calda! Benvenuti al Paiolo Magico!', 'address' => '5d Stoke Newington Rd', 'phone_number' => '4402030484', 'vat' => '83948375484', 'image' => '', 'user_id' => 4],

        ];



        foreach ($_restaurants as $_restaurant) {
            $restaurant = new Restaurant();
            $restaurant->name = $_restaurant['name'];
            $restaurant->description = $_restaurant['description'];
            $restaurant->address = $_restaurant['address'];
            $restaurant->phone_number = $_restaurant['phone_number'];
            $restaurant->vat = $_restaurant['vat'];
            $restaurant->image = $_restaurant['image'];

            $user = User::find($_restaurant['user_id']);
            $user->restaurant()->save($restaurant);
        }
    }
}


