<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@demo.com',
                'password'       => bcrypt('qwer1234'),
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}
