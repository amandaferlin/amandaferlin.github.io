<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'phone' => '081234567890',
                'address' => 'Jl. Admin No. 1'
            ],
            [
                'name' => 'User Biasa',
                'email' => 'user@example.com',
                'password' => Hash::make('password'),
                'role' => 'user',
                'phone' => '089876543210',
                'address' => 'Jl. User No. 2'
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
} 