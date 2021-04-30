<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CreateUsersSeeder extends Seeder
{
    public function run()
    {
        $user = [
            [
                'name' => 'User',
                'username' => 'isUser',
                'email' => 'user@gmail.com',
                'password' => bcrypt('123456'),
                'photo' => 'image.png',
                'roles_id' => 2
            ],
            [
                'name' => 'Admin',
                'username' => 'Rispianti',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123456'),
                'photo' => 'images.png',
                'roles_id' => 1
            ]
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
