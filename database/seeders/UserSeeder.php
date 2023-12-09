<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $_users = [
            ['name' => 'Miruna', 'email' => 'larataoutille@admin.it', 'password' => 'ciaociao',],
            ['name' => 'Luigi', 'email' => 'krustyburgher@admin.it', 'password' => 'ciaociao',],
            ['name' => 'Gabriele', 'email' => 'upizzaiuole@admin.it', 'password' => 'ciaociao',],
            ['name' => 'Laura', 'email' => 'ilpaiolomagico@admin.it', 'password' => 'ciaociao',],

        ];

        foreach ($_users as $_user) {
            $user = new User();
            $user->name = $_user['name'];
            $user->email = $_user['email'];
            $user->password = Hash::make($_user['password']);
            $user->save();
        }
    }
}
