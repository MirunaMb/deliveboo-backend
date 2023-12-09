<?php

namespace Database\Seeders;

use App\Models\Dish;
use App\Models\Restaurant;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // piatti Francesi
        $_dishes = [
            ['name' => 'Croissant', 'description' => 'Delizioso dolce a base di pasta sfoglia.', 'visible' => true, 'image' => '', 'price' => 3.50, 'restaurant_id' => 1],
            ['name' => 'Cuisses de grenouilles', 'description' => 'Prelibatezze di rana in salsa aromatica.', 'visible' => true, 'image' => '', 'price' => 18.90, 'restaurant_id' => 1],
            ['name' => 'galettes bretonnes', 'description' => 'Crepes croccanti con ripieno tradizionale.', 'visible' => true, 'image' => '', 'price' => 12.75, 'restaurant_id' => 1],
            ['name' => 'Soupe de l\'ognion', 'description' => 'Zuppa di cipolla gratinata e saporita.', 'visible' => true, 'image' => '', 'price' => 9.50, 'restaurant_id' => 1],
            ['name' => 'ratatouille', 'description' => 'Stufato di verdure tipico della Provenza.', 'visible' => true, 'image' => '', 'price' => 15.20, 'restaurant_id' => 1],

            // piatti Americani
            ['name' => 'Big Krusty Burgher', 'description' => 'Enorme hamburger con condimenti speciali.', 'visible' => true, 'image' => '', 'price' => 14.99, 'restaurant_id' => 2],
            ['name' => 'Maccarony and Cheese', 'description' => 'Pasta al formaggio cremosa e irresistibile.', 'visible' => true, 'image' => '', 'price' => 10.50, 'restaurant_id' => 2],
            ['name' => 'Alette di pollo fritte', 'description' => 'Deliziose ali di pollo croccanti.', 'visible' => true, 'image' => '', 'price' => 18.75, 'restaurant_id' => 2],
            ['name' => 'Hot-dog', 'description' => 'Panino con salsiccia e condimenti vari.', 'visible' => true, 'image' => '', 'price' => 8.99, 'restaurant_id' => 2],
            ['name' => 'Patatine Fritte', 'description' => 'Patatine croccanti e deliziose.', 'visible' => true, 'image' => '', 'price' => 5.50, 'restaurant_id' => 2],

            // piatti Italiani
            ['name' => 'Pizza Margherita', 'description' => 'Pizza classica con pomodoro e mozzarella.', 'visible' => true, 'image' => '', 'price' => 8.50, 'restaurant_id' => 3],
            ['name' => 'Pizza Mari e Monti', 'description' => 'Pizza con mare e montagna, sapori contrastanti.', 'visible' => true, 'image' => '', 'price' => 12.20, 'restaurant_id' => 3],
            ['name' => 'Pizza Piccantella', 'description' => 'Pizza piccante con ingredienti gustosi.', 'visible' => true, 'image' => '', 'price' => 10.99, 'restaurant_id' => 3],
            ['name' => 'Pizza Rucoletta', 'description' => 'Pizza con rucola fresca e ingredienti di qualità.', 'visible' => true, 'image' => '', 'price' => 14.75, 'restaurant_id' => 3],
            ['name' => 'Pizza Capricciosa', 'description' => 'Pizza ricca e variegata, un vero capriccio.', 'visible' => true, 'image' => '', 'price' => 11.50, 'restaurant_id' => 3],

            // piatti Inglesi
            ['name' => 'Bangers and Mash (salsicce)', 'description' => 'Salsicce con purè di patate cremoso.', 'visible' => true, 'image' => '', 'price' => 9.75, 'restaurant_id' => 4],
            ['name' => 'Fish & Chips', 'description' => 'Pesce fritto con patatine, un classico britannico.', 'visible' => true, 'image' => '', 'price' => 13.45, 'restaurant_id' => 4],
            ['name' => 'Sformato di Carne', 'description' => 'Delizioso sformato di carne.', 'visible' => true, 'image' => '', 'price' => 11.99, 'restaurant_id' => 4],
            ['name' => 'Uova e pancetta', 'description' => 'Colazione inglese con uova e pancetta.', 'visible' => true, 'image' => '', 'price' => 8.90, 'restaurant_id' => 4],
            ['name' => 'Yorkshire pudding', 'description' => 'Piatto tradizionale inglese, base di pasta cotta al forno.', 'visible' => true, 'image' => '', 'price' => 6.25, 'restaurant_id' => 4],
        ];

        foreach ($_dishes as $_dish) {
            $dish = new Dish();
            $dish->name = $_dish['name'];
            $dish->description = $_dish['description'];
            $dish->visible = $_dish['visible'];
            $dish->image = $_dish['image'];
            $dish->price = $_dish['price'];

            $restaurant = Restaurant::find($_dish['restaurant_id']);
            $restaurant->dishes()->save($dish);
        }

    }
}

