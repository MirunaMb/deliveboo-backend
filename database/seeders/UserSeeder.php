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
            ['name' => 'jordi', 'email' => 'jordi@info.it', 'password' => 'ciaociao',],
            ['name' => 'luigi', 'email' => 'luigi@info.it', 'password' => 'ciaociao',],
            ['name' => 'laura', 'email' => 'laura@info.it', 'password' => 'ciaociao',],
            ['name' => 'gabriele', 'email' => 'gabriele@info.it', 'password' => 'ciaociao',],
            ['name' => 'miruna', 'email' => 'miruna@info.it', 'password' => 'ciaociao',],

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
