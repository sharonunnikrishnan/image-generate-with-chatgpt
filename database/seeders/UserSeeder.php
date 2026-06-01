<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin User
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gamin.com',
            'password' => Hash::make('admin@123'),
            'phone' => '9999999999',
            'address' => 'Admin Address',
            'role' => 'admin',
            'status' => '1',
        ]);

        // Normal User
        User::create([
            'name' => 'John Doe',
            'email' => 'user@gmail.com',
            'password' => Hash::make('user@123'),
            'phone' => '8888888888',
            'address' => 'User Address',
            'role' => 'user',
            'status' => '1',
        ]);
    }
}
